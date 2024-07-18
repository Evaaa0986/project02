<?php

require __DIR__ .'/db-connect.php';
$sql = "SELECT * FROM game ORDER BY game_id LIMIT 5";
$stmt = $pdo -> query($sql);
// $rows = $stmt -> fetchAll();
$i = 1;
while($row = $stmt ->fetch()){
  echo"<div>$i:{$row['name']}</div>";
$i++;
}