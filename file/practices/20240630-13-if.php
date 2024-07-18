<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $age = isset($_GET["age"]) ? intval($_GET["age"]) : 0;


  if ($age >= 18) {
    echo '<h2>歡迎光臨</h2>';
    echo '<img src="https://www.alleycat.org/wp-content/uploads/2019/03/FELV-cat.jpg" alt="">';
  } else {
    echo '<h2>No no</h2>';
    echo '<img src="https://cdn.theatlantic.com/thumbor/fWHNkP-IHxWP4gyI87XDAaiKPFU=/0x62:2000x1187/976x549/media/img/mt/2018/03/AP_325360162607/original.jpg" alt="">';
  }



  ?>

</body>

</html>