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
	<form action='admin.php' method="post">
	    <input type="hidden" name="loginout" value="start">
	    <input type="submit" value="注销用户">
	</form>
	
	使用教程:请将需要渲染的文件放置于路径:./source/_posts文件.

</body>
</html>
<?php
$_path = <<<'EOF'
<?php
$currentDir = getcwd();
# echo "当前工作目录: ". $currentDir. "\n";
// 切换到上一级目录
$parentDir = dirname($currentDir);
if (chdir($parentDir)) {
    // 获取切换后的工作目录
    $newDir = getcwd();
    require_once('config.php');
    require_once('refresh.php');
} else {
    echo "切换目录失败\n";
}
?>
EOF;

// 加载 Parsedown 和 页面渲染框架
require_once './config.php';
require_once './include/Parsedown.php';
require_once './include/ParsedownExtra.php';
#$NAME="Noobspace";$TAG="";$CATEGORIES="";$USERS="";$DEFAULT= <<<EOF
?>



<?php 
	header('Content-type:text/html; charset=utf-8');
	// 开启Session
	session_start();

	// 处理用户登录信息
	if (isset($_POST['login'])) {
		# 接收用户的登录信息
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		// 判断提交的登录信息
		if (($username == '') || ($password == '')) {
			// 若为空,视为未填写,提示错误,并3秒后返回登录界面
			header('refresh:3; url=login.php');
			echo "用户名或密码不能为空,系统将在3秒后跳转到登录界面,请重新填写登录信息!";
			exit;
		} elseif (($username != 'username') || ($password != 'password')) {
			# 用户名或密码错误,同空的处理方式
			header('refresh:3; url=login.html');
			echo "用户名或密码错误,系统将在3秒后跳转到登录界面,请重新填写登录信息!";
			exit;
		} elseif (($username = 'username') && ($password = 'password')) {
					# 用户名和密码都正确,将用户信息存到Session中
					$_SESSION['username'] = $username;
					$_SESSION['islogin'] = 1;
					// 若勾选7天内自动登录,则将其保存到Cookie并设置保留7天
					if ($_POST['remember'] == "yes") {
						setcookie('username', $username, time()+7*24*60*60);
						setcookie('code', md5($username.md5($password)), time()+7*24*60*60);
					} else {
						// 没有勾选则删除Cookie
						setcookie('username', '', time() - 999);
						setcookie('code', '', time() - 999);
					}
					// 处理完附加项后跳转到登录成功的首页
					header('location:index.php');
				}
		}
 ?>


<?php
if ($_SESSION['username'] === $username && $_SESSION['islogin'] === 1) {
	$data="";
	echo("登录成功！");
    // 登录成功，跳转到欢迎页面
	// 创建 ParsedownExtra 实例
	$parsedown = new ParsedownExtra();
	// 替换为实际的目录路径
	$directoryPath = './source/_posts';
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
		                try {
		                    $markdown = $parsedown->text($content);
		                } catch (Error $e) {
		                    // 记录错误并处理异常
		                    error_log("Parsing error: " . $e->getMessage());
		                    echo "写入文件 {$outputFilePath} 时发生错误：Markdown解析错误。<br>";
		                }
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
	
	
} else {
    // 登录失败，返回登录页面并显示错误信息
    header("Location: login.php?error=1");
    exit();
}
?>