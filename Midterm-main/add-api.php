<?php
require __DIR__ . '/parts/admin-required.php';

require __DIR__ . '/db-connect.php';
header('Content-Type: application/json');

$output = [
  'success' => false,
  'bodyData' => $_POST, # 除錯用
];


// TODO: 表單欄位的資料檢查



/*
// 錯誤的作法: SQL injection 的問題
$sql = "INSERT INTO `address_book`( 
  `name`, `email`, `mobile`,
  `birthday`, `address`, `created_at`
  ) VALUES (
    '{$_POST['name']}', '{$_POST['email']}', '{$_POST['mobile']}',
    '{$_POST['birthday']}', '{$_POST['address']}', NOW()
  )";
$stmt = $pdo->query($sql);
*/
$sql = "INSERT INTO `product`( 
  `game_id`, `game_des`, `type`,
  `price`, `stock`, `payment`, `created_at`
  ) VALUES (
    ?, ?, ?, 
    ?, ?, ?, NOW()
  )";

$stmt = $pdo->prepare($sql); # 準備 sql 語法, 除了 "值" 語法要合法
$stmt->execute([
  $_POST['game_id'],
  $_POST['game_des'],
  $_POST['type'],
  $_POST['price'],
  $_POST['stock'],
  $_POST['payment'],
]);

$output['success'] = !!$stmt->rowCount();
echo json_encode($output);
