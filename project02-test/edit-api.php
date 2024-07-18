<?php
require __DIR__ . "/connect.php";
header('Content-Type: application/json');

$output = [
    'success' => false,
    'bodyData' => $_POST, # 除錯用
    'code' => 0, # 除錯用
];


// TODO: 表單欄位的資料檢查
$article_id = isset($_POST['article_id']) ? intval($_POST['article_id']) : 0;
if (empty($article_id)) {
    $output['code'] = 400;
    echo json_encode($output);
    exit;
}


$sql = "UPDATE `article` SET 
    `user_id`=?,
    `article_class`=?,
    `game_id`=?,
    `title`=?,
    `content`=?
    WHERE `article_id`=? ";

$stmt = $pdo->prepare($sql); # 準備 sql 語法, 除了 "值" 語法要合法
$stmt->execute([
    $_POST['user_id'],
    $_POST['article_class'],
    $_POST['game_id'],
    $_POST['title'],
    $_POST['content'],
    $article_id
]);

$output['success'] = !!$stmt->rowCount();
echo json_encode($output);
