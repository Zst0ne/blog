<?php
// 先加载 Parsedown
require_once './include/Parsedown.php';
// 再加载 ParsedownExtra
require_once './include/ParsedownExtra.php';

// 创建 ParsedownExtra 实例
$parsedown = new ParsedownExtra();

// 解析 Markdown 文本
echo $parsedown->text('# Hello, Parsedown Extra!');
?>