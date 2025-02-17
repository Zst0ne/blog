<!DOCTYPE html><html lang="cn" data-theme="light"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0,viewport-fit=cover"><title>Web 操作 Ollama API | Stone's Blog</title><meta name="author" content="Stone"><meta name="copyright" content="Stone"><meta name="format-detection" content="telephone=no"><meta name="theme-color" content="#ffffff"><meta name="description" content="以下是基于搜索结果整理的与 Web 操作 Ollama API 相关的项目和方法，涵盖了从 WebUI 到 API 集成的多种实现方式：  1. Open WebUI 简介：Open WebUI 是一个用户友好的 AI 界面，支持 Ollama 和 OpenAI 兼容 API。它内置了检索增强生成（RAG）的推理引擎，适合部署 AI 应用。 功能： 支持多种语言模型运行器（如 Ollama、Ope">
<meta property="og:type" content="article">
<meta property="og:title" content="Web 操作 Ollama API">
<meta property="og:url" content="https://noobspace.cn/2025/02/16/Ollama-Web/index.html">
<meta property="og:site_name" content="Stone&#39;s Blog">
<meta property="og:description" content="以下是基于搜索结果整理的与 Web 操作 Ollama API 相关的项目和方法，涵盖了从 WebUI 到 API 集成的多种实现方式：  1. Open WebUI 简介：Open WebUI 是一个用户友好的 AI 界面，支持 Ollama 和 OpenAI 兼容 API。它内置了检索增强生成（RAG）的推理引擎，适合部署 AI 应用。 功能： 支持多种语言模型运行器（如 Ollama、Ope">
<meta property="og:locale">
<meta property="og:image" content="https://noobspace.cn/img/head.jpg">
<meta property="article:published_time" content="2025-02-15T16:14:54.320Z">
<meta property="article:modified_time" content="2025-02-15T16:30:12.361Z">
<meta property="article:author" content="Stone">
<meta property="article:tag" content="Ai">
<meta property="article:tag" content="深度学习">
<meta name="twitter:card" content="summary">
<meta name="twitter:image" content="https://noobspace.cn/img/head.jpg"><link rel="shortcut icon" href="/img/SkyLine.jpg"><link rel="canonical" href="https://noobspace.cn/2025/02/16/Ollama-Web/index.html"><link rel="preconnect" href="//cdn.jsdelivr.net"/><link rel="preconnect" href="//busuanzi.ibruce.info"/><link rel="stylesheet" href="/css/index.css?v=4.13.0"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/all.min.css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0.33/dist/fancybox/fancybox.min.css" media="print" onload="this.media='all'"><script async="async" src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><script>(adsbygoogle = window.adsbygoogle || []).push({
  google_ad_client: '',
  enable_page_level_ads: 'true'
});</script><script>const GLOBAL_CONFIG = {
  root: '/',
  algolia: undefined,
  localSearch: undefined,
  translate: undefined,
  noticeOutdate: undefined,
  highlight: {"plugin":"highlight.js","highlightCopy":true,"highlightLang":true,"highlightHeightLimit":false},
  copy: {
    success: '复制成功',
    error: '复制错误',
    noSupport: '浏览器不支持'
  },
  relativeDate: {
    homepage: false,
    post: false
  },
  runtime: '',
  dateSuffix: {
    just: '刚刚',
    min: '分钟前',
    hour: '小时前',
    day: '天前',
    month: '个月前'
  },
  copyright: undefined,
  lightbox: 'fancybox',
  Snackbar: undefined,
  infinitegrid: {
    js: 'https://cdn.jsdelivr.net/npm/@egjs/infinitegrid@4.11.1/dist/infinitegrid.min.js',
    buttonText: '加载更多'
  },
  isPhotoFigcaption: false,
  islazyload: false,
  isAnchor: false,
  percent: {
    toc: true,
    rightside: false,
  },
  autoDarkmode: false
}</script><script id="config-diff">var GLOBAL_CONFIG_SITE = {
  title: 'Web 操作 Ollama API',
  isPost: true,
  isHome: false,
  isHighlightShrink: false,
  isToc: true,
  postUpdate: '2025-02-16 00:30:12'
}</script><script>(win=>{
      win.saveToLocal = {
        set: (key, value, ttl) => {
          if (ttl === 0) return
          const now = Date.now()
          const expiry = now + ttl * 86400000
          const item = {
            value,
            expiry
          }
          localStorage.setItem(key, JSON.stringify(item))
        },
      
        get: key => {
          const itemStr = localStorage.getItem(key)
      
          if (!itemStr) {
            return undefined
          }
          const item = JSON.parse(itemStr)
          const now = Date.now()
      
          if (now > item.expiry) {
            localStorage.removeItem(key)
            return undefined
          }
          return item.value
        }
      }
    
      win.getScript = (url, attr = {}) => new Promise((resolve, reject) => {
        const script = document.createElement('script')
        script.src = url
        script.async = true
        script.onerror = reject
        script.onload = script.onreadystatechange = function() {
          const loadState = this.readyState
          if (loadState && loadState !== 'loaded' && loadState !== 'complete') return
          script.onload = script.onreadystatechange = null
          resolve()
        }

        Object.keys(attr).forEach(key => {
          script.setAttribute(key, attr[key])
        })

        document.head.appendChild(script)
      })
    
      win.getCSS = (url, id = false) => new Promise((resolve, reject) => {
        const link = document.createElement('link')
        link.rel = 'stylesheet'
        link.href = url
        if (id) link.id = id
        link.onerror = reject
        link.onload = link.onreadystatechange = function() {
          const loadState = this.readyState
          if (loadState && loadState !== 'loaded' && loadState !== 'complete') return
          link.onload = link.onreadystatechange = null
          resolve()
        }
        document.head.appendChild(link)
      })
    
      win.activateDarkMode = () => {
        document.documentElement.setAttribute('data-theme', 'dark')
        if (document.querySelector('meta[name="theme-color"]') !== null) {
          document.querySelector('meta[name="theme-color"]').setAttribute('content', '#0d0d0d')
        }
      }
      win.activateLightMode = () => {
        document.documentElement.setAttribute('data-theme', 'light')
        if (document.querySelector('meta[name="theme-color"]') !== null) {
          document.querySelector('meta[name="theme-color"]').setAttribute('content', '#ffffff')
        }
      }
      const t = saveToLocal.get('theme')
    
        if (t === 'dark') activateDarkMode()
        else if (t === 'light') activateLightMode()
      
      const asideStatus = saveToLocal.get('aside-status')
      if (asideStatus !== undefined) {
        if (asideStatus === 'hide') {
          document.documentElement.classList.add('hide-aside')
        } else {
          document.documentElement.classList.remove('hide-aside')
        }
      }
    
      const detectApple = () => {
        if(/iPad|iPhone|iPod|Macintosh/.test(navigator.userAgent)){
          document.documentElement.classList.add('apple')
        }
      }
      detectApple()
    })(window)</script><link rel="stylesheet" href="/css/mycss.css"><script>if(document.location.href == "https://lagov.top") window.location.replace("about:blank"); </script><script>var _hmt = _hmt || [];(function() {var hm = document.createElement("script");hm.src = "https://hm.baidu.com/hm.js?2b421160be50ed43c7c0cc7da9895c04";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(hm, s);})();</script><meta name="generator" content="Hexo 7.2.0"></head><body><div id="web_bg"></div><div id="sidebar"><div id="menu-mask"></div><div id="sidebar-menus"><div class="avatar-img is-center"><img src="/img/head.jpg" onerror="onerror=null;src='/img/friend_404.gif'" alt="avatar"/></div><div class="sidebar-site-data site-data is-center"><a href="/archives/"><div class="headline">文章</div><div class="length-num">35</div></a><a href="/tags/"><div class="headline">标签</div><div class="length-num">18</div></a><a href="/categories/"><div class="headline">分类</div><div class="length-num">19</div></a></div><hr class="custom-hr"/></div></div><div class="post" id="body-wrap"><header class="post-bg" id="page-header" style="background-image: url('/img/CQ.jpg')"><nav id="nav"><span id="blog-info"><a href="/" title="Stone's Blog"><span class="site-name">Stone's Blog</span></a></span><div id="menus"><div id="toggle-menu"><a class="site-page" href="javascript:void(0);"><i class="fas fa-bars fa-fw"></i></a></div></div></nav><div id="post-info"><h1 class="post-title">Web 操作 Ollama API</h1><div id="post-meta"><div class="meta-firstline"><span class="post-meta-date"><i class="far fa-calendar-alt fa-fw post-meta-icon"></i><span class="post-meta-label">发表于</span><time class="post-meta-date-created" datetime="2025-02-15T16:14:54.320Z" title="发表于 2025-02-16 00:14:54">2025-02-16</time><span class="post-meta-separator">|</span><i class="fas fa-history fa-fw post-meta-icon"></i><span class="post-meta-label">更新于</span><time class="post-meta-date-updated" datetime="2025-02-15T16:30:12.361Z" title="更新于 2025-02-16 00:30:12">2025-02-16</time></span><span class="post-meta-categories"><span class="post-meta-separator">|</span><i class="fas fa-inbox fa-fw post-meta-icon"></i><a class="post-meta-categories" href="/categories/%E5%8E%9F%E5%88%9B%E6%96%87%E7%AB%A0/">原创文章</a><i class="fas fa-angle-right post-meta-separator"></i><i class="fas fa-inbox fa-fw post-meta-icon"></i><a class="post-meta-categories" href="/categories/%E5%8E%9F%E5%88%9B%E6%96%87%E7%AB%A0/Ai/">Ai</a><i class="fas fa-angle-right post-meta-separator"></i><i class="fas fa-inbox fa-fw post-meta-icon"></i><a class="post-meta-categories" href="/categories/%E5%8E%9F%E5%88%9B%E6%96%87%E7%AB%A0/Ai/%E5%A4%A7%E6%A8%A1%E5%9E%8B%E6%95%99%E7%A8%8B/">大模型教程</a></span></div><div class="meta-secondline"><span class="post-meta-separator">|</span><span id="" data-flag-title="Web 操作 Ollama API"><i class="far fa-eye fa-fw post-meta-icon"></i><span class="post-meta-label">阅读量:</span><span id="twikoo_visitors"><i class="fa-solid fa-spinner fa-spin"></i></span></span></div></div></div></header><main class="layout" id="content-inner"><div id="post"><article class="post-content" id="article-container"><p>以下是基于搜索结果整理的与 <strong>Web 操作 Ollama API</strong> 相关的项目和方法，涵盖了从 WebUI 到 API 集成的多种实现方式：</p>
