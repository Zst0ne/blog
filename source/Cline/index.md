title: 使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了
date: '2025-02-02 00:05:35'
updated: '2025-02-03 00:06:13'
categories:
  - 转载文章
  - 编程
---
<font style="color:rgb(36, 36, 36);">不知道大家有没有听说过cursor这个工具，类似于AI+VsCode的结合体，只要绑定chatgpt、claude等大模型API，就可以实现对话式自助编程，简单闲聊几句便可开发一个软件应用。</font>

<font style="color:rgb(36, 36, 36);">但cursor受限于外网，国内用户玩不了，而且还收费很贵，非常的不接地气。</font>

<font style="color:rgb(36, 36, 36);">于是乎就有了平替，VsCode上的一个插件Cline非常好用，免费、简单、强大。</font>

<font style="color:rgb(36, 36, 36);">关键是，Cline除了能接入chatgpt、claude等主流的大模型API，还支持最近爆火的deepseek，写起来代码来那叫一个酣畅淋漓。</font>

<font style="color:rgb(36, 36, 36);">当然，模型API不是免费的，需自己去采购。</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493151992-d4aac628-4a6a-46f0-b541-1cd6d3f83b04.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">话不多说，简单讲下操作流程。</font>

<font style="color:rgb(36, 36, 36);">首先，你需要有VsCode软件，并配置好了相应编程环境，比如我用的Python。</font>

<font style="color:rgb(36, 36, 36);">接下来，在VsCode插件库中搜索Cline，直接下载和安装。</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493151849-2c083f3d-801c-4204-98e4-77f714e86331.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">安装好后，便可以直接使用Cline，选择你想用的大模型API，比如deepseek，然后填入key密钥即可。</font>

<font style="color:rgb(36, 36, 36);">key获取很简单，每个大模型都有自己的网站，去里面找找就有了。</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493151885-ed67416c-797f-49bc-94ce-3922e25ba479.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">选择deepseek后，你可以设置对应的模型，比如deepseek-reasoner，Cline会显示该模型的功能，是否支持图片等，还会显示调用tokens计费规则，以及自定义设置system prompt。</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493152125-cc7da1ce-fd13-4b3d-9687-faf92e0be8ee.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">你还可以配置MCP服务器，MCP服务器可以为Cline提供额外的“能力”，比如访问PostgreSQL数据库、执行特定任务的工具等。这些服务器运行在本地，通过MCP协议与主应用（Cline）交互。</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493152143-c2de4e9e-1a3d-4215-9806-b4e5b9b5996f.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">配置好key等参数后，你会看到一个对话框，直接开始“对话式”代码开发吧！</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493152437-734efde3-17be-4c7f-9ba7-f9441effd82c.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">接下来，咱们简单测试下，让Cline使用Python写一个简易GUI计算器程序。</font>

<font style="color:rgb(36, 36, 36);">指令：</font>

<font style="color:rgb(36, 36, 36);">使用Python tkinter开发一个简易计算器应用，功能如下： 1、具备通用计算器界面，UI美观简洁 2、可支持加减乘除计算、平方、开根号</font>

<font style="color:rgb(36, 36, 36);">❞</font>

<font style="color:rgb(36, 36, 36);">Cline速度非常快（当然这取决于模型API速度），立马开始分析需求，并在左边新建calculator.py文件，自动写代码，完全不需要你操心。代码写好之后，它会提示你保存和执行。</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493153776-26435a39-1d26-48d5-8990-07086d81215a.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">大概只需10秒，一个简易的计算器程序便开发好了，Cline写了115行代码，看执行UI效果似乎还不错。</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493157506-e18390b0-487a-472d-a75c-c32959db6513.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">但是当我使用计算器来计算6*8时，它居然报错了！！！说明代码存在bug</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493153315-3220fe34-c536-4693-a530-e797b483f1d8.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">这很正常，因为目前的AI大模型也不是万能的，很难一次写好程序。</font>

<font style="color:rgb(36, 36, 36);">我们不需要自己去debug，把错误提给Cline，让它自动修改代码。</font>

<font style="color:rgb(36, 36, 36);">指令：</font>

<font style="color:rgb(36, 36, 36);">使用计算器程序时，发现计算出现错误，无法输出正确结果</font>

<font style="color:rgb(36, 36, 36);">❞</font>

<font style="color:rgb(36, 36, 36);">Cline会分析bug，并给出解决方案，然后修改代码。</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493153786-0e03cf0a-1acd-4900-8edd-5a4f0248f0ae.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">debug完成后，再次保存和执行代码，接下来计算6*8，就出现正确答案了。</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493153878-434b27c6-e010-468b-9a65-08b1e2a085d1.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">这个计算器UI太朴素了，我想优化下界面风格，参照IPhone计算器来个大变身，只需要把需求提给Cline即可，它会帮你改代码，实现想法！</font>

<font style="color:rgb(36, 36, 36);">指令：</font>

<font style="color:rgb(36, 36, 36);">优化UI，参照IPhone计算器应用风格来设计 1、背景采用黑色，数字按键采用灰色，其他按键采用橙黄色 2、所有按键字体颜色为白色</font>

<font style="color:rgb(36, 36, 36);">❞</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493154505-528949fb-1f1f-4d18-b4d0-07307165b35a.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">最终呈现效果如下：</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493154816-1412906d-f5cd-4922-8a82-1f08b59abf7c.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">开发好脚本后，还可以让Cline将脚本打包为exe软件，便可以直接在电脑中执行。</font>

<font style="color:rgb(36, 36, 36);">指令：</font>

<font style="color:rgb(36, 36, 36);">将该脚本打包为exe软件</font>

<font style="color:rgb(36, 36, 36);">❞</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493154446-e76eb86c-e3e9-4a6c-8253-15d9a6dda729.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

<font style="color:rgb(36, 36, 36);">只需要等待片刻，Cline会自动将计算器脚本打包为exe可执行文件，成为你自己的专属软件。</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493155137-ae3ef10c-5318-4e90-b14c-d4e90fe1675b.png)

<font style="color:rgb(36, 36, 36);">使用Cline+deepseek实现VsCode自动化编程，吃着火锅就把代码写完了</font>

![](https://cdn.nlark.com/yuque/0/2025/png/45908058/1738493155383-57c75dda-d611-4461-9623-55362ff598b8.png)

