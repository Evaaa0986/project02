<?php

require __DIR__ . '/db-connect.php';

$sql = "SELECT * FROM quiz ORDER BY ques_id ";
$stmt = $pdo->query($sql);

# $r = $stmt->fetch();
# $r = $stmt->fetch();

$rows = $stmt->fetchAll(); # 使用 fetchAll() 之前, 基本上不要使用 fetch()


# $rows = $pdo->query($sql)->fetchAll();

header('Content-Type: application/json'); # 告訴瀏覽器內容為 JSON
echo json_encode($rows, JSON_UNESCAPED_UNICODE);
