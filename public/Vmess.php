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
			    <style>
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
            <li><a href="#">首页</a></li>
            <li><a href="links.php">友链</a></li>
            <li><a href="other.php">其它</a></li>
			<li><a href="login.php">登录</a></li>
            <li><a href="about.php">关于</a></li>
        </ul>
    </nav>
  </head>
				 <body class="bg-gray-50">
		<div class="max-w-7xl mx-auto px-4 py-8">
			 <div class="grid grid-cols-12 gap-8">
				<div class="col-span-8"><p>title: 【装逼向】如何获得朝鲜IP
tags:</p>
<ul>
<li>VPN
categories:</li>
<li>原创文章</li>
<li>
<h2>网络安全</h2>
</li>
</ul>
<p><strong>本教程引用了其他大佬的博客教程<a href="https://www.nodeseek.com/post-17017-1">nodeseek</a>侵删</strong>
首先推荐一个云服务器平台(菠萝云)<a href="https://globalvm.top/">globalvm</a>【非广告】，这个平台自己已经搭建了
朝鲜和南极洲等地区WARP出口节点，有独立IPv6和共享IPv4，而且一个月只需要5块，<del>算比较贵的了只能玩玩</del>
如果你自己的电脑支持IPv6，那可爽了，如果没有，也可以通过Frp等方式穿透。</p>
<h2>基本概念</h2>
<pre><code>首先我会给大家介绍一下我们常用绕过GFW的方式
以下是VMess、VLESS、Trojan、Shadowsocks和SOCKS5的详细特点对比表格：</code></pre>
<table>
<thead>
<tr>
<th>特点</th>
<th>VMess</th>
<th>VLESS</th>
<th>Trojan</th>
<th>Shadowsocks</th>
<th>SOCKS5</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>安全性</strong></td>
<td>高。支持多种加密方式，动态端口和伪装能力，防止流量分析和封锁。</td>
<td>高。依赖外部TLS（如XTLS）保证安全性，去除了加密层。</td>
<td>高。模仿HTTPS流量，使用TLS加密，绕过防火墙检测。</td>
<td>较高。支持多种加密算法，但易被深度包检测（DPI）识别。</td>
<td>较低。无加密或依赖外部加密，易被拦截。</td>
</tr>
<tr>
<td><strong>速度</strong></td>
<td>较快。传输效率高，复杂网络环境下表现良好。</td>
<td>较快。去除了加密层，减少协议开销，速度更快。</td>
<td>较快。设计简洁，传输效率高，TLS加密下表现优异。</td>
<td>较快。轻量级协议，传输效率高。</td>
<td>较慢。无优化，传输效率较低。</td>
</tr>
<tr>
<td><strong>稳定性</strong></td>
<td>较好。支持多种传输协议（TCP、mKCP、WebSocket等），适应不同网络环境。</td>
<td>较好。轻量级设计，支持多种传输协议，稳定性高。</td>
<td>较好。模仿HTTPS流量，稳定性高，适合长期使用。</td>
<td>较好。轻量级协议，稳定性较高。</td>
<td>一般。无优化，稳定性较差。</td>
</tr>
<tr>
<td><strong>兼容性</strong></td>
<td>较好。支持多种平台和客户端配置，兼容性强。</td>
<td>较好。兼容V2Ray生态系统，支持多种客户端和服务器配置。</td>
<td>较好。支持多种客户端和服务器配置，兼容性较强。</td>
<td>较好。支持多种平台和客户端，兼容性较强。</td>
<td>较差。部分客户端和网络环境不支持。</td>
</tr>
<tr>
<td><strong>复杂度</strong></td>
<td>较高。配置复杂，需设置ID、AlterID等参数，适合技术用户。</td>
<td>较低。去除了AlterID等复杂参数，配置简单，适合新手。</td>
<td>较高。需配置TLS证书和伪装域名，适合有一定技术背景的用户。</td>
<td>较低。配置简单，适合新手用户。</td>
<td>较低。配置简单，适合基础用户。</td>
</tr>
<tr>
<td><strong>适用场景</strong></td>
<td>适合需要高安全性和复杂网络环境的用户。</td>
<td>适合追求速度和简单配置的用户。</td>
<td>适合需要高安全性和伪装流量的用户。</td>
<td>适合轻量级使用和简单翻墙需求的用户。</td>
<td>适合基础代理需求，无需高安全性的场景。</td>
</tr>
</tbody>
</table>
<h3>总结：</h3>
<ul>
<li><strong>VMess</strong>：安全性高，配置复杂，适合技术用户。</li>
<li><strong>VLESS</strong>：速度快，配置简单，适合新手。</li>
<li><strong>Trojan</strong>：安全性高，适合需要伪装流量的用户。</li>
<li><strong>Shadowsocks</strong>：轻量级，适合简单翻墙需求。</li>
<li><strong>SOCKS5</strong>：基础代理，适合无需高安全性的场景。</li>
</ul>
<h3>其他协议：</h3>
<p>PPTP：适合小型企业。
L2TP：适用于大型企业。
IPSec：适用于更多样化的网络环境和安全需求。
SSL/TLS：工作在应用层，适用于不同的场景。
<strong>这些协议的初衷并不是用来绕过GFW，只是他们可以完成这些功能</strong></p>
<h2>关于朝鲜IP</h2>
<p>朝鲜 VPS 实际位于香港。使用 WARP 获取朝鲜 IPv4。
给了一个朝鲜的 IPv6，用于入口访问，不能用于出口访问。出口只能使用 WARP 的 IPv4。
思路猜测：广播了一个注册在朝鲜的 v6 地址给香港母鸡，然后母鸡套WARP（WARP不是根据VPS实际所在地分配IP的），禁止小鸡IPv6出口访问（防止被IP库识别）。这样在外界看不到 IPv6，可以延长 v6 朝鲜位置的存活时间。可以发现 v6 是 PoloCloud 广播的。
（大概的原理就是通过向IP库网站伪造地址）</p>
<h2>服务端：</h2>
<h2>X-UI 应该是最简单和方便的自己配置节点的面板了。</h2>
<p>我们可以直接使用PVE面板中的VNC登录</p>
<p>如下图,先点击PVE信息，查看PVE登录信息，然后点击PVE控制面板，完成PVE登录(注意使用手机登陆PVE面板可能会报错,建议使用平板或者电脑登录)</p>
<p>登录pve面板后点击qemu,然后再点击控制台,便会为我们连接VNC</p>
<p>然后在VNC面板中输入你设置的ROOT用户密码（注意这里输密码时屏幕不会显示出来，输完后回车即可）</p>
<h3>节点搭建</h3>
<p>首先更新一下软件包和安装必要的软件</p>
<pre><code class="language-bash">apt update &amp;&amp; apt upgrade &amp;&amp; apt install curl wget -y</code></pre>
<p>如果你本地有IPv6，你可以尝试安装X-UI面板，然后用IPv6地址访问web面板。如果你本地只有IPv4，又没有双栈服务器进行流量转发（因为nnr好像不允许转发HTTP流量，所以只能用自己的双栈服务器转发http流量），那你可能无法访问X-UI面板，那建议直接使用Xray-core</p>
<h3>X-UI安装</h3>
<p>对于非朝鲜VPS可以使用一键脚本进行安装</p>
<pre><code class="language-bash">bash &lt;(curl -Ls https://raw.githubusercontent.com/FranzKafkaYu/x-ui/master/install.sh)</code></pre>
<p>朝鲜的VPS可以使用下列命令手动安装</p>
<pre><code class="language-bash">wget --no-check-certificate https://pan.ccckfg.top/d/Onedrive/%E8%B5%84%E6%BA%90/x-ui-linux-amd64.tar.gz
cd /root/
rm x-ui/ /usr/local/x-ui/ /usr/bin/x-ui -rf
tar zxvf x-ui-linux-amd64.tar.gz
chmod +x x-ui/x-ui x-ui/bin/xray-linux-* x-ui/x-ui.sh
cp x-ui/x-ui.sh /usr/bin/x-ui
cp -f x-ui/x-ui.service /etc/systemd/system/
mv x-ui/ /usr/local/
curl -o /usr/local/x-ui/bin/config.json -fSL https://pan.ccckfg.top/d/Onedrive/%E8%B5%84%E6%BA%90/config.json
systemctl daemon-reload
systemctl enable x-ui
systemctl restart x-ui</code></pre>
<p>这个手动安装的X-UI会默认内置一个VMESS节点,将以下分享链接导入后，手动编辑一下服务器地址和端口为你自己的就可以使用了</p>
<pre><code>vmess://eyJhZGQiOiIxMjcuMC4wLjEiLCJhaWQiOiIwIiwiYWxwbiI6IiIsImZwIjoiIiwiaG9zdCI6IiIsImlkIjoiNWQwZTM4YmItYzYwMC00ZTM3LTg5YmYtY2M4ZmRmMmFmNGE0IiwibmV0Ijoid3MiLCJwYXRoIjoiL2tvciIsInBvcnQiOiI2NjY2IiwicHMiOiJLLk8uUnxrb3J1c2VyQHVjZXkuaWN1Iiwic2N5IjoiYXV0byIsInNuaSI6IiIsInRscyI6IiIsInR5cGUiOiIiLCJ2IjoiMiJ9</code></pre>
<h3>Xray-core 命令行配置</h3>
<p>如果你不想使用或者不能够使用X-UI,建议使用以下模板进行Xray-core安装</p>
<p><a href="https://github.com/chika0801/Xray-examples">https://github.com/chika0801/Xray-examples</a></p>
<h3>NNR转发设置</h3>
<p>先查看一下nnr的节点监控，看一下有哪些转发服务器可用</p>
<p>然后再添加转发规则（目标服务器和目标端口填你刚刚在VPS上设定的端口和VPS的IP），添加完后你应该会看到这样的对应关系</p>
<p>其中的“源”就是转发服务器的端口和IP，就是说所有发送到源IP和端口的流量，都会原封不动的转发给目标。</p>
<p>我们添加好转发规则后，可以在代理软件中，将服务器的IP和端口替换为“源”就行了</p>
<pre><code>
朝鲜 VPS 实际位于香港。使用 WARP 获取朝鲜 IPv4。
给了一个朝鲜的 IPv6，用于入口访问，不能用于出口访问。出口只能使用 WARP 的 IPv4。
思路猜测：广播了一个注册在朝鲜的 v6 地址给香港母鸡，然后母鸡套WARP（WARP不是根据VPS实际所在地分配IP的），禁止小鸡IPv6出口访问（防止被IP库识别）。这样在外界看不到 IPv6，可以延长 v6 朝鲜位置的存活时间。可以发现 v6 是 PoloCloud 广播的。
（大概的原理就是通过向IP库网站伪造地址）</code></pre>
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