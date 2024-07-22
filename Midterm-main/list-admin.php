<?php
require __DIR__ . '/parts/admin-required.php';
$title = "遊戲商品列表";
$pageName = "pd_list";

$perPage = 20; # 表示一頁最多有 20 筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
  header('Location: ./'); # 跳轉頁面
  exit; # 結束程式, die()
}

require __DIR__ . '/db-connect.php';
$t_sql = "SELECT COUNT(1) FROM product ";
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
    "SELECT * FROM product ORDER BY order_id DESC LIMIT %s, %s",
    ($page - 1) * $perPage,
    $perPage
  );

  $rows = $pdo->query($sql)->fetchAll();
}

?>
<?php include __DIR__ . "../../parts/html-head.php"; ?>
<?php include __DIR__ . "./parts/navbar.php"; ?>
<div class="container">
  <div class="row">
    <div class="col">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
            if ($i >= 1 && $i <= $totalPages) :
          ?>
              <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
              </li>
          <?php
            endif;
          endfor; ?>
        </ul>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th><i class="fa-solid fa-trash"></i></th>
            <th>編號</th>
            <th>名稱</th>
            <th>簡介</th>
            <th>類型</th>
            <th>價錢</th>
            <th>庫存</th>
            <th>付款狀態</th>
            <th>上架時間</th>
            <th><i class="fa-solid fa-pen-to-square"></i></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $r) : ?>
            <tr>
              <td>

                <a href="javascript: deleteOne(<?= $r['order_id'] ?>)">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </td>
              <td><?= $r['order_id'] ?></td>
              <td><?= $r['game_id'] ?></td>
              <td><?= $r['game_des'] ?></td>
              <td><?= $r['type'] ?></td>
              <td><?= $r['price'] ?></td>
              <td><?= $r['stock'] ?></td>
              <td><?= $r['payment'] ?></td>
              <td><?= $r['created_at'] ?></td>
              <td>
                <a href="edit.php?order_id=<?= $r['order_id'] ?>">
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

<?php include __DIR__ . "../../parts/scripts.php"; ?>
<script>
  const data = <?= json_encode($rows)  ?>;
  const deleteOne = (order_id) => {
    if (confirm(`是否要刪除編號為 ${order_id} 的資料??`)) {
      location.href = `del.php?order_id=${order_id}`;
    }
  };
</script>

<?php include __DIR__ . "../../parts/html-foot.php"; ?>