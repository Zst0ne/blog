<?php
$TITLE = 'Stone';
$NAME = "Stone's Blog"; // 页面标题

$_USERNAME = "admin";
$_PASSWORD = "admin";

$STYLE = <<<EOF
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="/css/index.css?v=4.13.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0.33/dist/fancybox/fancybox.min.css" media="print" onload="this.media=\'all\'">
EOF;

$DEFAULT = <<<EOF
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
EOF; // 默认的meta标签

$HEAD = <<<EOF
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
      :where([class^="ri-"])::before { content: "\f3c2"; }
      .article-list::-webkit-scrollbar {display: none;}
    </style>
EOF;

$NAVIGATION = <<<EOF
    <style>
        /* 删除之前的通用img旋转样式 */
        /* 只为头像添加旋转效果 */
        .avatar-rotate {
          transition: transform 0.5s ease;
        }
        
        .avatar-rotate:hover {
          transform: rotate(360deg);
        }

        /* 其他导航栏样式保持不变 */
        nav {
            background-color: #333;
            overflow: hidden;
        }
	

	
        /* 导航栏样式 */
        nav {
            background-color: #333;
            overflow: hidden;
        }

        /* 导航链接样式 */
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav li {
            float: left;
        }

        nav li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* 鼠标悬停效果 */
        nav li a:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <!-- 导航栏 -->
    <nav>
        <ul>
            <li><a href="/index.php">首页</a></li>
            <li><a href="/links.php">友链</a></li>
            <li><a href="/other.php">其它</a></li>
			      <li><a href="/login.php">登录</a></li>
            <li><a href="/about.php">关于</a></li>
        </ul>
    </nav>
EOF;
$COMMENTS = <<<EOF
    <!-- 评论区容器 -->
    <div id="tcomment"></div>

    <!-- 引入 Twikoo JavaScript -->
    <script src="https://cdn.staticfile.org/twikoo/1.6.16/twikoo.min.js"></script>
    <script>
        twikoo.init({
            envId: "https://twikoo-git-main-zst0nes-projects.vercel.app", // 替换为你的 Twikoo 环境 ID
            el: '#tcomment',
        });
	</script>
EOF;
$SOCIAL = <<<EOF
<button class="w-full bg-primary text-white py-2 rounded-button mt-4 !rounded-button hover:bg-primary/90 transition-colors">
  <a href="https://example.com/notification" target="_blank">关注我的抖音账号</a>
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
EOF;

$ANNOUNCEMENT = <<<EOF
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
EOF;

$WEBINFO = <<<EOF
<div class="bg-white rounded-lg p-6 shadow-sm">
    <div class="card-widget card-webinfo">
      <div class="item-headline">
        <i class="fas fa-chart-line"></i>
        <span>网站资讯</span>
      </div>
      <div class="webinfo">
        <div class="webinfo-item">
          <div class="item-name">本站访客数 :</div>
          <div class="item-count" id="busuanzi_value_site_uv"> 1046</div>
        </div>
        <div class="webinfo-item">
          <div class="item-name">本站总访问量 :</div>
          <div class="item-count" id="busuanzi_value_site_pv">{}</div>
        </div>
        <div class="webinfo-item">
          <div class="item-name">最后更新时间 :</div>
          <div class="item-count" id="last-push-date" data-lastpushdate="2025-02-24T06:02:55.886Z"></div>
        </div>
      </div>
    </div>
  </div>
EOF;

$LIVE2D = <<<EOF
			<script src="/live2dw/lib/L2Dwidget.min.js?094cbace49a39548bed64abff5988b05"></script>
			<script>L2Dwidget.init({"log":false,"pluginJsPath":"lib/","pluginModelPath":"assets/","pluginRootPath":"live2dw/","tagMode":false});</script>
EOF;

