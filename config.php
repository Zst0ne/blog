<?php

$NAME = "Stone's Blog"; // 页面标题
$DEFAULT = '<meta name="author" content="Stone">
            <meta name="copyright" content="Stone">
            <meta name="format-detection" content="telephone=no">
            <meta name="theme-color" content="#ffffff">'; // 默认的meta标签
$HEAD = '<link rel="stylesheet" href="/css/index.css?v=4.13.0">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/all.min.css">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0.33/dist/fancybox/fancybox.min.css" media="print" onload="this.media=\'all\'">'; // 头部引入的CSS和JS
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
        <div class="aplayer no-destroy" data-id="464916877" data-server="netease" data-type="song" data-fixed="true" data-autoplay=""> </div>
        <script id="click-show-text" src="https://cdn.jsdelivr.net/npm/butterfly-extsrc@1.1.3/dist/click-show-text.min.js" data-mobile="false" data-text="F,A,Q" data-fontsize="15px" data-random="false" async="async"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer@1.10.1/dist/APlayer.min.css" media="print" onload="this.media=\'all\'">
        <script src="https://cdn.jsdelivr.net/npm/aplayer@1.10.1/dist/APlayer.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/butterfly-extsrc@1.1.3/metingjs/dist/Meting.min.js"></script>
        <script async data-pjax src="//busuanzi.ibruce.info/busuanzi/2.3/busuanzi.pure.mini.js"></script>
        <script src="/live2dw/lib/L2Dwidget.min.js?094cbace49a39548bed64abff5988b05"></script>
        <script>L2Dwidget.init({"log":false,"pluginJsPath":"lib/","pluginModelPath":"assets/","pluginRootPath":"live2dw/","tagMode":false});</script>'; // 页面底部内容
?>
