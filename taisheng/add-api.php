<?php
require __DIR__ . '/parts/admin-required.php';

require __DIR__ . '/db-connect.php';
header('Content-Type: application/json');

$output = [
  'success' => false,
  'bodyData' => $_POST, # 除錯用
];


// TODO: 表單欄位的資料檢查

// if (isset($_POST['level'])) {
//   // 使用 $_POST['level'] 的值
//   $level = $_POST['level'];
//  echo( $level);
// } else {
//   // 如果未定義，可以設置一個默認值或者執行相應的錯誤處理
//   $level = ''; // 或者設置一個默認值，或者執行其他相應的處理
// }

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
$sql = "INSERT INTO `game`( 
  `game_name`, `game_des`, `minperson`,
  `maxperson`, `mintime`,`maxtime`, `level`
  ) VALUES (
    ?, ?, ?, 
    ?, ?, ?, ?
  )";
$stmt = $pdo->prepare($sql); # 準備 sql 語法, 除了 "值" 語法要合法
$stmt->execute([
  $_POST['game_name'],
  $_POST['game_des'],
  $_POST['minperson'],
  $_POST['maxperson'],
  $_POST['mintime'],
  $_POST['maxtime'],
  $_POST['level']
]);

$output['success'] = !!$stmt->rowCount();
echo json_encode($output);