<?php
$pageName = "register"; // 頁面名稱
require("./api/db_connection.php"); // 包含資料庫連接文件
include __DIR__ . "/pages/header.php"; // 包含頁首文件
include __DIR__ . "/pages/navbar.php"; // 包含導航欄文件

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 從表單接收數據
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // 使用 password_hash 進行密碼加密
    $mobile = $_POST['mobile'];
    $member_name = $_POST['member_name'];
    $location = $_POST['location'];
    $avatar = $_FILES['avatar']['name']; // 獲取上傳的頭像文件名
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];

    // 開啟資料庫事務
    $pdo->beginTransaction();

    try {
        // 插入用戶登錄信息
        $sql = "INSERT INTO login (email, password) VALUES (:email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email, ':password' => $password]);

        // 獲取新插入用戶的ID
        $userId = $pdo->lastInsertId();

        // 插入用戶詳細信息
        $sql = "INSERT INTO members (user_id, user_name, email, password, mobile, member_name, location, avatar, birthday, gender) 
                VALUES (:user_id, :user_name, :email, :password, :mobile, :member_name, :location, :avatar, :birthday, :gender)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $userId,
            ':user_name' => $user_name,
            ':email' => $email,
            ':password' => $password,
            ':mobile' => $mobile,
            ':member_name' => $member_name,
            ':location' => $location,
            ':avatar' => $avatar,
            ':birthday' => $birthday,
            ':gender' => $gender,
        ]);

        // 移動上傳的文件到指定目錄
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], "./assets/" . $_FILES['avatar']['name'])) {
            $pdo->commit(); // 提交事務
            echo "註冊成功";
        } else {
            throw new Exception("文件上傳失敗");
        }
    } catch (Exception $ex) {
        $pdo->rollBack(); // 回滾事務
        echo "註冊失敗: " . $ex->getMessage();
    }
}
?>

<div class="container mt-5">
    <form id="addMemberForm" method="post" enctype="multipart/form-data" class="w-75 p-3">
        <div class="mb-3">
            <label for="user_name" class="form-label">使用者名稱</label>
            <input type="text" class="form-control" id="user_name" name="user_name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">電子信箱</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">密碼</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="mobile" class="form-label">電話號碼</label>
            <input type="text" class="form-control" id="mobile" name="mobile" required>
        </div>
        <div class="mb-3">
            <label for="member_name" class="form-label">真實姓名</label>
            <input type="text" class="form-control" id="member_name" name="member_name" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">地址</label>
            <textarea class="form-control" name="location" id="location" cols="30" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">上傳頭像</label>
            <input type="file" class="form-control" id="avatar" name="avatar" required>
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">生日</label>
            <input type="date" class="form-control" id="birthday" name="birthday">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">性別</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="男">
                <label class="form-check-label" for="male">男</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="女">
                <label class="form-check-label" for="female">女</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="other" value="Other">
                <label class="form-check-label" for="other">其他</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">註冊</button>
    </form>
</div>

<script>
    document.getElementById('avatar').addEventListener('change', function() {
        const fileInput = document.getElementById('avatar');
        const file = fileInput.files[0];
        const formData = new FormData();
        formData.append('avatar', file);

        fetch('avatar.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('myimg').src = "./assets/" + data.file;
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>
<script src="./scripts/members-add.js"></script>
<?php include __DIR__ . "/pages/scripts.php"; // 包含腳本文件 
?>
<?php include __DIR__ . "/pages/footer.php"; // 包含頁尾文件 
?>