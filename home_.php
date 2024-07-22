
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>project02首頁</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=ZCOOL+KuaiLe&display=swap" rel="stylesheet">
  <style>
       body, html {
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    body {
       background: url('https://images.unsplash.com/photo-1556782274-d247b2a5ea85?q=80&w=2370&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
       background-size: cover;
    }
    .slogan {
      font-size: 3em;
      font-weight: 500;
      font-family: "ZCOOL KuaiLe", sans-serif;
      color: black;
      text-align: center;
      animation: bounce 2s infinite alternate;
    }
    /* 定義動畫效果 */
    @keyframes bounce {
      from {
        transform: translateY(0);
      }
      to {
        transform: translateY(-20px);
      }
    }
    .sidebar {
      position: fixed;
      top: 0;
      left: -250px;
      width: 250px;
      height: 100%;
      background-color: #343a40;
      transition: all 0.3s;
      z-index: 2;
    }
    .sidebar-content {
      padding: 20px;
      color: #fff;
    }
    .sidebar-content ul {
      list-style-type: none;
      padding: 0;
    }
    .sidebar-content ul li {
      padding: 8px 0;
    }
    .sidebar-content ul li a {
      color: #adb5bd;
      text-decoration: none;
    }
    .sidebar-content ul li a:hover {
      color: #fff;
    }   .sidebar.active {
      left: 0;
    }
    .top-left-btn{
      position: fixed;
      top: 20px;
      left: 20px;
      z-index: 1
    }
  </style>
</head>
<body>
 <div class="sidebar" id="sidebar">
    <div class="sidebar-content">
      <h2>資料庫表格控制</h2>
      <ul>
        <li><a href="./database/login.php">會員表格</a></li>
        <li><a href="./yirou/index_.php">測驗表格</a></li>
        <li><a href="./taisheng/index_.php">遊戲表格</a></li>
        <li><a href="./project02-test/index_.php">文章表格</a></li>
        <li><a href="./Midterm-main/index_.php">商城表格</a></li>
      </ul>
    </div>
  </div>
  <div class="content">

    <button class="btn btn-dark top-left-btn" id="siderjump">管理列表</button>
  </div>
  <div class="container">
    <div class="row">
      <div class="col">
        <!-- 動畫文字 -->
        <div class="slogan">
        CRUD 你做了呀~~
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('siderjump').addEventListener('click', function() {
      document.querySelector('.sidebar').classList.toggle('active');
    });
    document.addEventListener('mousemove', function(event) {
      var sidebar = document.getElementById('sidebar');
      var sidebarRect = sidebar.getBoundingClientRect();
      var sidebarLeft = sidebarRect.left;
      var sidebarWidth = sidebarRect.width;
      var mouseX = event.pageX;
      if (mouseX < sidebarLeft || mouseX > (sidebarLeft + sidebarWidth)) {
        sidebar.classList.remove('active');
      }
    });
  </script>
</body>
</html>
