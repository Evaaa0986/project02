<?php
require __DIR__ . '/parts/admin-required.php';
require __DIR__ . '/db-connect.php';

$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
if (empty($order_id)) {
  header('Location: index_.php');
  exit;
}
$sql = "SELECT * FROM product WHERE order_id=$order_id";


$r = $pdo->query($sql)->fetch();
if (empty($r)) {
  header('Location: index_.php');
  exit;
}

# header('Content-Type: application/json'); # 告訴瀏覽器內容為 JSON
# echo json_encode($r);
?>
<?php include __DIR__ . "../../parts/html-head.php"; ?>
<style>
  form .mb-3 .form-text {
    color: red;
  }
</style>
<?php include __DIR__ . "./parts/navbar.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-6">
      <div class="card">

        <div class="card-body">
          <h5 class="card-title">編輯商品</h5>

          <form name="form1" onsubmit="sendData(event)" novalidate>
            <input type="hidden" name="order_id" value="<?= $r['order_id'] ?>">
            <div class="mb-3">
              <label for="game_id" class="form-label">商品名稱</label>
              <input type="text" class="form-control" name="game_id" value="<?= htmlentities($r['game_id']) ?>" id="game_id" required>
              <div class="form-text"></div>
            </div>

            <div class="mb-3">
              <label for="game_des" class="form-label">遊戲簡介</label>
              <input type="text" class="form-control" name="game_des" value="<?= htmlentities($r['game_des']) ?>" id="game_des">
              <div class="form-text"></div>
            </div>

            <div class="mb-3">
              <label for="'type" class="form-label">遊戲類型</label>
              <input type="text" class="form-control" name="type" value="<?= $r['type'] ?>" id="type">
              <div class="form-text"></div>
            </div>

            <div class="mb-3">
              <label for="price" class="form-label">價錢</label>
              <input type="text" class="form-control" name="price" value="<?= $r['price'] ?>" id="price">
            </div>
            <div class="mb-3">
              <label for="stock" class="form-label">庫存</label>
              <input type="text" class="form-control" name="stock" value="<?= $r['stock'] ?>" id="stock">
            </div>
            <div class="mb-3">
              <label for="payment" class="form-label">付款狀態</label>
              <input type="text" class="form-control" name="payment" value="<?= $r['payment'] ?>" id="payment">
            </div>
            <button type="submit" class="btn btn-primary">修改</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">編輯結果</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-success" role="alert">
          編輯成功
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
        <a href="index_.php" class="btn btn-primary">到列表頁</a>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . "../../parts/scripts.php"; ?>
<script>
  const modal = new bootstrap.Modal('#exampleModal');
  const modalBody = document.querySelector('#exampleModal .modal-body');



  const sendData = e => {
    e.preventDefault(); // 不要使用傳統的表單送出, 使用 AJAX

    let isPass = true; // 表單有沒有通過檢查



    if (isPass) {
      // FormData 的個體看成沒有外觀的表單
      const fd = new FormData(document.form1);

      fetch('edit-api.php', {
          method: 'POST',
          body: fd, // enctype: multipart/form-data
        }).then(r => r.json())
        .then(result => {
          console.log(result);
          if (result.success) {
            modalBody.innerHTML = `
            <div class="alert alert-success" role="alert">
              編輯成功
            </div>`;
          } else {
            modalBody.innerHTML = `
            <div class="alert alert-danger" role="alert">
              沒有修改
            </div>`;
          }
          modal.show();
        })
        .catch(ex => console.log(ex))
    }
  };
</script>
<?php include __DIR__ . "../../parts/html-foot.php"; ?>