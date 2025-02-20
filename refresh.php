<?php
require_once './include/Parsedown.php';
require_once './include/ParsedownExtra.php';
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
$date=date('Y-m-d');	

// 定义Public目录的路径
$publicDirectory = 'Public';
$totalFiles = countFilesInDirectory($publicDirectory);
$totaltags = [];

$directoryPath = './source/_posts';

try {
    $dir = new DirectoryIterator($directoryPath);
    foreach ($dir as $fileInfo) {
		$tags="";
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
                $pattern = '/' . preg_quote('tags:', '/') . '(.*?)' . preg_quote('categories:', '/') . '/s';
                if (preg_match($pattern,$content,$matches)) {
					$element = explode(" - ", $matches[1]);
					while (!empty($element)) {
							$r=array_pop($element);
							$tags=$r.'","'.$tags;
							if (!in_array($r,$totaltags )) {
							    $totaltags[]=$r;
							}
					}
                } else {
					 # echo "未找到 'Tags' 后面的内容。";
                }
				if (preg_match('/---\s*(.*)/', $content, $matches)) {
				    // 输出提取到的内容
					$preview=$matches[1];
				} else {
				    // 如果没有匹配到，输出提示信息
				    # echo "未找到 '---' 后面的内容。";
				}
				preg_match('/categories:\s*(.*)/', $content, $categoriesMatches);
				$category=$categoriesMatches[1];
				#title
				$title = isset($titleMatches[1]) ? trim($titleMatches[1]) : '';
				$title=htmlspecialchars($title);
				
				#tags

				$tags = substr($tags,5,-3);
				$tags = str_replace(["\n", "\r", " "], "", $tags);
				if(empty($tags))
					$tags="undefined";
					
				#preview	
				if(empty($preview))
					$preview="undefined";
				$parsedown = new ParsedownExtra();
				$preview = $parsedown->text($preview);
				$preview=strip_tags($preview);
				$preview=htmlspecialchars($preview, ENT_QUOTES, 'UTF-8');
				$preview=substr($preview,0,256);
				$preview = iconv('UTF-8', 'UTF-8//IGNORE',$preview);
				
				
				#const blogUrl = `/blog/${encodeURIComponent(article.title)}`;
				$blogUrl = $publicDirectory.'/'.$fileInfo->getFilename();
				$var_blog[]=$blogUrl;
				$text= <<<EOF
									{
									title: "{$title}",
									date: "{$date}",
									category: "{$category}",
									tags: ["{$tags}"],
									preview:"{$preview}",
									},
								EOF;
            } else {
                echo "读取文件 {$filePath} 时发生错误。<br>";
                continue;
            }
        }
$array=$array.$text;
$articles= <<<EOF
	const articles = [{$array}];
EOF;
    }
} catch (UnexpectedValueException $e) {
    echo "目录访问出错: ". $e->getMessage();
}
var_dump($var_blog);



?>
