<?php
header('Content-Type: application/json');

$dir = __DIR__ . "/../uploads/";


if (
  !empty($_FILES['avatar'])
  and
  !$_FILES['avatar']['error']
) {
  $result = move_uploaded_file(
    $_FILES['avatar']['tmp_name'],
    $dir . $_FILES['avatar']['name']
  );
  var_dump($result);
  exit;
}

echo '<h2>上傳發生錯誤</h2>';
