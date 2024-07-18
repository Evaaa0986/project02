<?php

// 引入資料庫連接文件
require __DIR__ . "/db-connect.php";
// 設置回應的內容類型為 JSON
header("Content-Type: application/json");

// 初始化回應數據
$out_put = [
    'success' => false,
    'bodydata' => $_POST,
    'code' => 0,
    'error' => '',
];

// 檢查是否提交了 email 和 password
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    $out_put['error'] = '資料不足'; // 錯誤信息
    $out_put['code'] = 401; // 錯誤代碼
    echo json_encode($out_put); // 回應 JSON
    exit;
}

// 取得並修剪 email 和 password
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// 查詢 email 是否存在於 login 表
$sql = "SELECT * FROM login WHERE email=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
$row = $stmt->fetch();

// 檢查 email 是否存在
if (empty($row)) {
    $out_put['error'] = '帳號錯誤'; // 錯誤信息
    $out_put['code'] = 403; // 錯誤代碼
    echo json_encode($out_put); // 回應 JSON
    exit;
}

// 驗證密碼是否正確
if (password_verify($password, $row['password_hash'])) {
    $out_put['success'] = true; // 登入成功
    $out_put['code'] = 200; // 成功代碼
    // 啟動 session 並存儲用戶信息
    session_start();
    $_SESSION['admin'] = [
        'id' => $row['member_id'],
        'email' => $row['email'],
        'nickname' => $row['nickname'],
    ];
} else {
    $out_put['error'] = '密碼錯誤'; // 錯誤信息
    $out_put['code'] = 405; // 錯誤代碼
}

// 回應 JSON，並確保使用 UNICODE 格式
echo json_encode($out_put, JSON_UNESCAPED_UNICODE);
?>
