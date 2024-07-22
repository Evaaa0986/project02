<?php
$db_host = '127.0.0.1';
$db_user = 'root';
$db_pass = 'a0988676918';
$db_name = 'project02';
$db_port = 3306;

$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);

// $stmt = $pdo->query("SELECT * FROM article");
// $row = $stmt->fetch();
// echo json_encode($row);