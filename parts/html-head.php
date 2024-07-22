<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後臺管理系統</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
      .table td {
    word-wrap: break-word;
    max-width: 150px; 
}

/* 首頁背景 */

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
      position: flex;
      top: 20px;
      left: 20px;
      z-index: 1
    }
  </style>
</head>

<body>

