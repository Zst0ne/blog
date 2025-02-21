
<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $NAME; ?></title>
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
    <style>
      :where([class^="ri-"])::before { content: "\f3c2"; }
      .article-list::-webkit-scrollbar {display: none;}
    </style>
  </head>
  <body class="bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 py-8">
      <div class="grid grid-cols-12 gap-8">
        <div class="col-span-8">
          <div class="space-y-6">
            <div
              id="articleList"
              class="space-y-6 article-list overflow-y-auto"
              style="max-height: calc(100vh - 2rem);"
            >
			<h2>title: 【超简单&amp;开源】最新Windows/Office激活方法
			date: 2024-05-22 12:57:34
			tags:</h2>
			<p>该方法仅支持Windows 8/10/11 Server12以上系统。<BR>
			首先Win+S 在搜索框中以管理员权限启动Powershell<BR></p>
			<pre><code>irm https://massgrave.dev/get | iex</code></pre>
			<p>如果在较旧的 Windows 版本上，您可能需要先运行以下命令：</p>
			<p><code>[Net.ServicePointManager]::SecurityProtocol=[Net.SecurityProtocolType]::Tls12</code>
			Powershell 方法在 Windows 7 上不起作用。请改用方法 2 - 繁体。
			URL get.activated.win 可能会被某些 DNS 服务阻止，因为它是一个新域。</p>
			<p><img src="../img/KMS.png" alt="KMS" /></p>
			<p>如图 即进入激活工具，按照指示通过数字键选择激活的模块和模式即可。</p>
			</div>
          </div>
        </div>

        <div class="col-span-4 space-y-6">
          <div class="bg-white rounded-lg p-6 shadow-sm">
            <div class="flex items-center space-x-4">
              <img
                src="https://public.readdy.ai/ai/img_res/e97754b0223c28f27a7267b32f16d201.jpg"
                class="w-16 h-16 rounded-full object-cover"
                alt="avatar"
              />
              <div>
                <h2 class="text-xl font-bold">Stone</h2>
                <div class="flex space-x-6 mt-2">
                  <div class="text-center">
                    <div class="text-lg font-bold">36</div>
                    <div class="text-sm text-gray-500">文章</div>
                  </div>
                  <div class="text-center">
                    <div class="text-lg font-bold">18</div>
                    <div class="text-sm text-gray-500">标签</div>
                  </div>
                  <div class="text-center">
                    <div class="text-lg font-bold">19</div>
                    <div class="text-sm text-gray-500">分类</div>
                  </div>
                </div>
              </div>
            </div>

            <button
              class="w-full bg-primary text-white py-2 rounded-button mt-4 !rounded-button hover:bg-primary/90 transition-colors"
            >
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

          <div class="sticky top-6">
            <img
              src="https://public.readdy.ai/ai/img_res/b7309b8da1044f4f162a66f3b58c0762.jpg"
              alt="decoration"
              class="w-full rounded-lg"
            />
          </div>
        </div>
      </div>
    </div>

    </script>
  </body>
</html>

