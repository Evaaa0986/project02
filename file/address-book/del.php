<?php
require __DIR__ . '/parts/admin-required.php';
require __DIR__ . '/db-connect.php';

$ques_id = isset($_GET['ques_id']) ? intval($_GET['ques_id']) : 0;
if (!empty($ques_id)) {
  $sql = "DELETE FROM quiz WHERE ques_id=$ques_id";
  $pdo->query($sql);
}
$come_from = "index_.php";
# 如果有 referer 的 url, 就使用 referer url
if (isset($_SERVER['HTTP_REFERER'])) {
  $come_from = $_SERVER['HTTP_REFERER'];
}

header('Location: ' . $come_from);
