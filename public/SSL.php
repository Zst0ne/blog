<br></br><?php header('Content-Type: text/html; charset=utf-8'); ?><hr />
<h2>title: Hexo使用https访问(SSL加密)[butterfly主题] 
date: 2024-05-2 10:04:08
tags:</h2>
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