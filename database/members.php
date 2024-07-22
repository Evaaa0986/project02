<?php
session_start();

// 檢查是否已登錄，否則重定向到登錄頁面
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$pageName = "members"; // 頁面名稱

include __DIR__ . "../../parts/html-head.php";
include __DIR__ . "../../parts/navbar.php";
?>

<div class="container mt-5">
    <h2 class="mb-4">會員資料</h2>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-plus-square"></i> 新增
    </button>

    <!-- 搜尋和篩選表單 -->
    <form action="" method="get" class="mb-3">
        <input type="text" name="search" placeholder="搜尋..." value="<?php echo isset($_GET['search']) ? ($_GET['search']) : ''; ?>">
        <select name="sort">
            <option value="user_id" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'user_id' ? 'selected' : ''; ?>>ID</option>
            <option value="user_name" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'user_name' ? 'selected' : ''; ?>>使用者名稱</option>
            <option value="email" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'email' ? 'selected' : ''; ?>>電子信箱</option>
            <option value="mobile" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'mobile' ? 'selected' : ''; ?>>電話號碼</option>
            <option value="member_name" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'member_name' ? 'selected' : ''; ?>>真實姓名</option>
            <option value="gender" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'gender' ? 'selected' : ''; ?>>性別</option>
        </select>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="order" value="desc" id="flexCheckDefault" <?php echo isset($_GET['order']) && $_GET['order'] == 'desc' ? 'checked' : ''; ?>>
            <label class="form-check-label" for="flexCheckDefault">
                從大到小排列
            </label>
        </div>
        <button type="submit" class="btn btn-info">篩選</button>
    </form>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>使用者名稱</th>
                <th>電子信箱</th>
                <th>密碼</th>
                <th>電話號碼</th>
                <th>真實姓名</th>
                <th>地址</th>
                <th>頭像</th>
                <th>生日</th>
                <th>性別</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php include './api/fetch_members.php'; ?>
        </tbody>
    </table>

    <!-- 分頁導航 -->
    <?php include './components/pagination.php'; ?>
</div>

<?php include './components/member_modal.php'; ?>
<script src="./js/member_form.js"></script>

<?php include __DIR__ . "../../parts/scripts.php"; ?>
<?php include __DIR__ . "../../parts/html-foot.php"; ?>