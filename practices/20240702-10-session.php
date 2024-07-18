<?php
session_start(); # 基本上是操作 cookie, 要放在最前面
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  if (isset($_SESSION['count'])) {
    $_SESSION['count']++;
  } else {
    $_SESSION['count'] = 1;
  }

  echo $_SESSION['count'];
  ?>
</body>

</html>