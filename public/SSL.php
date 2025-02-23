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
				<div class="col-span-8"><p>title: Hexo使用https访问(SSL加密)[butterfly主题]
tags:</p>
<ul>
<li>Hexo</li>
<li>HTTP
categories:</li>
<li>原创文章</li>
<li>
<h2>HTTP</h2>
</li>
</ul>
<h2>设置SSL证书加密</h2>
<p>首先去申请SSl证书，当你获得key 和 crt证书文件后下载到服务器。<br>
随后修改hexo中的"server.js"文件，如下[可直接复制]<br>
建议先备份原文件！！！</p>
<pre><code class="language-javascript">var fs = require('fs');
var connect = require('connect');
var http = require('https');
var chalk = require('chalk');
var Promise = require('bluebird');
var open = require('opn');
var net = require('net');
var url = require('url');
var express = require('express');

var httpApp = express();

httpApp.all("*", (req, res, next) =&gt; {
  let host = req.headers.host;
  host = host.replace(/\:\d+$/, ''); // Remove port number
  res.redirect(307, `https://${host}${req.path}`);
});

httpApp.listen(80, function () {
 console.log('http on 80 Welcome to Noobspace');
});

const options = {
    key : fs.readFileSync("noobspace.cn.key"),//改成你自己的key证书
    cert: fs.readFileSync("noobspace.cn_bundle.crt")//改成你自己的crt证书
}

module.exports = function(args) {
  var app = connect();
  var config = this.config;
  var ip = args.i || args.ip || config.server.ip || undefined;
  var port = parseInt(args.p || args.port || config.server.port || process.env.port, 10) || 4000;
  var root = config.root;
  var self = this;

  return checkPort(ip, port).then(function() {
    return self.extend.filter.exec('server_middleware', app, {context: self});
  }).then(function() {
    if (args.s || args.static) {
      return self.load();
    }

    return self.watch();
  }).then(function() {
    return startServer(http.createServer(options,app), 443, ip);
  }).then(function(server) {
    var addr = server.address();
    var addrString = formatAddress(ip || addr.address, addr.port, root);

    self.log.info('Hexo is running at %s . Press Ctrl+C to stop.', chalk.underline(addrString));
    self.emit('server');

    if (args.o || args.open) {
      open(addrString);
    }

    return server;
  }).catch(function(err) {
    switch (err.code){
      case 'EADDRINUSE':
        self.log.fatal('Port %d has been used. Try other port instead.', port);
        break;

      case 'EACCES':
        self.log.fatal('Permission denied. You can\'t use port ' + port + '.');
        break;
    }

    self.unwatch();
    throw err;
  });
};

function startServer(server, port, ip) {
  return new Promise(function(resolve, reject) {
    server.listen(port, ip, function() {
      resolve(server);
    });

    server.on('error', reject);
  });
}

function checkPort(ip, port) {
  return new Promise(function(resolve, reject) {
    if (port &gt; 65535 || port &lt; 1) {
      return reject(new Error('Port number ' + port + ' is invalid. Try a number between 1 and 65535.'));
    }

    var server = net.createServer();

    server.once('error', reject);

    server.once('listening', function() {
      server.close();
      resolve();
    });

    server.listen(port, ip);
  });
}

function formatAddress(ip, port, root) {
  var hostname = ip;
  if (ip === '0.0.0.0' || ip === '::') {
    hostname = 'localhost';
  }

  return url.format({protocol: 'http', hostname: hostname, port: port, path: root});
}
</code></pre>
<p>这是直接在Nodejs的APP上使用SSL证书，但是一般我更建议大家使用
Nginx或者Apache分发服务的SSL证书模块，它相较于复杂的去修改APP
节省了非常多的时间，下面是使用Nginx时作为分发的配置文件。</p>
<pre><code class="language-nginx">server {
    listen 443 ssl;
    server_name noobspace.cn; # 替换为你的域名，如果只是本地测试也可以用 localhost

    # SSL 证书和私钥配置
    ssl_certificate /root/hexo/noobspace.cn.crt;  # 证书文件路径
    ssl_certificate_key /root/hexo/noobspace.cn.key;  # 私钥文件路径

    # 其他 SSL 相关配置
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_ciphers HIGH:!aNULL:!MD5;

    location / {
        proxy_pass http://localhost:4000;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
    }
}</code></pre>
<p>以下是转换为 Markdown 格式的内容：</p>
<pre><code class="language-markdown">### SSL 证书申请与管理

