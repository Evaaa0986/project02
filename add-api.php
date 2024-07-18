<?php
require __DIR__ . "/connect.php";
header("Content-type: application/json");
echo json_encode($_POST);
$output = [
    'success' => false,
    'bodyData' => $_POST,
];
$sql = "INSERT INTO `article`( 
  `user_id`, `article_class`, `game_id`,
  `times`, `title`, `content`
  ) VALUES (
    ?, ?, ?, 
    current_timestamp(), ?, ?
  )";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['user_id'],
    $_POST['article_class'],
    $_POST['game_id'],
    $_POST['title'],
    $_POST['content'],
]);
$output['success'] = !!$stmt->rowCount();
echo json_encode($output);