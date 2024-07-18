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
$game_id = isset($_POST['game_id']) ? intval($_POST['game_id']) : 0;
if (empty($game_id)) {
  $output['code'] = 400;
  echo json_encode($output);
  exit;
}
$game_name = $_POST['name'] ?? ''; # ?? 如果 ?? 的左邊為 undefined, 就使用右邊的值




$sql = "UPDATE `game` SET 
    `game_name`=?,
    `game_des`=?,
    `minperson`=?,
    `maxperson`=?,
    `mintime`=?,
    `maxtime`=?,
    `level`=?
    WHERE `game_id`=? ";

$stmt = $pdo->prepare($sql); # 準備 sql 語法, 除了 "值" 語法要合法
$stmt->execute([
  $_POST['game_name'],
  $_POST['game_des'],
  $_POST['minperson'],
  $_POST['maxperson'],
  $_POST['mintime'],
  $_POST['maxtime'],
  $_POST['level'],
  $game_id,
]);

$output['success'] = !!$stmt->rowCount();
echo json_encode($output);
