<?php
require __DIR__ . '/parts/admin-required.php';
require __DIR__ . '/db-connect.php';

if (isset($_GET['search'])) {
  $search = $_GET['search'];

  // 使用MySQL的LIKE運算符來進行模糊搜索
  $sql = "SELECT * FROM game WHERE game_name LIKE '%" . $search . "%'";
  $result = $pdo->query($sql);
  $rows = $pdo->query($sql)->fetchAll();
  if ($result->$rows > 0) {
      // 输出匹配的結果
      while ($row = $result->fetch_assoc()) {
          echo "結果：" . $row["game_name"] . "<br>";
          // 在這裡可以顯示其他相關資訊
      }
  } else {
      echo "沒有找到匹配的結果";
  }
}

// 關閉數據庫連接
$conn->close();
