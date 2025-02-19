<?php
// 定义一个递归函数来统计文件数量
function countFilesInDirectory($directory) {
    // 初始化文件计数器
    $fileCount = 0;
    // 使用scandir函数获取目录中的所有文件和文件夹
    $items = scandir($directory);
    foreach ($items as $item) {
        // 跳过当前目录和上级目录
        if ($item === '.' || $item === '..') {
            continue;
        }
        $itemPath = $directory . '/' . $item;
        // 检查是否为目录
        if (is_dir($itemPath)) {
            // 如果是目录，递归调用函数统计子目录中的文件数量
            $fileCount += countFilesInDirectory($itemPath);
        } else {
            // 如果是文件，增加文件计数器
            $fileCount++;
        }
    }
    return $fileCount;
}



// 定义Public目录的路径
$publicDirectory = 'Public';
$totalFiles = countFilesInDirectory($publicDirectory);
$directoryPath = './source/_posts';

try {
    $dir = new DirectoryIterator($directoryPath);
    foreach ($dir as $fileInfo) {
        if ($fileInfo->isDot()) {
            continue;
        }
        if ($fileInfo->isDir()) {
            #echo "目录: ". $fileInfo->getFilename(). "<br>";
        } else {
            #echo "文件: ". $fileInfo->getFilename(). "<br>";
            // 获取完整的文件路径
            $filePath = $fileInfo->getPathname();
            $content = file_get_contents($filePath);
            if ($content !== false) {
                // 使用正则表达式提取 title, tags, categories
                preg_match('/title:\s*(.*)/', $content, $titleMatches);
                preg_match('/tags:\s*(.*)/', $content, $tagsMatches);
                preg_match('/categories:\s*(.*)/', $content, $categoriesMatches);

                var_dump($titleMatches);                
				var_dump($tagsMatches);
				var_dump($categoriesMatches);
				
                // 提取 title
                $title = isset($titleMatches[1]) ? trim($titleMatches[1]) : '';
                // 提取 tags
                $tags = isset($tagsMatches[1]) ? array_map('trim', explode(',', $tagsMatches[1])) : [];
                // 提取 categories
                $categories = isset($categoriesMatches[1]) ? array_map('trim', explode(',', $categoriesMatches[1])) : [];
			
                echo "标题：<br>";
                var_dump($title);
                echo "标签：<br>";
                var_dump($tags);
                echo "分类：<br>";
                var_dump($categories);

            } else {
                echo "读取文件 {$filePath} 时发生错误。<br>";
                continue;
            }
        }
    }
} catch (UnexpectedValueException $e) {
    echo "目录访问出错: ". $e->getMessage();
}
?>