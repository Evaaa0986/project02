<?php

$db_host = '172.18.103.109'; // 使用數據庫服務器 IP
$db_user = 'root';      // 數據庫用戶名
$db_pass = 'a0988676918'; // 數據庫密碼
$db_name = 'project02';
$db_port = 3306;
// 數據源名稱（DSN）
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

// PDO 選項
$pdo_options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 設置默認的提取模式為關聯數組
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,     // 設置錯誤模式為異常
];

try {

    $pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options); // 創建 PDO 實例
} catch (PDOException $ex) {

    echo "Connection failed: " . $ex->getMessage(); // 捕獲並處理連接錯誤
    exit;
}

// Start the session if not already started
if (!isset($_SESSION)) {
    session_start();
}
