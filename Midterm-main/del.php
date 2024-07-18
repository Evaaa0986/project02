<?php
require __DIR__ . '/parts/admin-required.php';
require __DIR__ . '/db-connect.php';

$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
if (!empty($order_id)) {
  $sql = "DELETE FROM product WHERE order_id=$order_id";
  $pdo->query($sql);
}
$come_from = "index_.php";
# 如果有 referer 的 url, 就使用 referer url
if (isset($_SERVER['HTTP_REFERER'])) {
  $come_from = $_SERVER['HTTP_REFERER'];
}

header('Location: ' . $come_from);
