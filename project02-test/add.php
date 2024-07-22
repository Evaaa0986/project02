<?php
$title = "新增文章";
require __DIR__ . "/connect.php";

?>

<?php include __DIR__ . "../../parts/html-head.php"; ?>
<?php include __DIR__ . "/parts/navbar.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-6 mx-auto">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-3">新增文章</h4>
          <form name="form1" onsubmit="sendData(event)" novalidate>
            <div class="mb-3">
              <label for="user_id" class="form-label">會員id</label>
              <input type="text" class="form-control" name="user_id" id="user_id" required>
              <div class="form-text"></div>
            </div>
            <div class="col-auto mb-3">
              <label for="article_class" class="form-label">文章類別</label>
              <select class="form-select" id="article_class" name="article_class">
                <option value="心得">心得</option>
                <option value="討論">討論</option>
                <option value="開箱">開箱</option>
              </select>
            </div>
            <div class="col-auto mb-3">
              <label for="game_id" class="form-label">遊戲</label>
              <select class="form-select" id="game_id" name="game_id">
                <option value="20001">阿瓦隆</option>
                <option value="20002">矮人礦坑</option>
                <option value="20003">病毒在跳舞</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="title" class="form-label">標題</label>
              <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">文章內容</label>
              <textarea class="form-control" name="content" id="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#exampleModal">送出</button>
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