<?php

require __DIR__ .'/db-connect.php';
$sql = "SELECT * FROM game ORDER BY game_id LIMIT 3";
$stmt = $pdo -> query($sql);
// $r = $stmt -> fetch();
// $r = $stmt -> fetch();
$rows = $stmt -> fetchAll();#使用fetchAll()之前 ,基本上不要使用fetch()

// $rows = $pdo ->query($sql)->fetchAll();
echo json_encode($rows,JSON_UNESCAPED_UNICODE);