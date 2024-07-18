<?php
$pageName = "login"; // 設定頁面名稱
?>

<?php require("./api/db_connection.php"); // 引入資料庫連接 
?>

<?php include __DIR__ . "./pages/header.php"; // 包含頁首 
?>
<?php include __DIR__ . "./pages/navbar.php"; // 包含導航欄 
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 處理表單提交
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 查詢使用者的SQL語句
    $sql = "SELECT * FROM login WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

    // 驗證密碼
    if ($user && password_verify($password, $user['password'])) {
        session_start(); // 啟動會話
        $_SESSION['user'] = $user; // 將使用者資料存入會話
        header('Location: members.php'); // 重定向到會員頁面
        exit;
    } else {
        echo "登入失敗"; // 登入失敗提示
    }
}
?>

<div class="card position-absolute top-50 start-50 translate-middle" style="width: 40rem;">
    <div class="card-body">
        <form method="post">
            <h1>登入畫面</h1>
            <div class="m-3">
                <label for="email" class="form-label">帳號</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="m-3">
                <label for="password" class="form-label">密碼</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="input-group-text" id="togglePassword">
                        <i class="bi bi-eye-slash-fill" id="eyeIcon"></i>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">登入</button>
            <a href="./register.php">註冊</a>
            <a href="./forget-pwd.php">忘記密碼</a>
        </form>
    </div>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const eyeIcon = document.querySelector('#eyeIcon');

    togglePassword.addEventListener('click', function() {
        // 切換input的type屬性
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // 切換圖標
        eyeIcon.classList.toggle('bi-eye-fill');
        eyeIcon.classList.toggle('bi-eye-slash-fill');
    });
</script>

<?php include __DIR__ . "./pages/scripts.php"; // 包含腳本 
?>
<?php include __DIR__ . "./pages/footer.php"; // 包含頁尾 
?>