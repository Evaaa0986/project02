<?php

require __DIR__ . '/db-connect.php';

$sql = "SELECT * FROM quiz ORDER BY ques_id ";
$stmt = $pdo->query($sql);

$i = 0;
while ($row = $stmt->fetch()) {
  echo "<div> $i: {$row['ques_id']} </div>";
  $i++;
}
