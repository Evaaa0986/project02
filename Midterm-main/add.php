<?php
require __DIR__ . '/parts/admin-required.php';

$title = "新增商品";
$pageName = "pd_add";

require __DIR__ . '/db-connect.php';

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
          <h5 class="card-title">新增遊戲</h5>

          <form name="form1" onsubmit="sendData(event)" novalidate>
            <div class="mb-3">
              <label for="game_id" class="form-label">遊戲名稱</label>
              <input type="text" class="form-control" name="game_id" id="game_id" required>
              <div class="form-text"></div>
            </div>

            <div class="mb-3">
              <label for="game_des" class="form-label">遊戲簡介</label>
              <input type="text" class="form-control" name="game_des" id="game_des">
              <div class="form-text"></div>
            </div>

            <div class="mb-3">
              <label for="type" class="form-label">遊戲類型</label>
              <input type="text" class="form-control" name="type" id="type">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">價錢</label>
              <input type="text" class="form-control" name="price" id="price">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="stock" class="form-label">庫存</label>
              <input type="text" class="form-control" name="stock" id="stock">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="payment" class="form-label">付款狀態</label>
              <input type="text" class="form-control" name="payment" id="payment">
            </div>

            <button type="submit" class="btn btn-primary">送出</button>
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
  const modal = new bootstrap.Modal('#exampleModal');
  const modalBody = document.querySelector('#exampleModal .modal-body');



  const sendData = e => {
    e.preventDefault(); // 不要使用傳統的表單送出, 使用 AJAX
    // 重置錯誤訊息

    let isPass = true; // 表單有沒有通過檢查

    // TODO: 表單欄位的資料檢查
    // if (nameField.value.length < 2) {
    //   isPass = false;
    //   nameField.nextElementSibling.innerHTML = '請填寫正確的姓名';
    //   nameField.style.border = '1px solid red';
    // }
    // if (!validateEmail(emailField.value)) {
    //   isPass = false;
    //   emailField.nextElementSibling.innerHTML = '請填寫正確的 Email';
    //   emailField.style.border = '1px solid red';
    // }

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
            form1.reset();
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