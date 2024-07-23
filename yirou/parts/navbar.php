<?php
if (!isset($pageName)) {
  $pageName = "";
}

?>
<style>
  nav.navbar ul.navbar-nav a.nav-link.active {
    background-color: blue;
    color: white;
    font-weight: 900;
    border-radius: 6px;
  }
</style>

<div class="sidebar" id="sidebar">
    <div class="sidebar-content">
      <h2>資料庫表格控制</h2>
      <ul>
        <li><a href="./../database/login.php">會員表格</a></li>
        <li><a href="./../yirou/index_.php">測驗表格</a></li>
        <li><a href="./../taisheng/index_.php">遊戲表格</a></li>
        <li><a href="./../project02-test/index_.php">文章表格</a></li>
        <li><a href="./../Midterm-main/index_.php">商城表格</a></li>
      </ul>
    </div>
  </div>
  <div class="content"></div>

<div class="mx-auto" style="width:85%;">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <!-- 導航欄品牌圖標，點擊後返回登入頁面 -->
      <button class="btn btn-dark top-left-btn" id="siderjump" style="width: 100px;">管理列表</button>
    <div class="container-fluid">
      <!-- <a class="navbar-brand" href="index_.php">測驗</a> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'ab_list' ? 'active' : '' ?>" href="index_.php">問題列表</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'ab_add' ? 'active' : '' ?>" href="add.php">新增問題</a>
          </li>
        </ul>

        <ul class="navbar-nav mb-2 mb-lg-0">
          <?php if (isset($_SESSION["admin"])) : ?>
            <li class="nav-item">
              <a class="nav-link"><?= $_SESSION["admin"]['nickname'] ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">登出</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link <?= $pageName == 'login' ? 'active' : '' ?>" href="login.php">登入</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</div>