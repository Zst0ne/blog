---
title: 【超简单&开源】最新Windows/Office激活方法
tags:
  - 白嫖
  - 网络安全
  - Windows
categories:
  - 原创文章
  - 网络安全
---

该方法仅支持Windows 8/10/11 Server12以上系统。<BR>
首先Win+S 在搜索框中以管理员权限启动Powershell<BR>

```
irm https://massgrave.dev/get | iex
```
如果在较旧的 Windows 版本上，您可能需要先运行以下命令：

`[Net.ServicePointManager]::SecurityProtocol=[Net.SecurityProtocolType]::Tls12`
Powershell 方法在 Windows 7 上不起作用。请改用方法 2 - 繁体。
URL get.activated.win 可能会被某些 DNS 服务阻止，因为它是一个新域。

![KMS](../img/KMS.png)

如图 即进入激活工具，按照指示通过数字键选择激活的模块和模式即可。
