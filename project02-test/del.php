<?php
require __DIR__ . "/connect.php";
$article_id = isset($_GET['article_id']) ? intval($_GET['article_id']) : 0;
if (!empty($article_id)) {
    $sql = "DELETE FROM article WHERE article_id=$article_id";
    $pdo->query($sql);
}
$come_from = "index_.php";
# 如果有 referer 的 url, 就使用 referer url
if (isset($_SERVER['HTTP_REFERER'])) {
    $come_from = $_SERVER['HTTP_REFERER'];
}

header('Location: ' . $come_from);
