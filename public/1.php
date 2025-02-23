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
				<div class="col-span-8"><p>title: 没有痛心疾首的悔恨，只有愿赌服输的坦然
tags:</p>
<ul>
<li>Hexo</li>
<li>币圈
categories:</li>
<li>原创文章</li>
<li>
<h2>币圈</h2>
<h3>写这篇文章的时候我已经控制不了自己的情绪了。。。。</h3>
</li>
</ul>
<p>哎呦我操，这不就是那帮天天吹牛逼的web3狗吗？一个个装得跟未来科技先锋似的，实际上不就是想搞点灰产，割韭菜吗？还区块链、去中心化，吹得天花乱坠，结果呢？不就是一群想不劳而获的懒狗，整天想着怎么空手套白狼。</p>
<p>你看看这帮人，天天喊着“颠覆传统金融”，结果自己连个正经工作都没有，就靠忽悠小白进场接盘。什么NFT、元宇宙，全是泡沫，骗的就是那些不懂还爱跟风的傻逼。你说你搞技术就搞技术吧，非要搞得跟传销似的，拉人头、建社群，动不动就“共识”、“信仰”，我呸！共识你妈呢，不就是想让人接盘吗？</p>
<p>还有那些所谓的“大佬”，一个个装得跟先知似的，动不动就“未来已来”，结果自己偷偷摸摸出货跑路。你说你们这帮人，除了会炒概念、割韭菜，还会干啥？正经技术没见你们搞出来，倒是骗钱的本事一流。</p>
<p>总之啊，web3这圈子，说白了就是一帮想不劳而获的投机分子，整天想着怎么空手套白狼，包括我在内也是纯纯傻逼来的，愿让西方资本和国内机构收割，我操死你们那些过河拆桥发财的有钱人，你们害的多少人家破人亡，要是在早几十年，你们都得挨个拉清单。</p>
<p>最后，在这个圈子，不相信眼泪：没有痛心疾首的悔恨，只有愿赌服输的坦然<img src="http://qzonestyle.gtimg.cn/qzone/em/e10349.gif" title=""></p>
<p><img src="img/okx/image.png" alt="图片" />
<img src="img/okx/image%201.png" alt="图片1" />
<img src="img/okx/image%202.png" alt="图片2" />
<img src="img/okx/image%203.png" alt="图片3" /></p>
<p>最后，实在不太推荐入行啊，但是你们不介意可以用我的邀请码，欧易会返现10USDT给新用户，当然我们都可以赚点：<a href="https://okx.com/join/60289352">https://okx.com/join/60289352</a></p>
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
		  	<button class="w-full bg-primary text-white py-2 rounded-button mt-4 !rounded-button hover:bg-primary/90 transition-colors">
  关注我的抖音账号
</button>
<div class="flex justify-center space-x-4 mt-4">
  <div class="w-8 h-8 flex items-center justify-center">
    <a href="https://example.com/notification" target="_blank"> <!-- 替换为实际的通知链接 -->
      <i class="ri-notification-3-line text-xl text-gray-600 hover:text-primary cursor-pointer"></i>
    </a>
  </div>
  <div class="w-8 h-8 flex items-center justify-center">
    <a href="https://github.com/Zst0NE/blog" target="_blank"> <!-- 替换为实际的GitHub链接 -->
      <i class="ri-github-line text-xl text-gray-600 hover:text-primary cursor-pointer"></i>
    </a>
  </div>
  <div class="w-8 h-8 flex items-center justify-center">
    <a href="https://example.com/calendar" target="_blank"> <!-- 替换为实际的日历链接 -->
      <i class="ri-calendar-line text-xl text-gray-600 hover:text-primary cursor-pointer"></i>
    </a>
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
</html>