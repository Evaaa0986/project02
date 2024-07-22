<?php
require __DIR__ . '/parts/admin-required.php';
require __DIR__ . '/db-connect.php';

$ques_id = isset($_GET['ques_id']) ? intval($_GET['ques_id']) : 0;
if (empty($ques_id)) {
  header('Location: index_.php');
  exit;
}

// 查詢指定問題的資料
$sql = "SELECT * FROM quiz WHERE ques_id=$ques_id";

$r = $pdo->query($sql)->fetch();
if (empty($r)) {
  header('Location: index_.php');
  exit;
}

?>
<?php include __DIR__ . "../../parts/html-head.php"; ?>
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
          <h5 class="card-title">編輯問題</h5>

          <form name="form1" onsubmit="sendData(event)" novalidate>
            <input type="hidden" name="ques_id" value="<?= $r['ques_id'] ?>">
            <div class="mb-3">
              <label for="ques_con" class="form-label">問題</label>
              <textarea class="form-control" name="ques_con" id="ques_con" required><?= htmlentities($r['ques_con']) ?></textarea>
              <div class="form-text"></div>
            </div>

            <div class="mb-3">
              <label for="opt1" class="form-label">選項1</label>
              <textarea class="form-control" name="opt1" id="opt1"><?= htmlentities($r['opt1']) ?></textarea>
              <div class="form-text"></div>
            </div>

            <div class="mb-3">
              <label for="opt2" class="form-label">選項2</label>
              <input type="text" class="form-control" name="opt2" value="<?= htmlentities($r['opt2']) ?>" id="opt2">
              <div class="form-text"></div>
            </div>

            <div class="mb-3">
              <label for="opt3" class="form-label">選項3</label>
              <input type="text" class="form-control" name="opt3" value="<?= htmlentities($r['opt3']) ?>" id="opt3">
              <div class="form-text"></div>
            </div>

            <div class="mb-3">
              <label for="opt4" class="form-label">選項4</label>
              <input type="text" class="form-control" name="opt4" value="<?= htmlentities($r['opt4']) ?>" id="opt4">
              <div class="form-text"></div>
            </div>

            <div class="mb-3">
              <label for="opt5" class="form-label">選項5</label>
              <input type="text" class="form-control" name="opt5" value="<?= htmlentities($r['opt5']) ?>" id="opt5">
              <div class="form-text"></div>
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
  const quesField = document.form1.ques_con;
  const opt1Field = document.form1.opt1;
  const opt2Field = document.form1.opt2;
  const opt3Field = document.form1.opt3;
  const opt4Field = document.form1.opt4;
  const opt5Field = document.form1.opt5;
  const modal = new bootstrap.Modal('#exampleModal');
  const modalBody = document.querySelector('#exampleModal .modal-body');


  const sendData = e => {
    e.preventDefault(); // 不要使用傳統的表單送出, 使用 AJAX
    // 重置錯誤訊息
    quesField.nextElementSibling.innerHTML = '';
    quesField.style.border = '1px solid #CCC';
    opt1Field.nextElementSibling.innerHTML = '';
    opt1Field.style.border = '1px solid #CCC';
    opt2Field.nextElementSibling.innerHTML = '';
    opt2Field.style.border = '1px solid #CCC';
    opt3Field.nextElementSibling.innerHTML = '';
    opt3Field.style.border = '1px solid #CCC';
    opt4Field.nextElementSibling.innerHTML = '';
    opt4Field.style.border = '1px solid #CCC';
    opt5Field.nextElementSibling.innerHTML = '';
    opt5Field.style.border = '1px solid #CCC';

    let isPass = true; // 表單有沒有通過檢查

    // TODO: 表單欄位的資料檢查
    if (quesField.value.length < 2) {
      isPass = false;
      quesField.nextElementSibling.innerHTML = '請填寫正確的問題';
      quesField.style.border = '1px solid red';
    }
    // 其他欄位檢查，這裡假設使用者必須填寫完整

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