<?php
// 確保 $pageName 已經被定義，如果沒有則設為空字符串
if (empty($pageName)) {
    $pageName = "";
}
?>

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
  <div class="content">

    
  </div>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <!-- 導航欄品牌圖標，點擊後返回登入頁面 -->
        <button class="btn btn-dark top-left-btn" id="siderjump">管理列表</button>
        
        <!-- 漢堡菜單按鈕，當螢幕變小時顯示 -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- 可折疊的導航欄內容 -->
        <div class="collapse navbar-collapse" id="navbarScroll">
            <!-- 導航項目列表 -->
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <!-- 會員資料鏈接，根據 $pageName 來設定是否為活動狀態 -->
                    <a class="nav-link <?= $pageName == 'members' ? 'active' : '' ?>" href="./members.php">會員資料</a>
                </li>
            </ul>
            
        </div>
    </div>
</nav>

