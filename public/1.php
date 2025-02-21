<?php
// 获取当前工作目录
$currentDir = getcwd();
echo "当前工作目录: ". $currentDir. "\n";

// 切换到上一级目录
$parentDir = dirname($currentDir);
if (chdir($parentDir)) {
    // 获取切换后的工作目录
    $newDir = getcwd();
	require_once('config.php');
	require_once('refresh.php');
} else {
    #"切换目录失败\n";
}
$bodydiv=<<<EOF
			  <body class="bg-gray-50">
			    <div class="max-w-7xl mx-auto px-4 py-8">
			      <div class="grid grid-cols-12 gap-8">
			        <div class="col-span-8">
			          <div class="space-y-6">
			            <div
			              id="articleList"
			              class="space-y-6 article-list overflow-y-auto"
			              style="max-height: calc(100vh - 2rem);" >
						  
						  
						  </div>
						  			<h2>title: 【超简单&amp;开源】最新Windows/Office激活方法
						  			date: 2024-05-22 12:57:34
						  			tags:</h2>
						  			<p>该方法仅支持Windows 8/10/11 Server12以上系统。<BR>
						  			首先Win+S 在搜索框中以管理员权限启动Powershell<BR></p>
						  			<pre><code>irm https://massgrave.dev/get | iex</code></pre>
						  			<p>如果在较旧的 Windows 版本上，您可能需要先运行以下命令：</p>
						  			<p><code>[Net.ServicePointManager]::SecurityProtocol=[Net.SecurityProtocolType]::Tls12</code>
						  			Powershell 方法在 Windows 7 上不起作用。请改用方法 2 - 繁体。
						  			URL get.activated.win 可能会被某些 DNS 服务阻止，因为它是一个新域。</p>
						  			<p><img src="../img/KMS.png" alt="KMS" /></p>
						  			<p>如图 即进入激活工具，按照指示通过数字键选择激活的模块和模式即可。</p>
						  			</div>
						            </div>
						          </div>
			          </div>
			        </div>
			
			        <div class="col-span-4 space-y-6">
			          <div class="bg-white rounded-lg p-6 shadow-sm">
			            <div class="flex items-center space-x-4">
			              <img
			                src="../img/head2.jpg"
			                class="w-16 h-16 rounded-full object-cover"
			                alt="avatar"
			              />
			              <div>
			                <h2 class="text-xl font-bold">Stone</h2>
			                <div class="flex space-x-6 mt-2">
			                  <div class="text-center">
			                    <div class="text-lg font-bold"><?php echo $totalFiles; ?></div>
			                    <div class="text-sm text-gray-500">文章</div>
			                  </div>
			                  <div class="text-center">
			                    <div class="text-lg font-bold"><?php echo count($totaltags); ?></div>
			                    <div class="text-sm text-gray-500">标签</div>
			                  </div>
			                  <div class="text-center">
			                    <div class="text-lg font-bold"><?php echo $totalFiles; ?></div>
			                    <div class="text-sm text-gray-500">分类</div>
			                  </div>
			                </div>
			              </div>
			            </div>
EOF;
?>

<!DOCTYPE html>
<html lang="zh">
  <head>
	<?php echo $STYLES; echo $DEFAULT;?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $NAME; ?></title>
	
	<?php echo $HEAD; ?>
	
  </head>
			<?php echo $bodydiv;?>
		  	<?php echo $SOCIAL; ?>
			<?php echo $ANNOUNCEMENT; ?>
			<?php echo $LIVE2D; ?>
          </div>
        </div>
      </div>
    </div>

    <script>
    </script>
	<?php echo $MUSIC; ?>
  </body>
</html>
