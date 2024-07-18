<?php
$response = ['success' => false, 'message' => ''];

// 檢查是否有文件上傳，並且沒有發生錯誤
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    // 獲取臨時文件路徑和文件名
    $fileTmpPath = $_FILES['avatar']['tmp_name'];
    $fileName = $_FILES['avatar']['name'];
    $fileSize = $_FILES['avatar']['size'];
    $fileType = $_FILES['avatar']['type'];

    // 分離文件名和擴展名
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // 允許的文件擴展名
    $allowedfileExtensions = ['jpg', 'jpeg', 'gif', 'png'];
    if (in_array($fileExtension, $allowedfileExtensions)) {
        // 定義文件上傳目錄
        $uploadFileDir = './assets/';
        $dest_path = $uploadFileDir . $fileName;

        // 移動上傳文件到指定目錄
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $response['success'] = true;
            $response['file'] = $fileName; // 返回文件名
        } else {
            $response['message'] = '移動上傳文件時發生錯誤。';
        }
    } else {
        $response['message'] = '上傳失敗。允許的文件類型：' . implode(',', $allowedfileExtensions);
    }
} else {
    $response['message'] = '沒有文件上傳或上傳錯誤。';
}

// 設置返回的內容類型為 JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
