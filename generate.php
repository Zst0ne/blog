<?php
// 加载 Parsedown 和 页面渲染框架
require_once './config.php';
require_once './include/Parsedown.php';
require_once './include/ParsedownExtra.php';

// 创建 ParsedownExtra 实例
$parsedown = new ParsedownExtra();

echo "准备渲染Markdown文件：<br>";
// 替换为实际的目录路径
$directoryPath = './source/_posts';
try {
    $dir = new DirectoryIterator($directoryPath);
    foreach ($dir as $fileInfo) {
        if ($fileInfo->isDot()) {
            continue;
        }
        if ($fileInfo->isDir()) {
            echo "目录: ". $fileInfo->getFilename(). "<br>";
        } else {
            echo "文件: ". $fileInfo->getFilename(). "<br>";
            // 获取完整的文件路径
            $filePath = $fileInfo->getPathname();
            $content = file_get_contents($filePath);
            if ($content!== false) {
                $markdown = nl2br($content);
            } else {
                echo "读取文件 {$filePath} 时发生错误。<br>";
                continue;
            }
            $data = $parsedown->text($markdown);
			$data = "<?php header('Content-Type: text/html; charset=utf-8'); ?>".$data;
            // 生成输出文件路径
            $outputDir = './public';
            if (!is_dir($outputDir)) {
                mkdir($outputDir, 0777, true);
            }
            $outputFilePath = $outputDir. '/' . pathinfo($fileInfo->getFilename(), PATHINFO_FILENAME). '.php';
            $result = file_put_contents($outputFilePath, $data);
            if ($result!== false) {
                echo "数据成功写入文件 {$outputFilePath}，写入的字节数为: ". $result. "<br>";
            } else {
                echo "写入文件 {$outputFilePath} 时发生错误。<br>";
            }
        }
    }
} catch (UnexpectedValueException $e) {
    echo "目录访问出错: ". $e->getMessage();
}
?>