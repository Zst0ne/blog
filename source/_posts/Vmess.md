title: 【装逼向】如何获得朝鲜IP
tags:
  - VPN
categories:
  - 原创文章
  - 网络安全
---

**本教程引用了其他大佬的博客教程[nodeseek](https://www.nodeseek.com/post-17017-1)侵删**
首先推荐一个云服务器平台(菠萝云)[globalvm](https://globalvm.top/)【非广告】，这个平台自己已经搭建了
朝鲜和南极洲等地区WARP出口节点，有独立IPv6和共享IPv4，而且一个月只需要5块，~~算比较贵的了只能玩玩~~
如果你自己的电脑支持IPv6，那可爽了，如果没有，也可以通过Frp等方式穿透。
## 基本概念
    首先我会给大家介绍一下我们常用绕过GFW的方式
    以下是VMess、VLESS、Trojan、Shadowsocks和SOCKS5的详细特点对比表格：
| 特点        | VMess                              | VLESS                              | Trojan                            | Shadowsocks                      | SOCKS5                          |
|-------------|------------------------------------|------------------------------------|-----------------------------------|----------------------------------|---------------------------------|
| **安全性**  | 高。支持多种加密方式，动态端口和伪装能力，防止流量分析和封锁。 | 高。依赖外部TLS（如XTLS）保证安全性，去除了加密层。 | 高。模仿HTTPS流量，使用TLS加密，绕过防火墙检测。 | 较高。支持多种加密算法，但易被深度包检测（DPI）识别。 | 较低。无加密或依赖外部加密，易被拦截。 |
| **速度**    | 较快。传输效率高，复杂网络环境下表现良好。 | 较快。去除了加密层，减少协议开销，速度更快。 | 较快。设计简洁，传输效率高，TLS加密下表现优异。 | 较快。轻量级协议，传输效率高。 | 较慢。无优化，传输效率较低。 |
| **稳定性**  | 较好。支持多种传输协议（TCP、mKCP、WebSocket等），适应不同网络环境。 | 较好。轻量级设计，支持多种传输协议，稳定性高。 | 较好。模仿HTTPS流量，稳定性高，适合长期使用。 | 较好。轻量级协议，稳定性较高。 | 一般。无优化，稳定性较差。 |
| **兼容性**  | 较好。支持多种平台和客户端配置，兼容性强。 | 较好。兼容V2Ray生态系统，支持多种客户端和服务器配置。 | 较好。支持多种客户端和服务器配置，兼容性较强。 | 较好。支持多种平台和客户端，兼容性较强。 | 较差。部分客户端和网络环境不支持。 |
| **复杂度**  | 较高。配置复杂，需设置ID、AlterID等参数，适合技术用户。 | 较低。去除了AlterID等复杂参数，配置简单，适合新手。 | 较高。需配置TLS证书和伪装域名，适合有一定技术背景的用户。 | 较低。配置简单，适合新手用户。 | 较低。配置简单，适合基础用户。 |
| **适用场景**| 适合需要高安全性和复杂网络环境的用户。 | 适合追求速度和简单配置的用户。 | 适合需要高安全性和伪装流量的用户。 | 适合轻量级使用和简单翻墙需求的用户。 | 适合基础代理需求，无需高安全性的场景。 |

### 总结：
- **VMess**：安全性高，配置复杂，适合技术用户。
- **VLESS**：速度快，配置简单，适合新手。
- **Trojan**：安全性高，适合需要伪装流量的用户。
- **Shadowsocks**：轻量级，适合简单翻墙需求。
- **SOCKS5**：基础代理，适合无需高安全性的场景。

### 其他协议：
PPTP：适合小型企业。
L2TP：适用于大型企业。
IPSec：适用于更多样化的网络环境和安全需求。
SSL/TLS：工作在应用层，适用于不同的场景。
**这些协议的初衷并不是用来绕过GFW，只是他们可以完成这些功能**
## 关于朝鲜IP
朝鲜 VPS 实际位于香港。使用 WARP 获取朝鲜 IPv4。
给了一个朝鲜的 IPv6，用于入口访问，不能用于出口访问。出口只能使用 WARP 的 IPv4。
思路猜测：广播了一个注册在朝鲜的 v6 地址给香港母鸡，然后母鸡套WARP（WARP不是根据VPS实际所在地分配IP的），禁止小鸡IPv6出口访问（防止被IP库识别）。这样在外界看不到 IPv6，可以延长 v6 朝鲜位置的存活时间。可以发现 v6 是 PoloCloud 广播的。
（大概的原理就是通过向IP库网站伪造地址）

## 服务端：
## X-UI 应该是最简单和方便的自己配置节点的面板了。
我们可以直接使用PVE面板中的VNC登录

如下图,先点击PVE信息，查看PVE登录信息，然后点击PVE控制面板，完成PVE登录(注意使用手机登陆PVE面板可能会报错,建议使用平板或者电脑登录)

登录pve面板后点击qemu,然后再点击控制台,便会为我们连接VNC

然后在VNC面板中输入你设置的ROOT用户密码（注意这里输密码时屏幕不会显示出来，输完后回车即可）

### 节点搭建
首先更新一下软件包和安装必要的软件

```bash
apt update && apt upgrade && apt install curl wget -y
```

如果你本地有IPv6，你可以尝试安装X-UI面板，然后用IPv6地址访问web面板。如果你本地只有IPv4，又没有双栈服务器进行流量转发（因为nnr好像不允许转发HTTP流量，所以只能用自己的双栈服务器转发http流量），那你可能无法访问X-UI面板，那建议直接使用Xray-core

### X-UI安装
对于非朝鲜VPS可以使用一键脚本进行安装

```bash
bash <(curl -Ls https://raw.githubusercontent.com/FranzKafkaYu/x-ui/master/install.sh)
```

朝鲜的VPS可以使用下列命令手动安装

```bash
wget --no-check-certificate https://pan.ccckfg.top/d/Onedrive/%E8%B5%84%E6%BA%90/x-ui-linux-amd64.tar.gz
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
systemctl restart x-ui
```

这个手动安装的X-UI会默认内置一个VMESS节点,将以下分享链接导入后，手动编辑一下服务器地址和端口为你自己的就可以使用了

```
vmess://eyJhZGQiOiIxMjcuMC4wLjEiLCJhaWQiOiIwIiwiYWxwbiI6IiIsImZwIjoiIiwiaG9zdCI6IiIsImlkIjoiNWQwZTM4YmItYzYwMC00ZTM3LTg5YmYtY2M4ZmRmMmFmNGE0IiwibmV0Ijoid3MiLCJwYXRoIjoiL2tvciIsInBvcnQiOiI2NjY2IiwicHMiOiJLLk8uUnxrb3J1c2VyQHVjZXkuaWN1Iiwic2N5IjoiYXV0byIsInNuaSI6IiIsInRscyI6IiIsInR5cGUiOiIiLCJ2IjoiMiJ9
```

### Xray-core 命令行配置
如果你不想使用或者不能够使用X-UI,建议使用以下模板进行Xray-core安装

[https://github.com/chika0801/Xray-examples](https://github.com/chika0801/Xray-examples)

### NNR转发设置
先查看一下nnr的节点监控，看一下有哪些转发服务器可用

然后再添加转发规则（目标服务器和目标端口填你刚刚在VPS上设定的端口和VPS的IP），添加完后你应该会看到这样的对应关系

其中的“源”就是转发服务器的端口和IP，就是说所有发送到源IP和端口的流量，都会原封不动的转发给目标。

我们添加好转发规则后，可以在代理软件中，将服务器的IP和端口替换为“源”就行了
```

朝鲜 VPS 实际位于香港。使用 WARP 获取朝鲜 IPv4。
给了一个朝鲜的 IPv6，用于入口访问，不能用于出口访问。出口只能使用 WARP 的 IPv4。
思路猜测：广播了一个注册在朝鲜的 v6 地址给香港母鸡，然后母鸡套WARP（WARP不是根据VPS实际所在地分配IP的），禁止小鸡IPv6出口访问（防止被IP库识别）。这样在外界看不到 IPv6，可以延长 v6 朝鲜位置的存活时间。可以发现 v6 是 PoloCloud 广播的。
（大概的原理就是通过向IP库网站伪造地址）
```

