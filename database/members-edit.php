<?php
include './api/db_connection.php';

// 處理表單提交
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 從表單獲取提交的資料
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $member_name = $_POST['member_name'];
    $location = $_POST['location'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];

    // 檢查並處理上傳的文件
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $avatar = $_FILES['avatar']['name'];
        $tmp_avatar = $_FILES['avatar']['tmp_name'];
        $upload_dir = "./assets/";
        $upload_file = $upload_dir . basename($avatar);

        // 確保目標目錄存在
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // 移動上傳的文件
        if (move_uploaded_file($tmp_avatar, $upload_file)) {
            // 文件移動成功，繼續處理其他資料
        } else {
            echo "文件上傳失敗";
            exit;
        }
    } else {
        echo "文件上傳失敗或未選擇文件";
        exit;
    }

    // 更新會員資料的SQL語句
    $sql = "UPDATE members SET 
                user_name = :user_name, 
                email = :email, 
                password = :password, 
                mobile = :mobile, 
                member_name = :member_name, 
                location = :location, 
                avatar = :avatar, 
                birthday = :birthday, 
                gender = :gender 
            WHERE user_id = :user_id";

    $stmt = $pdo->prepare($sql);

    try {
        // 執行更新操作
        $stmt->execute([
            ':user_id' => $user_id,
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

        // 更新成功後重定向到會員頁面
        header('Location: ./members.php');
    } catch (PDOException $ex) {
        // 顯示錯誤信息
        echo 'Error: ' . $ex->getMessage();
    }
} else if (isset($_GET['user_id'])) {
    // 獲取要編輯的會員ID
    $user_id = $_GET['user_id'];

    // 查詢會員資料的SQL語句
    $sql = "SELECT * FROM members WHERE user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':user_id' => $user_id]);
    $member = $stmt->fetch();

    if ($member) {
        // 會員資料存在，顯示編輯表單
?>
        <?php include './pages/header.php'; ?>
        <?php include './pages/navbar.php'; ?>

        <div class="container mt-5">
            <h2 class="mb-4">編輯會員資料</h2>
            <form id="editMemberForm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($member['user_id']); ?>">
                <div class="mb-3">
                    <label for="user_name" class="form-label">使用者名稱</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo htmlspecialchars($member['user_name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">電子信箱</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($member['email']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">密碼</label>
                    <input type="text" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($member['password']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">電話號碼</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo htmlspecialchars($member['mobile']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="member_name" class="form-label">真實姓名</label>
                    <input type="text" class="form-control" id="member_name" name="member_name" value="<?php echo htmlspecialchars($member['member_name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">地址</label>
                    <textarea class="form-control" name="location" id="location" cols="30" rows="3" required><?php echo htmlspecialchars($member['location']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">上傳頭像</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" required>
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label">生日</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo htmlspecialchars($member['birthday']); ?>">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">性別</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php echo ($member['gender'] == 'Male') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="male">男</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php echo ($member['gender'] == 'Female') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="female">女</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="Other" <?php echo ($member['gender'] == 'Other') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="other">其他</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">修改會員</button>
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
        <script src="./scripts/members-edit.js"></script>
        <?php include './pages/scripts.php'; ?>
        <?php include './pages/footer.php'; ?>
<?php
    } else {
        // 找不到會員
        echo 'Member not found';
    }
} else {
    // 無效請求
    echo 'Invalid request';
}
?>