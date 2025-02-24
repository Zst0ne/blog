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
$noteFilePath = 'note.md';

// 处理保存笔记的请求
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['markdown_content'])) {
    $markdownContent = $_POST['markdown_content'];
    // 将笔记内容写入文件
    file_put_contents($noteFilePath, $markdownContent);
    echo '笔记已保存';
    exit;
}

// 读取笔记文件内容
if (file_exists($noteFilePath)) {
    $savedContent = file_get_contents($noteFilePath);
} else {
    $savedContent = '';
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

        #editor {
            width: 50%;
            height: 100%;
            border: none;
            resize: horizontal;
            padding: 20px;
            font-size: 16px;
            box-sizing: border-box;
        }

        #preview {
            width: 50%;
            height: 100%;
            padding: 20px;
            box-sizing: border-box;
            overflow-y: auto;
            border-left: 1px solid #ccc;
        }

        button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editor = document.getElementById('editor');
            const preview = document.getElementById('preview');
            const saveButton = document.getElementById('saveButton');

            // 初始化编辑器内容
            editor.value = `<?php echo htmlspecialchars($savedContent); ?>`;

            // 实时预览 Markdown 内容
            function updatePreview() {
                const markdown = editor.value;
                const html = marked.parse(markdown);
                preview.innerHTML = html;
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
        });
    </script>
</head>

<body>
    <textarea id="editor"></textarea>
    <div id="preview"></div>
    <button id="saveButton">保存笔记</button>
</body>

</html>