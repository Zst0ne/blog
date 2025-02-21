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
?><?php header('Content-Type: text/html; charset=utf-8'); ?><!DOCTYPE html>
<html lang="zh">
  <head>
	     <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stone's Blog</title>
	
			    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#3B82F6",
              secondary: "#6B7280",
            },
            borderRadius: {
              none: "0px",
              sm: "4px",
              DEFAULT: "8px",
              md: "12px",
              lg: "16px",
              xl: "20px",
              "2xl": "24px",
              "3xl": "32px",
              full: "9999px",
              button: "8px",
            },
          },
        },
      };
    </script>
    <style>
      :where([class^="ri-"])::before { content: "3c2"; }
      .article-list::-webkit-scrollbar {display: none;}
    </style>
	
  </head>
						  <body class="bg-gray-50">
			    <div class="max-w-7xl mx-auto px-4 py-8">
			      <div class="grid grid-cols-12 gap-8">
			        <div class="col-span-8">
			          <div class="space-y-6">
			            <div
			              id="articleList"
			              class="space-y-6 article-list overflow-y-auto"
			              style="max-height: calc(100vh - 2rem);"
			            ></div>
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
		  	            <button
              class="w-full bg-primary text-white py-2 rounded-button mt-4 !rounded-button hover:bg-primary/90 transition-colors">
              加入我的KOOK频道
            </button>
            <div class="flex justify-center space-x-4 mt-4">
              <div class="w-8 h-8 flex items-center justify-center">
                <i
                  class="ri-notification-3-line text-xl text-gray-600 hover:text-primary cursor-pointer"
                ></i>
              </div>
              <div class="w-8 h-8 flex items-center justify-center">
                <i
                  class="ri-github-line text-xl text-gray-600 hover:text-primary cursor-pointer"
                ></i>
              </div>
              <div class="w-8 h-8 flex items-center justify-center">
                <i
                  class="ri-calendar-line text-xl text-gray-600 hover:text-primary cursor-pointer"
                ></i>
              </div>
            </div>
          </div>
			          <div class="bg-white rounded-lg p-6 shadow-sm">
            <div class="flex items-center space-x-2 text-red-500">
              <i class="ri-megaphone-line text-lg"></i>
              <span class="font-bold">公告</span>
            </div>
            <div class="mt-4 text-sm text-gray-600 space-y-2">
              <p>Welcome! 友链、合作请联系我。</p>
              <p>诚邀各路大佬在此打赏自己的文章。</p>
              <p>欢迎加入我的QQ群：53344657</p>
            </div>
          </div>
						<script src="/live2dw/lib/L2Dwidget.min.js?094cbace49a39548bed64abff5988b05"></script>
			<script>L2Dwidget.init({"log":false,"pluginJsPath":"lib/","pluginModelPath":"assets/","pluginRootPath":"live2dw/","tagMode":false});</script>
          </div>
        </div>
      </div>
    </div>

    <script>
    </script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.css">
<script src="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.js"></script>
 
<div id='aplayer'></div>
 
<script>
    var ap = new APlayer
    ({
        element: document.getElementById('aplayer'),
        showlrc: false,
        fixed: true,
        mini: true,
        audio: [
        	{
                title: '半岛铁盒',
                author: '周杰伦',
                url: 'https://echeverra.cn/wp-content/uploads/2022/05/周杰伦-半岛铁盒.mp3',
                pic: 'https://echeverra.cn/wp-content/uploads/2022/05/周杰伦-半岛铁盒-mp3-image.png'
        	},
            {
                title: '给我一首歌的时间',
                author: '周杰伦',
                url: 'https://echeverra.cn/wp-content/uploads/2021/06/周杰伦-给我一首歌的时间.mp3',
                pic: 'https://echeverra.cn/wp-content/uploads/2021/06/周杰伦-给我一首歌的时间-mp3-image.png'
            }
		]
 
    });
    ap.init();
</script>
	
  </body>
</html><script> document.getElementsByClassName("text")[0].innerHTML = "<hr />
<p>title: 【装逼向】如何获得朝鲜IP
date: 2024-05-28 10:04:08
tags: </p>
<ul>
<li>VPN</li>
<li>
<h2>VPN</h2>
</li>
</ul>
<p><strong>本教程引用了其他大佬的博客教程<a href=\"https://www.nodeseek.com/post-17017-1\">nodeseek</a>侵删</strong>
首先推荐一个云服务器平台(菠萝云)<a href=\"https://globalvm.top/\">globalvm</a>【非广告】，这个平台自己已经搭建了
朝鲜和南极洲等地区WARP出口节点，有独立IPv6和共享IPv4，而且一个月只需要5块，<del>算比较贵的了只能玩玩</del>
如果你自己的电脑支持IPv6，那可爽了，如果没有，也可以通过Frp等方式穿透。</p>
<pre><code>朝鲜 VPS 实际位于香港。使用 WARP 获取朝鲜 IPv4。
给了一个朝鲜的 IPv6，用于入口访问，不能用于出口访问。出口只能使用 WARP 的 IPv4。
思路猜测：广播了一个注册在朝鲜的 v6 地址给香港母鸡，然后母鸡套WARP（WARP不是根据VPS实际所在地分配IP的），禁止小鸡IPv6出口访问（防止被IP库识别）。这样在外界看不到 IPv6，可以延长 v6 朝鲜位置的存活时间。可以发现 v6 是 PoloCloud 广播的。</code></pre>"; </script>