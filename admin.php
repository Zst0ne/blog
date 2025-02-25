<?php
// 在最开始就进行session验证
session_start();
header('Content-type:text/html; charset=utf-8');
$directoryPath = './source/_posts';
// 处理登出请求
if (isset($_POST['loginout'])) {
    session_destroy();
    setcookie('username', '', time() - 3600);
    setcookie('code', '', time() - 3600);
    header('Location: login.php');
    exit();
}
// 处理登出请求
if (isset($_POST['create'])) {
	header('Location: edit.php');
	exit;
}
// 处理用户登录信息

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    // 这里应该使用配置文件中的用户名和密码哈希值进行比对
    // 为了演示，这里使用硬编码的值（实际使用时应该放在配置文件中）
    $correct_username = 'admin';
    $correct_password_hash = password_hash('admin', PASSWORD_DEFAULT);
    if (empty($username) || empty($password)) {
        header('Location: login.php?error=empty');
        exit;
    }
    if ($username === $correct_username && password_verify($password, $correct_password_hash)) {
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        $_SESSION['islogin'] = 1;
        $_SESSION['last_activity'] = time();
        if (isset($_POST['remember']) && $_POST['remember'] == "yes") {
            $token = bin2hex(random_bytes(32));
            setcookie('remember_token', $token, time() + 7*24*60*60);
            // 在数据库中保存token（这里省略具体实现）
        }
        header('Location: admin.php');
        exit;
    } else {
        header('Location: login.php?error=invalid');
        exit;
    }
}

// 验证用户是否已登录
if (!isset($_SESSION['islogin']) || $_SESSION['islogin']!== 1) {
    header('Location: login.php');
    exit();
}

// 检查session是否过期（30分钟）
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
    session_destroy();
    header('Location: login.php?error=expired');
    exit();
}
$_SESSION['last_activity'] = time();

// 加载必要的文件
require_once './config.php';
require_once './include/Parsedown.php';
require_once './include/ParsedownExtra.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        form {
            margin: 15px 0;
            width: 300px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .tutorial {
            margin-top: 30px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
    </style>
</head>

<body>
	<h1>管理界面</h1>
    <!-- 添加一个隐藏输入字段，用于提交判断 -->
    <form action='admin.php' method="post">
        <input type="hidden" name="deploy" value="start">
        <input type="submit" value="开始部署资源文件">
    </form>

    <form action='admin.php' method="post">
        <input type="hidden" name="generate" value="start">
        <input type="submit" value="开始渲染Markdown文件">
    </form>

    <form action='edit.php' method="post">
        <input type="hidden" name="edit" value="start">
        <input type="submit" value="发布文章">
    </form>

	<form action='admin.php' method="post">
	    <input type="hidden" name="browse" value="start">
	    <input type="submit" value="浏览文章">
	</form>

    <form action='admin.php' method="post">
        <input type="hidden" name="loginout" value="start">
        <input type="submit" value="注销用户">
    </form>

    <div class="tutorial">
        使用教程:请将需要渲染的文件放置于路径:./source/_posts文件.
    </div>
</body>

</html>

<?php
	$data="";
	echo("登录成功！");
    // 登录成功，跳转到欢迎页面
	// 创建 ParsedownExtra 实例
	$parsedown = new ParsedownExtra();
	// 替换为实际的目录路径
	if($_POST['generate']=='start'){
		echo "<br>准备渲染Markdown文件：<br>";
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
		                $markdown = $parsedown->text($content);
						$divtext=<<<EOF
							 <body class="bg-gray-50">
								<div class="max-w-7xl mx-auto px-4 py-8">
									 <div class="grid grid-cols-12 gap-8">
										<div class="col-span-8">{$markdown}
															          <div class="space-y-6">
															            <div
															              id="articleList"
															              class="space-y-6 article-list overflow-y-auto"
															              style="max-height: calc(100vh - 2rem);"
															            ></div>
															          </div>
															        </div>
						EOF;
						$HTML= <<<EOF
						<!DOCTYPE html>
						<html lang="zh">
						  <head>
							{$STYLES} {$DEFAULT}
						    <meta charset="UTF-8" />
						    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
						    <title>{$NAME}</title>
									{$HEAD}
									{$NAVIGATION}
						  </head>
									{$divtext}
									{$bodydiv}
								  	{$SOCIAL}
									{$ANNOUNCEMENT}
									{$LIVE2D}
						          </div>
						        </div>
						      </div>
						    </div>
						
						    <script>
						    </script>
							{$MUSIC}
						  </body>
						</html>
						EOF;

		                $data = $_path."<?php header('Content-Type: text/html; charset=utf-8'); ?>";  #定义文本编码
		                $data = "".$data.$HTML;  #定义文本编码
							
				
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
	
	// 处理浏览文章
if (isset($_POST['browse'])) {
    try {
        $dir = new DirectoryIterator($directoryPath);
        echo '<ul>'; // 开始无序列表
        foreach ($dir as $fileInfo) {
            if ($fileInfo->isDot()) {
                continue;
            }
            if ($fileInfo->isDir()) {
                echo '<li>目录: '. $fileInfo->getFilename(). '</li>';
            } else {
                echo '<li>文件: '. $fileInfo->getFilename(). '</li>';
                // 获取完整的文件路径
				$fileName = $fileInfo->getFilename();
                $filePath = $fileInfo->getPathname();
                $content = file_get_contents($filePath);
                if ($content!== false && $fileInfo->isFile() && pathinfo($filePath, PATHINFO_EXTENSION) === 'md') {
                    $link = '<li><a href="edit.php?edit='. htmlspecialchars($fileName). '">编辑：'. htmlspecialchars($fileName). '</a></li>';
                    echo $link;
                }
            }
        }
        echo '</ul>'; // 结束无序列表
    } catch (UnexpectedValueException $e) {
        echo "目录访问出错: ". $e->getMessage();
    }
}

?>