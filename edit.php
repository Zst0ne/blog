
<?php
session_start();
// 验证用户是否已登录
if (!isset($_SESSION['islogin']) || $_SESSION['islogin']!== 1) {
    header('Location: login.php');
    exit();
}

// 检查session是否过期（30分钟）
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
    session_destroy();
    header('Location: login.php?error=expired');
    exit();
}

$_SESSION['last_activity'] = time();

// 定义笔记文件路径
$noteFilePath = './source/_posts/';

if(isset($_GET['edit'])) {
    $noteFilePath .= basename($_GET['edit']);
} else {
    $noteFilePath .= 'new.md';
}

// 处理保存笔记的请求
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['markdown_content'])) {
    $markdownContent = $_POST['markdown_content'];
    // 将笔记内容写入文件
    if (file_put_contents($noteFilePath, $markdownContent) === false) {
        echo '笔记保存失败';
    } else {
        echo '笔记已保存';
    }
    exit;
}

// 读取笔记文件内容
if (file_exists($noteFilePath)) {
    $savedContent = file_get_contents($noteFilePath);
} else {
    $savedContent = "文件不存在.";
}
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Markdown 笔记编辑器</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        /* 左侧边栏样式 */
        #sidebar {
            width: 80px;
            height: 100%;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-right: 1px solid #ccc;
        }

        #sidebar button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            margin-bottom: 20px;
        }

        #sidebar button:hover {
            background-color: #0056b3;
        }

        #editor {
            width: 45%;
            height: 100%;
            border: none;
            resize: horizontal;
            padding: 20px;
            font-size: 16px;
            box-sizing: border-box;
        }

        #preview {
            width: 55%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
            overflow-y: auto;
            border-left: 1px solid #ccc;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editor = document.getElementById('EditorId');
            const preview = document.getElementById('preview');
            const saveButton = document.getElementById('saveButton');
            const loadButton = document.getElementById('loadButton');

            // 初始化编辑器内容 
			
            editor.value = `<?php echo htmlspecialchars($savedContent); ?>`;

            // 实时预览 Markdown 内容
            function updatePreview() {
                const markdown = editor.value;
                const html = marked.parse(markdown);
                preview.innerHTML = html;
            }
			
			
			async function sendFetchRequest() {
				const urlParams = new URLSearchParams(window.location.search);
				const paramsString = urlParams.toString();
				
			    const response = await fetch('edit.php', {
			    method: 'GET',
			    headers: {
			        'Content-Type': 'application/x-www-form-urlencoded'
			    },
			    body: paramsString
			    });
				// 处理响应
				if (response.ok) {
					const data = await response.text();
					console.log(data);
				} else {
					console.error('请求失败:', response.status);
					}
				}
			
            editor.addEventListener('input', updatePreview);
            updatePreview();

            // 保存笔记
            saveButton.addEventListener('click', function () {
                const markdownContent = editor.value;
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert(xhr.responseText);
                    }
                };
                xhr.send('markdown_content=' + encodeURIComponent(markdownContent));
            });
			
			// 重新加载
			loadButton.addEventListener('click', function () {
				editor.value = `<?php echo htmlspecialchars($savedContent); ?>`;
				console.log(editor.value);
			});
			
        });
    </script>
</head>

<body>
    <!-- 左侧边栏 -->
    <div id="sidebar">
        <button id="loadButton">重新加载</button>
        <button id="saveButton">保存笔记</button>
    </div>

    <!-- 编辑区域 -->
    <table>
        <tr>
            <td>
					<h1>文章编辑页面</h1>
                <!-- 只保留唯一的 id -->
                文件名:<input type="text" name="textInput" placeholder="请输入编辑的文章名字">
                <textarea name="content" id="EditorId" class="common-textarea" cols="30" rows="10">
                    <?php echo htmlspecialchars($savedContent); ?>
                </textarea>
            </td>
        </tr>
        <tr>
            <th></th>
            <td></td>
        </tr>
    </table>
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="utf-8">
    // 初始化编辑器
    window.UEDITOR_HOME_URL = "ueditor/"; // 配置路径设定为 UEditor 所放的位置
    window.onload = function () {
        /* window.UEDITOR_CONFIG.initialFrameHeight=600; // 编辑器的高度 */
        /* window.UEDITOR_CONFIG.initialFrameWidth=1200; // 编辑器的宽度 */
        var editor = new UE.ui.Editor({
            imageUrl: '',
            fileUrl: '',
            imagePath: '',
            filePath: '',
            imageManagerUrl: '', // 图片在线管理的处理地址
            imageManagerPath: ''
        });
        editor.render("EditorId"); // 此处的 EditorId 与 <textarea name="content" id="EditorId"> 的 id 值对应
    }
</script>
</body>

</html>