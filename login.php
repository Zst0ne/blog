<?php
session_start();

// 如果用户已登录，直接跳转到admin页面
if (isset($_SESSION['islogin']) && $_SESSION['islogin'] === 1) {
    header('Location: admin.php');
    exit;
}

// 显示错误信息
$error_message = '';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'empty':
            $error_message = '用户名或密码不能为空';
            break;
        case 'invalid':
            $error_message = '用户名或密码错误';
            break;
        case 'expired':
            $error_message = '会话已过期，请重新登录';
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录页面</title>
    <style>
        /* 全局样式 */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* 登录容器样式 */
        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 350px;
            text-align: center;
        }

        /* 标题样式 */
        h2 {
            color: #333;
            margin-bottom: 30px;
            font-weight: 600;
        }

        /* 表单标签样式 */
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #666;
            font-size: 0.9em;
        }

        /* 输入框样式 */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        /* 提交按钮样式 */
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: #dc3545;
            margin-bottom: 15px;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>用户登录</h2>
        <?php if ($error_message): ?>
            <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>
        <form action="admin.php" method="post">
            <label for="username">用户名:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">密码:</label>
            <input type="password" id="password" name="password" required>
            <label>
                <input type="checkbox" name="remember" value="yes"> 记住我
            </label>
            <input type="submit" name="login" value="登录">
        </form>
    </div>
</body>

</html>