<hr>
<h2 id="1-Open-WebUI"><a href="#1-Open-WebUI" class="headerlink" title="1. Open WebUI"></a>1. <strong>Open WebUI</strong></h2><ul>
<li><strong>简介</strong>：Open WebUI 是一个用户友好的 AI 界面，支持 Ollama 和 OpenAI 兼容 API。它内置了检索增强生成（RAG）的推理引擎，适合部署 AI 应用。</li>
<li><strong>功能</strong>：<ul>
<li>支持多种语言模型运行器（如 Ollama、OpenAI 等）。</li>
<li>提供桌面、移动设备的渐进式 Web 应用（PWA），支持离线访问。</li>
<li>可自定义 OpenAI API URL，连接 LMStudio、GroqCloud、Mistral 等。</li>
</ul>
</li>
<li><strong>安装方式</strong>：<ul>
<li>通过 Docker 快速部署：<code>docker run -d -p 3000:8080 --add-host=host.docker.internal:host-gateway -v open-webui:/app/backend/data --name open-webui --restart always ghcr.io/open-webui/open-webui:main</code>。</li>
<li>支持 GPU 加速：<code>docker run -d -p 3000:8080 --gpus all --add-host=host.docker.internal:host-gateway -v open-webui:/app/backend/data --name open-webui --restart always ghcr.io/open-webui/open-webui:cuda</code>。</li>
</ul>
</li>
<li><strong>访问</strong>：安装完成后，通过 <code>http://localhost:3000</code> 访问 WebUI。</li>
</ul>
<hr>
<h2 id="2-Flask-Ollama-Web-应用"><a href="#2-Flask-Ollama-Web-应用" class="headerlink" title="2. Flask + Ollama Web 应用"></a>2. <strong>Flask + Ollama Web 应用</strong></h2><ul>
<li><strong>简介</strong>：通过 Flask 框架搭建一个简单的 Web 应用，与 Ollama 模型进行交互。</li>
<li><strong>实现步骤</strong>：<ol>
<li>安装 Flask：<code>pip install flask</code>。</li>
<li>创建 Flask 应用，调用 Ollama API 生成文本补全或对话补全。</li>
<li>通过 Web 界面发送请求，获取模型响应并显示在页面上。</li>
</ol>
</li>
<li><strong>示例代码</strong>：<figure class="highlight python"><table><tr><td class="gutter"><pre><span class="line">1</span><br><span class="line">2</span><br><span class="line">3</span><br><span class="line">4</span><br><span class="line">5</span><br><span class="line">6</span><br><span class="line">7</span><br><span class="line">8</span><br><span class="line">9</span><br><span class="line">10</span><br><span class="line">11</span><br><span class="line">12</span><br><span class="line">13</span><br><span class="line">14</span><br></pre></td><td class="code"><pre><span class="line"><span class="keyword">from</span> flask <span class="keyword">import</span> Flask, request, jsonify</span><br><span class="line"><span class="keyword">import</span> requests</span><br><span class="line"></span><br><span class="line">app = Flask(__name__)</span><br><span class="line">OLLAMA_API_URL = <span class="string">&#x27;http://localhost:11434/api/generate&#x27;</span></span><br><span class="line"></span><br><span class="line"><span class="meta">@app.route(<span class="params"><span class="string">&#x27;/chat&#x27;</span>, methods=[<span class="string">&#x27;POST&#x27;</span>]</span>)</span></span><br><span class="line"><span class="keyword">def</span> <span class="title function_">chat</span>():</span><br><span class="line">    user_message = request.json.get(<span class="string">&#x27;prompt&#x27;</span>)</span><br><span class="line">    response = requests.post(OLLAMA_API_URL, json=&#123;<span class="string">&#x27;model&#x27;</span>: <span class="string">&#x27;qwen2.5:0.5b&#x27;</span>, <span class="string">&#x27;prompt&#x27;</span>: user_message, <span class="string">&#x27;stream&#x27;</span>: <span class="literal">False</span>&#125;)</span><br><span class="line">    <span class="keyword">return</span> jsonify(&#123;<span class="string">&#x27;response&#x27;</span>: response.json().get(<span class="string">&#x27;response&#x27;</span>)&#125;)</span><br><span class="line"></span><br><span class="line"><span class="keyword">if</span> __name__ == <span class="string">&#x27;__main__&#x27;</span>:</span><br><span class="line">    app.run(host=<span class="string">&#x27;0.0.0.0&#x27;</span>, port=<span class="number">5000</span>)</span><br></pre></td></tr></table></figure></li>
<li><strong>访问</strong>：启动 Flask 应用后，通过 <code>http://localhost:5000/chat</code> 发送 POST 请求与模型交互。</li>
</ul>
<hr>
<h2 id="3-Ollama-REST-API-集成"><a href="#3-Ollama-REST-API-集成" class="headerlink" title="3. Ollama REST API 集成"></a>3. <strong>Ollama REST API 集成</strong></h2><ul>
<li><strong>简介</strong>：Ollama 提供了 RESTful API，支持生成文本、聊天对话、模型管理等功能。</li>
<li><strong>主要 API 接口</strong>：<ul>
<li><strong>生成文本</strong>：<code>POST /api/generate</code>，用于生成指定模型的文本补全。</li>
<li><strong>聊天对话</strong>：<code>POST /api/chat</code>，支持多轮对话，适用于聊天机器人场景。</li>
<li><strong>模型管理</strong>：包括拉取模型（<code>POST /api/pull</code>）、删除模型（<code>DELETE /api/delete</code>）、列出模型（<code>GET /api/tags</code>）等。</li>
</ul>
</li>
<li><strong>示例</strong>：<ul>
<li>生成文本补全：<figure class="highlight bash"><table><tr><td class="gutter"><pre><span class="line">1</span><br><span class="line">2</span><br><span class="line">3</span><br><span class="line">4</span><br><span class="line">5</span><br></pre></td><td class="code"><pre><span class="line">curl http://localhost:11434/api/generate -d <span class="string">&#x27;&#123;</span></span><br><span class="line"><span class="string">  &quot;model&quot;: &quot;qwen2.5:0.5b&quot;,</span></span><br><span class="line"><span class="string">  &quot;prompt&quot;: &quot;介绍一下人工智能。&quot;,</span></span><br><span class="line"><span class="string">  &quot;stream&quot;: false</span></span><br><span class="line"><span class="string">&#125;&#x27;</span></span><br></pre></td></tr></table></figure></li>
<li>聊天对话：<figure class="highlight bash"><table><tr><td class="gutter"><pre><span class="line">1</span><br><span class="line">2</span><br><span class="line">3</span><br><span class="line">4</span><br><span class="line">5</span><br><span class="line">6</span><br><span class="line">7</span><br></pre></td><td class="code"><pre><span class="line">curl http://localhost:11434/api/chat -d <span class="string">&#x27;&#123;</span></span><br><span class="line"><span class="string">  &quot;model&quot;: &quot;qwen2.5:0.5b&quot;,</span></span><br><span class="line"><span class="string">  &quot;messages&quot;: [</span></span><br><span class="line"><span class="string">    &#123;&quot;role&quot;: &quot;user&quot;, &quot;content&quot;: &quot;什么是自然语言处理？&quot;&#125;</span></span><br><span class="line"><span class="string">  ],</span></span><br><span class="line"><span class="string">  &quot;stream&quot;: false</span></span><br><span class="line"><span class="string">&#125;&#x27;</span></span><br></pre></td></tr></table></figure></li>
</ul>
</li>
<li><strong>适用场景</strong>：适合通过编程语言（如 Python、Java）集成到后端服务或桌面应用中。</li>
</ul>
<hr>
<h2 id="4-Ollama-WebUI-Lite"><a href="#4-Ollama-WebUI-Lite" class="headerlink" title="4. Ollama WebUI Lite"></a>4. <strong>Ollama WebUI Lite</strong></h2><ul>
<li><strong>简介</strong>：一个轻量级的 Ollama WebUI 项目，支持通过 API 访问 Ollama 模型。</li>
<li><strong>功能</strong>：<ul>
<li>提供简单的 Web 界面，用于与本地模型交互。</li>
<li>支持自定义模型参数和对话模板。</li>
</ul>
</li>
<li><strong>安装</strong>：<ul>
<li>通过 GitHub 下载并部署：<code>git clone https://github.com/ollama-webui/ollama-webui-lite</code>。</li>
<li>修改配置文件以支持远程访问和自定义界面。</li>
</ul>
</li>
<li><strong>访问</strong>：部署后通过浏览器访问 <code>http://localhost:3000</code> 使用 WebUI。</li>
</ul>
<hr>
<h2 id="5-Docker-部署-Ollama-WebUI"><a href="#5-Docker-部署-Ollama-WebUI" class="headerlink" title="5. Docker 部署 Ollama + WebUI"></a>5. <strong>Docker 部署 Ollama + WebUI</strong></h2><ul>
<li><strong>简介</strong>：通过 Docker 容器化部署 Ollama 和 WebUI，简化安装和配置过程。</li>
<li><strong>实现步骤</strong>：<ol>
<li>安装 Docker。</li>
<li>拉取 Ollama 镜像：<code>docker run -d -p 11434:11434 --name ollama --restart always ollama/ollama:latest</code>。</li>
<li>拉取 WebUI 镜像并启动：<code>docker run -d -p 3000:8080 --add-host=host.docker.internal:host-gateway -v open-webui:/app/backend/data --name open-webui --restart always ghcr.io/open-webui/open-webui:main</code>。</li>
</ol>
</li>
<li><strong>适用场景</strong>：适合需要快速部署和测试的场景，支持 GPU 加速。</li>
</ul>
<hr>
<h2 id="总结"><a href="#总结" class="headerlink" title="总结"></a>总结</h2><p>以上项目和方法涵盖了从 WebUI 到 API 集成的多种实现方式，适合不同场景和需求。如果需要更详细的代码示例或部署步骤，可以参考对应的来源链接。</p>
</article><div class="post-copyright"><div class="post-copyright__author"><span class="post-copyright-meta"><i class="fas fa-circle-user fa-fw"></i>文章作者: </span><span class="post-copyright-info"><a href="https://noobspace.cn">Stone</a></span></div><div class="post-copyright__type"><span class="post-copyright-meta"><i class="fas fa-square-arrow-up-right fa-fw"></i>文章链接: </span><span class="post-copyright-info"><a href="https://noobspace.cn/2025/02/16/Ollama-Web/">https://noobspace.cn/2025/02/16/Ollama-Web/</a></span></div><div class="post-copyright__notice"><span class="post-copyright-meta"><i class="fas fa-circle-exclamation fa-fw"></i>版权声明: </span><span class="post-copyright-info">本博客所有文章除特别声明外，均采用 <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">CC BY-NC-SA 4.0</a> 许可协议。转载请注明来自 <a href="https://noobspace.cn" target="_blank">Stone's Blog</a>！</span></div></div><div class="tag_share"><div class="post-meta__tag-list"><a class="post-meta__tags" href="/tags/Ai/">Ai</a><a class="post-meta__tags" href="/tags/%E6%B7%B1%E5%BA%A6%E5%AD%A6%E4%B9%A0/">深度学习</a></div><div class="post_share"><div class="social-share" data-image="/img/head.jpg" data-sites="facebook,twitter,wechat,weibo,qq"></div><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/butterfly-extsrc@1.1.3/sharejs/dist/css/share.min.css" media="print" onload="this.media='all'"><script src="https://cdn.jsdelivr.net/npm/butterfly-extsrc@1.1.3/sharejs/dist/js/social-share.min.js" defer></script></div></div><nav class="pagination-post" id="pagination"><div class="next-post pull-full"><a href="/2025/02/15/GTAERP/" title="GTA:Emergency Role Play服务器"><div class="cover" style="background: var(--default-bg-color)"></div><div class="pagination-info"><div class="label">下一篇</div><div class="next_info">GTA:Emergency Role Play服务器</div></div></a></div></nav><div class="relatedPosts"><div class="headline"><i class="fas fa-thumbs-up fa-fw"></i><span>相关推荐</span></div><div class="relatedPosts-list"><div><a href="/2025/02/15/ollama/" title="Ollama部署模型及修改默认存储目录"><div class="cover" style="background: var(--default-bg-color)"></div><div class="content is-center"><div class="date"><i class="far fa-calendar-alt fa-fw"></i> 2025-02-15</div><div class="title">Ollama部署模型及修改默认存储目录</div></div></a></div><div><a href="/2025/02/15/huggingface-backdoor/" title="黑客在HuggingFace上传恶意AI模型，用“损坏”pickle规避监测"><div class="cover" style="background: var(--default-bg-color)"></div><div class="content is-center"><div class="date"><i class="far fa-calendar-alt fa-fw"></i> 2025-02-15</div><div class="title">黑客在HuggingFace上传恶意AI模型，用“损坏”pickle规避监测</div></div></a></div></div></div><hr class="custom-hr"/><div id="post-comment"><div class="comment-head"><div class="comment-headline"><i class="fas fa-comments fa-fw"></i><span> 评论</span></div></div><div class="comment-wrap"><div><div id="twikoo-wrap"></div></div></div></div></div><div class="aside-content" id="aside-content"><div class="card-widget card-info"><div class="is-center"><div class="avatar-img"><img src="/img/head.jpg" onerror="this.onerror=null;this.src='/img/friend_404.gif'" alt="avatar"/></div><div class="author-info__name">Stone</div><div class="author-info__description"></div></div><div class="card-info-data site-data is-center"><a href="/archives/"><div class="headline">文章</div><div class="length-num">35</div></a><a href="/tags/"><div class="headline">标签</div><div class="length-num">18</div></a><a href="/categories/"><div class="headline">分类</div><div class="length-num">19</div></a></div><a id="card-info-btn" target="_blank" rel="noopener" href="https://kook.top/DmHCQZ"><i class="fab fa-kook"></i><span>加入我的KOOK频道</span></a><div class="card-info-social-icons is-center"><a class="social-icon" href="tencent://Message/?Uin=3010087667" target="_blank" title=""><i class="fab fa-qq" style="color: #4a7dbe;"></i></a><a class="social-icon" href="https://github.com/Zst0NE" target="_blank" title="Github"><i class="fab fa-github" style="color: #24292e;"></i></a><a class="social-icon" href="https://space.bilibili.com/289936991" target="_blank" title="Bilibili"><i class="fab fa-bilibili" style="color: #4a7dbe;"></i></a></div></div><div class="card-widget card-announcement"><div class="item-headline"><i class="fas fa-bullhorn fa-shake"></i><span>公告</span></div><div class="announcement_content">Welcome!&nbsp友链,合作请联系我.<br>诚邀各路大佬在此刊登自己的文章.<br>欢迎加入我的QQ群：553446574</p></div></div><div class="sticky_layout"><div class="card-widget" id="card-toc"><div class="item-headline"><i class="fas fa-stream"></i><span>目录</span><span class="toc-percentage"></span></div><div class="toc-content"><ol class="toc"><li class="toc-item toc-level-2"><a class="toc-link" href="#1-Open-WebUI"><span class="toc-number">1.</span> <span class="toc-text">1. Open WebUI</span></a></li><li class="toc-item toc-level-2"><a class="toc-link" href="#2-Flask-Ollama-Web-%E5%BA%94%E7%94%A8"><span class="toc-number">2.</span> <span class="toc-text">2. Flask + Ollama Web 应用</span></a></li><li class="toc-item toc-level-2"><a class="toc-link" href="#3-Ollama-REST-API-%E9%9B%86%E6%88%90"><span class="toc-number">3.</span> <span class="toc-text">3. Ollama REST API 集成</span></a></li><li class="toc-item toc-level-2"><a class="toc-link" href="#4-Ollama-WebUI-Lite"><span class="toc-number">4.</span> <span class="toc-text">4. Ollama WebUI Lite</span></a></li><li class="toc-item toc-level-2"><a class="toc-link" href="#5-Docker-%E9%83%A8%E7%BD%B2-Ollama-WebUI"><span class="toc-number">5.</span> <span class="toc-text">5. Docker 部署 Ollama + WebUI</span></a></li><li class="toc-item toc-level-2"><a class="toc-link" href="#%E6%80%BB%E7%BB%93"><span class="toc-number">6.</span> <span class="toc-text">总结</span></a></li></ol></div></div><div class="card-widget card-recent-post"><div class="item-headline"><i class="fas fa-history"></i><span>最新文章</span></div><div class="aside-list"><div class="aside-list-item no-cover"><div class="content"><a class="title" href="/2025/02/16/Ollama-Web/" title="Web 操作 Ollama API">Web 操作 Ollama API</a><time datetime="2025-02-15T16:14:54.320Z" title="发表于 2025-02-16 00:14:54">2025-02-16</time></div></div><div class="aside-list-item no-cover"><div class="content"><a class="title" href="/2025/02/15/GTAERP/" title="GTA:Emergency Role Play服务器">GTA:Emergency Role Play服务器</a><time datetime="2025-02-15T15:09:49.075Z" title="发表于 2025-02-15 23:09:49">2025-02-15</time></div></div><div class="aside-list-item no-cover"><div class="content"><a class="title" href="/2025/02/15/huggingface-backdoor/" title="黑客在HuggingFace上传恶意AI模型，用“损坏”pickle规避监测">黑客在HuggingFace上传恶意AI模型，用“损坏”pickle规避监测</a><time datetime="2025-02-15T14:52:29.162Z" title="发表于 2025-02-15 22:52:29">2025-02-15</time></div></div><div class="aside-list-item no-cover"><div class="content"><a class="title" href="/2025/02/15/ollama/" title="Ollama部署模型及修改默认存储目录">Ollama部署模型及修改默认存储目录</a><time datetime="2025-02-15T14:25:13.133Z" title="发表于 2025-02-15 22:25:13">2025-02-15</time></div></div><div class="aside-list-item no-cover"><div class="content"><a class="title" href="/2025/02/12/VeraCrypt%E4%BD%BF%E7%94%A8%E6%95%99%E7%A8%8B/" title="VeraCrypt使用教程">VeraCrypt使用教程</a><time datetime="2025-02-12T09:11:37.479Z" title="发表于 2025-02-12 17:11:37">2025-02-12</time></div></div></div></div></div></div></main><footer id="footer"><div id="footer-wrap"><div class="copyright">&copy;2020 - 2025 By Stone</div><div class="framework-info"><span>框架 </span><a target="_blank" rel="noopener" href="https://hexo.io">Hexo</a><span class="footer-separator">|</span><span>主题 </span><a target="_blank" rel="noopener" href="https://github.com/jerryc127/hexo-theme-butterfly">Butterfly</a></div><div class="footer_custom_text">蜀ICP备2024077341号</div></div></footer></div><div id="rightside"><div id="rightside-config-hide"><button id="readmode" type="button" title="阅读模式"><i class="fas fa-book-open"></i></button><button id="darkmode" type="button" title="浅色和深色模式转换"><i class="fas fa-adjust"></i></button><button id="hide-aside-btn" type="button" title="单栏和双栏切换"><i class="fas fa-arrows-alt-h"></i></button></div><div id="rightside-config-show"><button id="rightside-config" type="button" title="设置"><i class="fas fa-cog fa-spin"></i></button><button class="close" id="mobile-toc-button" type="button" title="目录"><i class="fas fa-list-ul"></i></button><a id="to_comment" href="#post-comment" title="直达评论"><i class="fas fa-comments"></i></a><button id="go-up" type="button" title="回到顶部"><span class="scroll-percent"></span><i class="fas fa-arrow-up"></i></button></div></div><div><script src="/js/utils.js?v=4.13.0"></script><script src="/js/main.js?v=4.13.0"></script><script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0.33/dist/fancybox/fancybox.umd.min.js"></script><div class="js-pjax"><script>(() => {
  const getCount = () => {
    const countELement = document.getElementById('twikoo-count')
    if(!countELement) return
    twikoo.getCommentsCount({
      envId: 'https://twikoo-git-main-zst0nes-projects.vercel.app/',
      region: '',
      urls: [window.location.pathname],
      includeReply: false
    }).then(res => {
      countELement.textContent = res[0].count
    }).catch(err => {
      console.error(err)
    })
  }

  const init = () => {
    twikoo.init(Object.assign({
      el: '#twikoo-wrap',
      envId: 'https://twikoo-git-main-zst0nes-projects.vercel.app/',
      region: '',
      onCommentLoaded: () => {
        btf.loadLightbox(document.querySelectorAll('#twikoo .tk-content img:not(.tk-owo-emotion)'))
      }
    }, null))

    
  }

  const loadTwikoo = () => {
    if (typeof twikoo === 'object') setTimeout(init,0)
    else getScript('https://cdn.jsdelivr.net/npm/twikoo@1.6.31/dist/twikoo.all.min.js').then(init)
  }

  if ('Twikoo' === 'Twikoo' || !false) {
    if (false) btf.loadComment(document.getElementById('twikoo-wrap'), loadTwikoo)
    else loadTwikoo()
  } else {
    window.loadOtherComment = loadTwikoo
  }
})()</script></div>flag{WELCOME_TO_THERE FXXQ}<script> document.getElementsByClassName("copyright")[0].innerHTML = "©2024 By Stone 萌ICP备20250074号"; </script> <div class="aplayer no-destroy" data-id="464916877" data-server="netease" data-type="song" data-fixed="true" data-autoplay=""> </div><script id="click-show-text" src="https://cdn.jsdelivr.net/npm/butterfly-extsrc@1.1.3/dist/click-show-text.min.js" data-mobile="false" data-text="F,A,Q" data-fontsize="15px" data-random="false" async="async"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer@1.10.1/dist/APlayer.min.css" media="print" onload="this.media='all'"><script src="https://cdn.jsdelivr.net/npm/aplayer@1.10.1/dist/APlayer.min.js"></script><script src="https://cdn.jsdelivr.net/npm/butterfly-extsrc@1.1.3/metingjs/dist/Meting.min.js"></script><script async data-pjax src="//busuanzi.ibruce.info/busuanzi/2.3/busuanzi.pure.mini.js"></script></div><script src="/live2dw/lib/L2Dwidget.min.js?094cbace49a39548bed64abff5988b05"></script><script>L2Dwidget.init({"log":false,"pluginJsPath":"lib/","pluginModelPath":"assets/","pluginRootPath":"live2dw/","tagMode":false});</script></body></html>