<?php
$TITLE = 'Stone';
$NAME = "Stone's Blog"; // 页面标题

$USERNAME = "admin";
$PASSWORD = "admin";

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
$SOCIAL = <<<EOF
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

$bodydiv=<<<'EOF'
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

