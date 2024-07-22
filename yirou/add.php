<?php
require __DIR__ . '/parts/admin-required.php';

$title = "新增通訊錄";
$pageName = "ab_add";

require __DIR__ . '/db-connect.php';

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
          <h3 class="card-title mb-3">新增問題</h3>

          <form name="form1" onsubmit="sendData(event)" novalidate>
            <div class="mb-3">
              <label for="ques_con" class="form-label">問題</label>
              <textarea class="form-control" name="ques_con" id="ques_con" required></textarea>
              <div class="form-text"></div>
            </div>

            <div class="mb-3">
              <label for="opt1" class="form-label">選項1</label>
              <textarea class="form-control" name="opt1" id="opt1" rows="4"></textarea>
              <div class="form-text" rows="4"></div>
            </div>
            <div class="mb-3">
              <label for="opt2" class="form-label">選項2</label>
              <textarea class="form-control" name="opt2" id="opt2" rows="4"></textarea>
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="opt3" class="form-label">選項3</label>
              <textarea class="form-control" name="opt3" id="opt3" rows="4"></textarea>
            </div>
            <div class="mb-3">
              <label for="opt4" class="form-label">選項4</label>
              <textarea class="form-control" name="opt4" id="opt4" rows="4"></textarea>
            </div>
            <div class="mb-3">
              <label for="opt5" class="form-label">選項5</label>
              <textarea class="form-control" name="opt5" id="opt5" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">提交</button>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">新增結果</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-success" role="alert">
          新增成功
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
  const modal = new bootstrap.Modal('#exampleModal');
  const modalBody = document.querySelector('#exampleModal .modal-body');



  const sendData = e => {
    e.preventDefault(); // 不要使用傳統的表單送出, 使用 AJAX
    // 重置錯誤訊息
    quesField.nextElementSibling.innerHTML = '';
    quesField.style.border = '1px solid #CCC';

    let isPass = true; // 表單有沒有通過檢查

    // TODO: 表單欄位的資料檢查
    if (quesField.value.length < 2) {
      isPass = false;
      quesField.nextElementSibling.innerHTML = '請填寫完整的問題';
      quesField.style.border = '1px solid red';
    }


    if (isPass) {
      // FormData 的個體看成沒有外觀的表單
      const fd = new FormData(document.form1);

      fetch('add-api.php', {
          method: 'POST',
          body: fd, // enctype: multipart/form-data
        }).then(r => r.json())
        .then(result => {
          console.log(result);
          if (result.success) {
            modalBody.innerHTML = `
            <div class="alert alert-success" role="alert">
              新增成功
            </div>`;
            // alert('新增成功')
          } else {
            modalBody.innerHTML = `
            <div class="alert alert-danger" role="alert">
              沒有新增
            </div>`;
            // alert('沒有新增')
          }
          modal.show();
        })
        .catch(ex => console.log(ex))
    }
  };
</script>
<?php include __DIR__ . "../../parts/html-foot.php"; ?>