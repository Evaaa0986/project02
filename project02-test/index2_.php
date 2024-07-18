<?php
print_r($_GET);

$title = "文章列表";
require __DIR__ . "/connect.php";
$perPage = 20;#每頁筆數
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header("Location: ?page=1");
    exit;
}
$t_sql = "SELECT COUNT(1) totalRows FROM article";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];#總筆數
$totalPage = 0;
$rows = [];
if ($totalRows) {
    $totalPage = ceil($totalRows / $perPage);#總頁數
    if ($page > $totalPage) {
        header("Location: ?page=" . $totalPage);
        exit;
    }

    $sql = sprintf(
        "SELECT * FROM article WHERE ORDER BY article_id DESC LIMIT %s, %s",
        ($page - 1) * $perPage,
        $perPage
    );
    $rows = $pdo->query($sql)->fetchAll();
}

?>

<?php include __DIR__ . "/parts/html-head.php"; ?>
<?php include __DIR__ . "/parts/navbar.php"; ?>
<style>
    td {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
<div class="container">
    <div class="col">
        <table class="table" style="table-layout:fixed">
            <thead>
                <tr>
                    <th><i class="fa-solid fa-trash"></i></th>
                    <th>文章序號</th>
                    <th>會員id</th>
                    <th>文章分類</th>
                    <th>遊戲id</th>
                    <th>最後修改時間</th>
                    <th>文章標題</th>
                    <th>文章內容</th>
                    <th><i class="fa-regular fa-pen-to-square"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $r): ?>
                    <tr>
                        <td>
                            <a href="javascript: deleteOne(<?= $r['article_id'] ?>)">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                        <td><?= $r['article_id'] ?></td>
                        <td><?= $r['user_id'] ?></td>
                        <td><?= $r['article_class'] ?></td>
                        <td><?= $r['game_id'] ?></td>
                        <td><?= $r['times'] ?></td>
                        <td><?= $r['title'] ?></td>
                        <td><?= $r['content'] ?></td>
                        <td><a href="#">
                        <td><a href="edit.php?article_id=<?= $r['article_id'] ?>">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container ">
    <div class="row">
        <div class="col ">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php for ($i = $page - 5; $i <= $page + 5; $i++):
                        if ($i >= 1 && $i <= $totalPage):
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
</div>

<?php include __DIR__ . "/parts/scripts.php"; ?>
<script>
    const data = <?= json_encode($rows) ?>;
    const deleteOne = (article_id) => {
        if (confirm(`是否要刪除編號為 ${article_id} 的資料??`)) {
            location.href = `del.php?article_id=${article_id}`;
        }
    };
</script>

<?php include __DIR__ . "/parts/html-foot.php"; ?>