#### 1. 使用 FreeSSL 申请证书
- **FreeSSL**（[http://freessl.cn](http://freessl.cn)）是一个简单易用的 SSL 证书申请平台。
- **Let's Encrypt** 支持通配符类型证书。
- **TrustAsia** 仅支持双域名类型证书。
- 申请界面友好，根据提示在域名解析记录中添加指定的 `TXT` 类型域名解析即可，适合不熟悉命令行的用户。

---

#### 2. 使用 `acme.sh` 自动申请证书
`acme.sh` 是一款用于自动申请 Let's Encrypt 证书的工具，适合追求后续维护稳定的用户。

##### 安装 `acme.sh`
- **方法一：使用 `curl` 命令安装**
  ```bash
  curl https://get.acme.sh | sh</code></pre>
<ul>
<li><strong>方法二：使用 <code>wget</code> 命令安装</strong><pre><code class="language-bash">wget -O - https://get.acme.sh | sh</code></pre>
</li>
</ul>
<p>安装完成后，重新加载环境变量：</p>
<pre><code class="language-bash">source ~/.bashrc</code></pre>
<h5>配置 <code>acme.sh</code></h5>
<ul>
<li>
<p><strong>获取 API 密钥</strong></p>
<ul>
<li>如果使用 DNS 验证方式申请证书，需要获取域名注册商的 API 密钥。</li>
<li>以阿里云为例，登录阿里云控制台，在“AccessKey 管理”中创建 AccessKey，记录下 <code>AccessKey ID</code> 和 <code>AccessKey Secret</code>。</li>
</ul>
</li>
<li>
<p><strong>设置 API 密钥</strong></p>
<ul>
<li>以阿里云为例，执行以下命令：<pre><code class="language-bash">export Ali_Key="your_ali_key"
export Ali_Secret="your_ali_secret"</code></pre>
</li>
<li>将 <code>your_ali_key</code> 和 <code>your_ali_secret</code> 替换为实际的阿里云 AccessKey ID 和 AccessKey Secret。</li>
</ul>
</li>
</ul>
<h5>申请证书</h5>
<ul>
<li>
<p><strong>使用 DNS 验证申请证书</strong></p>
<ul>
<li>以阿里云 DNS 为例，执行以下命令：<pre><code class="language-bash">acme.sh --issue -d example.com -d www.example.com --dns dns_ali</code></pre>
</li>
<li>将 <code>example.com</code> 和 <code>www.example.com</code> 替换为要申请证书的域名。如果只申请单个域名的证书，可只写一个 <code>-d</code> 参数。</li>
</ul>
</li>
<li>
<p><strong>使用 Webroot 验证申请证书</strong></p>
<ul>
<li>如果服务器上已经部署了网站，可以使用 Webroot 验证方式。执行以下命令：<pre><code class="language-bash">acme.sh --issue -d example.com -d www.example.com --webroot /var/www/html</code></pre>
</li>
<li>将 <code>example.com</code> 和 <code>www.example.com</code> 替换为要申请证书的域名，<code>/var/www/html</code> 替换为网站的根目录路径。</li>
</ul>
</li>
</ul>
<h5>安装证书</h5>
<ul>
<li>以 Nginx 为例，执行以下命令安装证书：<pre><code class="language-bash">acme.sh --installcert -d example.com \
--key-file /etc/nginx/ssl/example.com.key \
--fullchain-file /etc/nginx/ssl/example.com.crt \
--reloadcmd "service nginx reload"</code></pre>
<ul>
<li>将 <code>example.com</code> 替换为实际的域名，<code>/etc/nginx/ssl</code> 替换为 Nginx 服务器配置的证书存储路径。</li>
</ul>
</li>
</ul>
<h5>自动更新证书</h5>
<ul>
<li><code>acme.sh</code> 默认会自动更新证书，通常在证书到期前 60 天会自动进行更新。</li>
<li>也可以手动执行以下命令来更新证书：<pre><code class="language-bash">acme.sh --renew -d example.com</code></pre>
<ul>
<li>将 <code>example.com</code> 替换为要更新证书的域名。</li>
</ul>
</li>
</ul>
<hr />
<h4>注意事项</h4>
<ul>
<li>确保服务器能够正常访问 Let's Encrypt 的服务器。</li>
<li>确保域名解析和服务器配置正确。<pre><code></code></pre>
</li>
</ul>
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