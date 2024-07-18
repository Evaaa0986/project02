<?php
require __DIR__ . '/parts/admin-required.php';
require __DIR__ . '/db-connect.php';
header('Content-Type: application/json');

$output = [
  'success' => false,
  'bodyData' => $_POST, # 除錯用
  'code' => 0, # 除錯用
];


// TODO: 表單欄位的資料檢查
$order_id = isset($_POST['order_id']) ? intval($_POST['order_id']) : 0;
if (empty($order_id)) {
  $output['code'] = 400;
  echo json_encode($output);
  exit;
}
// $name = $_POST['game_id'] ?? ''; # ?? 如果 ?? 的左邊為 undefined, 就使用右邊的值
// if (mb_strlen($name) < 2) {
//   $output['code'] = 405;
//   echo json_encode($output);
//   exit;
// }


// $birthday = $_POST['birthday'];
// $ts = strtotime($birthday); # 轉換成 timestamp
// if ($ts === false) {
//   $birthday = null; # 如果不是日期的格式, 就使用 null
// } else {
//   $birthday = date('Y-m-d', $ts);
// }



$sql = "UPDATE `product` SET 
    `game_id`=?,
    `game_des`=?,
    `type`=?,
    `price`=?,
    `stock`=?,
    `payment`=?
    WHERE `order_id`=? ";

$stmt = $pdo->prepare($sql); # 準備 sql 語法, 除了 "值" 語法要合法
$stmt->execute([
  $_POST['game_id'],
  $_POST['game_des'],
  $_POST['type'],
  $_POST['price'],
  $_POST['stock'],
  $_POST['payment'],
  $order_id
]);

$output['success'] = !!$stmt->rowCount();
echo json_encode($output);
