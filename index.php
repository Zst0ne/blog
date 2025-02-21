<?php
require_once('config.php');
require_once('refresh.php');
?>

<!DOCTYPE html>
<html lang="zh">
  <head>
	<?php echo $STYLES; echo $DEFAULT;?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $NAME; ?></title>
	

	
	<?php echo $HEAD; ?>
	
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
            ></div>
          </div>
        </div>

        <div class="col-span-4 space-y-6">
          <div class="bg-white rounded-lg p-6 shadow-sm">
            <div class="flex items-center space-x-4">
              <img
                src="./img/head2.jpg"
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
			
		  	<?php echo $SOCIAL; ?>
			<?php echo $ANNOUNCEMENT; ?>
			<?php echo $LIVE2D; ?>
          </div>
        </div>
      </div>
    </div>

    <script>
		  <?php echo $articles; ?>
        function createArticleElement(article) {
            return `
                <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <span>${article.date}</span>
                        <span>·</span>
                        <span class="text-primary">${article.category}</span>
                    </div>
                    <h3 class="text-xl font-bold mt-2 hover:text-primary cursor-pointer">
                        <a href="${article.url}">${article.title}</a>
                    </h3>
                    <div class="mt-2 text-sm text-gray-600">${article.preview}</div>
                    <div class="flex space-x-2 mt-4">
                        ${article.tags.map(tag => `<span class="px-2 py-1 bg-blue-50 text-primary text-sm rounded-full">${tag}</span>`).join('')}
                    </div>
                </div>
            `;
        }

const articleList = document.getElementById("articleList");
articles.forEach((article) => {
    articleList.innerHTML += createArticleElement(article);
});
    </script>
	<?php echo $MUSIC; ?>
  </body>
</html>
