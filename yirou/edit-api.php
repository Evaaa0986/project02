<?php
require __DIR__ . '/parts/admin-required.php';
require __DIR__ . '/db-connect.php';
header('Content-Type: application/json');

$output = [
  'success' => false,
  'bodyData' => $_POST, // 除錯用
  'code' => 0, // 除錯用
];

$ques_id = isset($_POST['ques_id']) ? intval($_POST['ques_id']) : 0;
if (empty($ques_id)) {
  $output['code'] = 400;
  echo json_encode($output);
  exit;
};

$sql = "UPDATE `quiz` SET 
    `ques_con`=?,
    `opt1`=?,
    `opt2`=?,
    `opt3`=?,
    `opt4`=?,
    `opt5`=? 
    WHERE `ques_id`=?";

$stmt = $pdo->prepare($sql); // 準備 sql 語法, 除了 "值" 語法要合法
$stmt->execute([
  $_POST['ques_con'],
  $_POST['opt1'],
  $_POST['opt2'],
  $_POST['opt3'],
  $_POST['opt4'],
  $_POST['opt5'],
  $ques_id
]);

$output['success'] = !!$stmt->rowCount();
echo json_encode($output);
