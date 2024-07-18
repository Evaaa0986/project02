<?php
// 確保 $pageName 已經被定義，如果沒有則設為空字符串
if (empty($pageName)) {
    $pageName = "";
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <!-- 導航欄品牌圖標，點擊後返回登入頁面 -->
        <a class="navbar-brand" href="./login.php"><i class="bi bi-house"></i></a>
        
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
            
            <!-- 搜索表單 -->
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
