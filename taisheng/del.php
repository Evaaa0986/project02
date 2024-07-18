<?php
require __DIR__ . '/parts/admin-required.php';
require __DIR__ . '/db-connect.php';

$game_id = isset($_GET['game_id']) ? intval($_GET['game_id']) : 0;
if (!empty($game_id)) {
  $sql = "DELETE FROM game WHERE game_id=$game_id";
  $pdo->query($sql);
}
$come_from = "index_.php";
# 如果有 referer 的 url, 就使用 referer url
if (isset($_SERVER['HTTP_REFERER'])) {
  $come_from = $_SERVER['HTTP_REFERER'];
}

header('Location: '. $come_from);
