<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Form</title>
</head>

<body>
    <!-- 添加一个隐藏输入字段，用于提交判断 -->
    <form action='admin.php' method="post">
        <input type="hidden" name="deploy" value="start">
        <input type="submit" value="开始部署资源文件">
    </form>
	<form action='admin.php' method="post">
	    <input type="hidden" name="generate" value="start">
	    <input type="submit" value="开始渲染Markdown文件">
	</form>
	使用教程:请将需要渲染的文件放置于路径:./source/_posts文件.

</body>
</html>

<?php
// 加载 Parsedown 和 页面渲染框架
require_once './config.php';
require_once './include/Parsedown.php';
require_once './include/ParsedownExtra.php';
#$NAME="Noobspace";$TAG="";$CATEGORIES="";$USERS="";$DEFAULT= <<<EOF

$HTML= <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
{$HEAD}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$NAME}</title>
</head>
<body>
{$TOP}
{$BOTTOM}
</body>
</html>
EOF;

// 创建 ParsedownExtra 实例
$parsedown = new ParsedownExtra();
// 替换为实际的目录路径
$directoryPath = './source/_posts';
if($_POST['generate']=='start'){
	echo "准备渲染Markdown文件：<br>";
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
	            if ($content!== false && $fileInfo->isFile() && pathinfo($filePath, PATHINFO_EXTENSION) === 'md') {
	                $data = $parsedown->text($content);
	                $data = "<?php header('Content-Type: text/html; charset=utf-8'); ?>".$data;  #定义文本编码
	                $data = "<br></br>".$data;  #定义文本编码
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
	            } else {
	                echo "读取文件 {$filePath} 时发生错误。<br>";
	                continue;
	            }
	        }
	    }
	} catch (UnexpectedValueException $e) {
	    echo "目录访问出错: ". $e->getMessage();
	}
}
?>