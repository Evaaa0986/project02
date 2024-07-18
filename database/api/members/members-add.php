<?php
include '../db_connection.php';

$response = ['success' => false, 'message' => ''];

// 檢查請求方法是否為 POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取表單資料
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // 哈希密碼
    $mobile = $_POST['mobile'];
    $member_name = $_POST['member_name'];
    $location = $_POST['location'];
    $avatar = ''; // 初始化頭像變量
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];

    // 處理文件上傳
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['avatar']['tmp_name'];
        $fileName = $_FILES['avatar']['name'];
        $fileSize = $_FILES['avatar']['size'];
        $fileType = $_FILES['avatar']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // 允許的文件擴展名
        $allowedfileExtensions = ['jpg', 'gif', 'png'];
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = '../uploads/';
            $dest_path = $uploadFileDir . $fileName;

            // 移動上傳文件
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $avatar = $fileName;
            } else {
                $response['message'] = '移動上傳文件時發生錯誤。';
                echo json_encode($response);
                exit;
            }
        } else {
            $response['message'] = '上傳失敗。允許的文件類型：' . implode(',', $allowedfileExtensions);
            echo json_encode($response);
            exit;
        }
    }

    // 插入會員資料的 SQL 語句
    $sql = "INSERT INTO members (user_name, email, password, mobile, member_name, location, avatar, birthday, gender) 
            VALUES (:user_name, :email, :password, :mobile, :member_name, :location, :avatar, :birthday, :gender)";
    $stmt = $pdo->prepare($sql);

    try {
        // 開始事務處理
        $pdo->beginTransaction();

        // 執行插入會員資料操作
        $stmt->execute([
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

        // 插入用戶登錄信息的 SQL 語句
        $loginSql = "INSERT INTO login (email, password) VALUES (:email, :password)";
        $loginStmt = $pdo->prepare($loginSql);
        $loginStmt->execute([':email' => $email, ':password' => $password]);

        // 提交事務
        $pdo->commit();

        // 插入成功後自動登入
        session_start();
        $_SESSION['user'] = [
            'user_name' => $user_name,
            'email' => $email,
            'mobile' => $mobile,
            'member_name' => $member_name,
            'location' => $location,
            'avatar' => $avatar,
            'birthday' => $birthday,
            'gender' => $gender
        ];

        $response['success'] = true;
        $response['message'] = '會員添加成功';
        $response['redirect'] = 'members.php'; // 登入成功後重定向至會員頁面
    } catch (PDOException $ex) {
        // 出現錯誤時回滾事務
        $pdo->rollBack();
        $response['message'] = '錯誤: ' . $ex->getMessage();
    }
}

// 返回 JSON 響應
header('Content-Type: application/json');
echo json_encode($response);
?>
<script src="../../scripts/members-add.js"></script>