$TOP = '<div id="web_bg"></div>
        <div id="sidebar">
            <div id="menu-mask"></div>
            <div id="sidebar-menus">
                <div class="avatar-img is-center">
                    <img src="/img/head.jpg" onerror="onerror=null;src=\'/img/friend_404.gif\'" alt="avatar"/>
                </div>
                <div class="sidebar-site-data site-data is-center">
                    <a href="/archives/">
                        <div class="headline">文章</div>
                        <div class="length-num">35</div>
                    </a>
                    <a href="/tags/">
                        <div class="headline">标签</div>
                        <div class="length-num">18</div>
                    </a>
                    <a href="/categories/">
                        <div class="headline">分类</div>
                        <div class="length-num">19</div>
                    </a>
                </div>
                <hr class="custom-hr"/>
            </div>
        </div>
        <div class="page" id="body-wrap">
            <header class="full_page" id="page-header" style="background-image: url(\'/img/CQ.jpg\')">
                <nav id="nav">
                    <span id="blog-info">
                        <a href="/" title="Stone\'s Blog">
                            <span class="site-name">Stone\'s Blog</span>
                        </a>
                    </span>
                    <div id="menus">
                        <div id="toggle-menu">
                            <a class="site-page" href="javascript:void(0);">
                                <i class="fas fa-bars fa-fw"></i>
                            </a>
                        </div>
                    </div>
                </nav>
                <div id="site-info">
                    <h1 id="site-title">Stone\'s Blog</h1>
                    <div id="site_social_icons">
                        <a class="social-icon" href="tencent://Message/?Uin=3010087667" target="_blank" title="">
                            <i class="fab fa-qq" style="color: #4a7dbe;"></i>
                        </a>
                        <a class="social-icon" href="https://github.com/Zst0NE" target="_blank" title="Github">
                            <i class="fab fa-github" style="color: #24292e;"></i>
                        </a>
                        <a class="social-icon" href="https://space.bilibili.com/289936991" target="_blank" title="Bilibili">
                            <i class="fab fa-bilibili" style="color: #4a7dbe;"></i>
                        </a>
                    </div>
                </div>
                <div id="scroll-down">
                    <i class="fas fa-angle-down scroll-down-effects"></i>
                </div>
            </header>
            <main class="layout" id="content-inner">
                <div class="recent-posts" id="recent-posts">
                    <!-- 文章列表 -->
                </div>
            </main>
        </div>'; // 页面顶部内容
$BOTTOM = '<footer id="footer">
            <div id="footer-wrap">
                <div class="copyright">&copy;2020 - 2025 By Stone</div>
                <div class="framework-info">
                    <span>框架 </span><a target="_blank" rel="noopener" href="https://hexo.io">Hexo</a>
                    <span class="footer-separator">|</span>
                    <span>主题 </span><a target="_blank" rel="noopener" href="https://github.com/jerryc127/hexo-theme-butterfly">Butterfly</a>
                </div>
                <div class="footer_custom_text">蜀ICP备2024077341号</div>
            </div>
        </footer>
        <div id="rightside">
            <div id="rightside-config-hide">
                <button id="darkmode" type="button" title="浅色和深色模式转换"><i class="fas fa-adjust"></i></button>
                <button id="hide-aside-btn" type="button" title="单栏和双栏切换"><i class="fas fa-arrows-alt-h"></i></button>
            </div>
            <div id="rightside-config-show">
                <button id="rightside-config" type="button" title="设置"><i class="fas fa-cog fa-spin"></i></button>
                <button id="go-up" type="button" title="回到顶部"><span class="scroll-percent"></span><i class="fas fa-arrow-up"></i></button>
            </div>
        </div>
        <script src="/js/utils.js?v=4.13.0"></script>
        <script src="/js/main.js?v=4.13.0"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0.33/dist/fancybox/fancybox.umd.min.js"></script>
        <div class="js-pjax"></div>
        <script> document.getElementsByClassName("copyright")[0].innerHTML = "©2024 By Stone 萌ICP备20250074号"; </script>
        <script id="click-show-text" src="https://cdn.jsdelivr.net/npm/butterfly-extsrc@1.1.3/dist/click-show-text.min.js" data-mobile="false" data-text="F,A,Q" data-fontsize="15px" data-random="false" async="async"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer@1.10.1/dist/APlayer.min.css" media="print" onload="this.media=\'all\'">
        <script src="https://cdn.jsdelivr.net/npm/aplayer@1.10.1/dist/APlayer.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/butterfly-extsrc@1.1.3/metingjs/dist/Meting.min.js"></script>
        <script async data-pjax src="//busuanzi.ibruce.info/busuanzi/2.3/busuanzi.pure.mini.js"></script>
        <script src="/live2dw/lib/L2Dwidget.min.js?094cbace49a39548bed64abff5988b05"></script>
        <script>L2Dwidget.init({"log":false,"pluginJsPath":"lib/","pluginModelPath":"assets/","pluginRootPath":"live2dw/","tagMode":false});</script>'; // 页面底部内容

$MUSIC = <<<EOF
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
EOF;

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

$bodydiv=<<<'EOF'
			        <div class="col-span-4 space-y-6">
			          <div class="bg-white rounded-lg p-6 shadow-sm">
			            <div class="flex items-center space-x-4">
                      <img
                        src="../img/head2.jpg"
                          class="w-16 h-16 rounded-full object-cover avatar-rotate"
                      alt="avatar"/>
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

$divtext=<<<EOF
    <body class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid grid-cols-12 gap-8">
                <div class="col-span-8">
                    <div class="prose prose-lg max-w-none">
                        {$markdown}
                    </div>
                    {$COMMENTS}
                    <div class="space-y-6">
                        <div id="articleList" class="space-y-6 article-list overflow-y-auto" style="max-height: calc(100vh - 2rem);"></div>
                    </div>
                </div>
EOF;

?>
