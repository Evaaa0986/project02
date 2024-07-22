
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

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!-- 導航欄品牌圖標，點擊後返回登入頁面 -->
                <button class="btn btn-dark top-left-btn" id="siderjump">管理列表</button>
        <div class="container-fluid">
            <a class="navbar-brand" href="index_.php">文章管理
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index_.php">列表</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">新增</a>
                    </li>
                </ul>
                <form method="get" action="index_.php">
                    <input type="text" name="search" placeholder="輸入關鍵字">
                    <button>搜索</button>
                </form>
            </div>
        </div>
    </nav>
</div>