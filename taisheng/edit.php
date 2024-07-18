<?php
require __DIR__ . '/parts/admin-required.php';
require __DIR__ . '/db-connect.php';

$game_id = isset($_GET['game_id']) ? intval($_GET['game_id']) : 0;
if (empty($game_id)) {
  header('Location: index_.php'); exit;
}
$sql = "SELECT * FROM game WHERE game_id=$game_id";


$r = $pdo->query($sql)->fetch();
if (empty($r)) {
  header('Location: index_.php'); exit;
}

# header('Content-Type: application/json'); # 告訴瀏覽器內容為 JSON
# echo json_encode($r);
?>
<?php include __DIR__ . "/parts/html-head.php"; ?>
<style>
  form .mb-3 .form-text {
    color: red;
  }
</style>
<?php include __DIR__ . "/parts/navbar.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">編輯遊戲</h5>
          <form name="form1" onsubmit="sendData(event)" novalidate>
          <input type="hidden" name="game_id" value="<?= $r['game_id'] ?>">
            <div class="mb-3">
              <label for="game_name" class="form-label">遊戲名稱</label>
              <input type="text" class="form-control" name="game_name" value="<?= htmlentities($r['game_name']) ?>" id="game_name" required>
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="game_des" class="form-label">遊戲簡介</label>
              <textarea class="form-control" name="game_des" value="<?= htmlentities($r['game_des']) ?>" id="game_des" rows="5"></textarea>
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="minperson" class="form-label">最少幾人</label>
              <input type="number" class="form-control" name="minperson" value="<?= $r['minperson'] ?>" id="minperson" min="2" max="15" step="1">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="maxperson" class="form-label">最多幾人</label>
              <input type="number" class="form-control" name="maxperson" value="<?= $r['maxperson'] ?>" id="maxperson" min="2" max="15" step="1">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="mintime" class="form-label">一局時長最少</label>
              <input type="number" class="form-control" name="mintime" id="mintime" min="0.5" max="5" step="0.5" value="<?= $r['mintime'] ?>">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="maxtime" class="form-label">一局時長最多</label>
              <input type="number" class="form-control" name="maxtime" id="maxtime" min="0.5" max="5" step="0.5" value="<?= $r['maxtime'] ?>">
              <div class="form-text"></div>
            </div>
        
            <div class="mb-3"><p>難易度</p>
            <input type="radio" name="level" value="1" id="level">
              <label for="level">入門</label>
              <input type="radio" name="level" value="2" id="leve2">
              <label for="level">簡單</label>
              <input type="radio" name="level" value="3" id="leve3">
              <label for="level">適中</label>
              <input type="radio" name="level" value="4" id="leve4">
              <label for="level">困難</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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

<?php include __DIR__ . "/parts/scripts.php"; ?>
<script>

  const modal = new bootstrap.Modal('#exampleModal');
  const modalBody = document.querySelector('#exampleModal .modal-body');


  const sendData = e => {
    e.preventDefault(); // 不要使用傳統的表單送出, 使用 AJAX
    // 重置錯誤訊息

    let isPass = true; // 表單有沒有通過檢查

    // TODO: 表單欄位的資料檢查

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
<?php include __DIR__ . "/parts/html-foot.php"; ?>