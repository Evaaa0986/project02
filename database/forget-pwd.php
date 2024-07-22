<?php
$pageName = "forger-pwd";
?>

<?php require("./api/db_connection.php"); ?>

<?php include __DIR__ . "../../parts/html-head.php"; ?>
<?php include __DIR__ . "../../parts/navbar.php"; ?>


<div class="card position-absolute top-50 start-50 translate-middle" style="width: 40rem;">

  <div class="card-body">
    <form>
      <h1>忘記密碼</h1>
      <div class="m-3">
        <label for="exampleInputEmail1" class="form-label">電子信箱</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

      </div>


      <button type="submit" class="btn btn-primary">提交</button>

    </form>
  </div>
</div>


<?php include __DIR__ . "../../parts/scripts.php"; ?>
<?php include __DIR__ . "../../parts/html-foot.php";
