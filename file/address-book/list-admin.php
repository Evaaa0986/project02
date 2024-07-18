<?php
require __DIR__ . '/parts/admin-required.php';
$title = "通訊錄列表";
$pageName = "ab_list";

$perPage = 20; # 表示一頁最多有 20 筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
  header('Location: ./'); # 跳轉頁面
  exit; # 結束程式, die()
}

require __DIR__ . '/db-connect.php';
$t_sql = "SELECT COUNT(1) FROM quiz ";
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
    "SELECT * FROM quiz ORDER BY ques_id",
    ($page - 1) * $perPage,
    $perPage
  );

  $rows = $pdo->query($sql)->fetchAll();
}

?>
<?php include __DIR__ . "/parts/html-head.php"; ?>
<?php include __DIR__ . "/parts/navbar.php"; ?>
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
            <th>問題內容</th>
            <th>選項1</th>
            <th>選項2</th>
            <th>選項3</th>
            <th>選項4</th>
            <th>選項5</th>
            <th><i class="fa-solid fa-pen-to-square"></i></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $r) : ?>
            <tr>
              <td>
                <!--
                <a href="del.php?ques_id=<?= $r['ques_id'] ?>" onclick="return confirm(`是否要刪除編號為 <?= $r['ques_id'] ?> 的資料?`)">
          -->
                <a href="javascript: deleteOne(<?= $r['ques_id'] ?>)">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </td>
              <td><?= $r['ques_id'] ?></td>
              <td><?= $r['ques_con'] ?></td>
              <td><?= $r['opt1'] ?></td>
              <td><?= $r['opt2'] ?></td>
              <td><?= $r['opt3'] ?></td>
              <td><?= $r['opt4'] ?></td>
              <td><?= $r['opt5'] ?></td>

              <td>
                <a href="edit.php?ques_id=<?= $r['ques_id'] ?>">
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

<?php include __DIR__ . "/parts/scripts.php"; ?>
<script>
  const data = <?= json_encode($rows)  ?>;
  const deleteOne = (ques_id) => {
    if (confirm(`是否要刪除編號為 ${ques_id} 的資料??`)) {
      location.href = `del.php?ques_id=${ques_id}`;
    }
  };
</script>

<?php include __DIR__ . "/parts/html-foot.php"; ?>