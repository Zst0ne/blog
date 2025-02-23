title: Hexo使用https访问(SSL加密)[butterfly主题]
tags:
  - Hexo
  - HTTP
categories:
  - 原创文章
  - HTTP
---

[CSDN]: https://blog.csdn.net/qq_33973359/article/details/105537568  "本文参考自CSDN大佬的文章"
<h2>设置SSL证书加密</h2>
首先去申请SSl证书，当你获得key 和 crt证书文件后下载到服务器。<br>
随后修改hexo中的"server.js"文件，如下[可直接复制]<br>
建议先备份原文件！！！
``` javascript
var fs = require('fs');
var connect = require('connect');
var http = require('https');
var chalk = require('chalk');
var Promise = require('bluebird');
var open = require('opn');
var net = require('net');
var url = require('url');
var express = require('express');

var httpApp = express();

httpApp.all("*", (req, res, next) => {
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
    if (port > 65535 || port < 1) {
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

```
这是直接在Nodejs的APP上使用SSL证书，但是一般我更建议大家使用
Nginx或者Apache分发服务的SSL证书模块，它相较于复杂的去修改APP
节省了非常多的时间，下面是使用Nginx时作为分发的配置文件。
```nginx
server {
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
}
```
以下是转换为 Markdown 格式的内容：

```markdown
### SSL 证书申请与管理

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
  curl https://get.acme.sh | sh
  ```
- **方法二：使用 `wget` 命令安装**
  ```bash
  wget -O - https://get.acme.sh | sh
  ```

安装完成后，重新加载环境变量：
```bash
source ~/.bashrc
```

##### 配置 `acme.sh`
- **获取 API 密钥**
  - 如果使用 DNS 验证方式申请证书，需要获取域名注册商的 API 密钥。
  - 以阿里云为例，登录阿里云控制台，在“AccessKey 管理”中创建 AccessKey，记录下 `AccessKey ID` 和 `AccessKey Secret`。

- **设置 API 密钥**
  - 以阿里云为例，执行以下命令：
    ```bash
    export Ali_Key="your_ali_key"
    export Ali_Secret="your_ali_secret"
    ```
  - 将 `your_ali_key` 和 `your_ali_secret` 替换为实际的阿里云 AccessKey ID 和 AccessKey Secret。

##### 申请证书
- **使用 DNS 验证申请证书**
  - 以阿里云 DNS 为例，执行以下命令：
    ```bash
    acme.sh --issue -d example.com -d www.example.com --dns dns_ali
    ```
  - 将 `example.com` 和 `www.example.com` 替换为要申请证书的域名。如果只申请单个域名的证书，可只写一个 `-d` 参数。

- **使用 Webroot 验证申请证书**
  - 如果服务器上已经部署了网站，可以使用 Webroot 验证方式。执行以下命令：
    ```bash
    acme.sh --issue -d example.com -d www.example.com --webroot /var/www/html
    ```
  - 将 `example.com` 和 `www.example.com` 替换为要申请证书的域名，`/var/www/html` 替换为网站的根目录路径。

##### 安装证书
- 以 Nginx 为例，执行以下命令安装证书：
  ```bash
  acme.sh --installcert -d example.com \
  --key-file /etc/nginx/ssl/example.com.key \
  --fullchain-file /etc/nginx/ssl/example.com.crt \
  --reloadcmd "service nginx reload"
  ```
  - 将 `example.com` 替换为实际的域名，`/etc/nginx/ssl` 替换为 Nginx 服务器配置的证书存储路径。

##### 自动更新证书
- `acme.sh` 默认会自动更新证书，通常在证书到期前 60 天会自动进行更新。
- 也可以手动执行以下命令来更新证书：
  ```bash
  acme.sh --renew -d example.com
  ```
  - 将 `example.com` 替换为要更新证书的域名。

---

#### 注意事项
- 确保服务器能够正常访问 Let's Encrypt 的服务器。
- 确保域名解析和服务器配置正确。
```