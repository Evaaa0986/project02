<?php
$title = "遊戲列表";
$pageName = "game_list";

$perPage = 20; # 表示一頁最多有 20 筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
  header('Location: ./'); # 跳轉頁面
  exit; # 結束程式, die()
}

require __DIR__ . '/db-connect.php';
$t_sql = "SELECT COUNT(1) FROM game ";
# 取得總筆數
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = 0;
$rows = [];
if ($totalRows) {
  # 計算總頁數
  $totalPages = ceil($totalRows / $perPage);
  if ($page > $totalPages) {
    header('Location: ?page=' . $totalPages); # 跳轉頁面到最後一頁
    exit; # 結束程式
  }

  # 取得該頁的資料
  $sql = sprintf(
    "SELECT * FROM game ORDER BY game_id  LIMIT %s, %s",
    ($page - 1) * $perPage,
    $perPage
  );

  $rows = $pdo->query($sql)->fetchAll();
}

?>
<?php include __DIR__ . "../../parts/html-head.php"; ?>
<?php include __DIR__ . "/parts/navbar.php"; ?>
<div class="container">
<div class="row">
    <div class="col">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th><i class="fa-solid fa-trash"></i></th>
            <th>編號</th>
            <th>遊戲名稱</th>
            <th>遊戲簡介</th>
            <th>最少幾人</th>
            <th>最多幾人</th>
            <th>最少時數</th>
            <th>最多時數</th>
            <th>難易度</th>
            <th><i class="fa-solid fa-pen-to-square"></i></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $r) : ?>
            <tr>
              <td>
                <!--
                <a href="del.php?ab_id=<?= $r['game_id'] ?>" onclick="return confirm(`是否要刪除編號為 <?= $r['game_id'] ?> 的資料?`)">
          -->
                <a href="javascript: deleteOne(<?= $r['game_id'] ?>)">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </td>
              <td><?= $r['game_id'] ?></td>
              <td><?= $r['game_name'] ?></td>
              <td><?= $r['game_des'] ?></td>
              <td><?= $r['minperson'] ?></td>
              <td><?= $r['maxperson'] ?></td>
              <td><?= $r['mintime'] ?></td>
              <td><?= $r['maxtime'] ?></td>
              <td><?= $r['level'] ?></td>
              <td>
                <a href="edit.php?game_id=<?= $r['game_id'] ?>">
                  <i class="fa-solid fa-pen-to-square"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<?php include __DIR__ . "../../parts/scripts.php"; ?>
<?php include __DIR__ . "../../parts/html-foot.php"; ?>