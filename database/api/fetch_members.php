<?php
include './api/db_connection.php';

// 分頁參數設置
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 20; // 每頁顯示數量
$offset = ($page - 1) * $perPage;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$searchTerm = '%' . $search . '%';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'user_name';
$order = isset($_GET['order']) && $_GET['order'] == 'desc' ? 'DESC' : 'ASC';

// 確保排序欄位是有效的列名，防止 SQL 注入
$validSortColumns = ['user_name', 'email', 'mobile', 'member_name', 'gender'];
if (!in_array($sort, $validSortColumns)) {
    $sort = 'user_id';
}

// 構建帶有分頁和搜尋的 SQL 查詢
$sql = "SELECT * FROM members WHERE user_name LIKE :search OR email LIKE :search ORDER BY $sort $order LIMIT :perPage OFFSET :offset";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':search', $searchTerm);
$stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$members = $stmt->fetchAll();

// 顯示會員資料
foreach ($members as $row) {
    echo "<tr>
            <td>{$row['user_id']}</td>
            <td title='{$row['user_name']}'>" . (strlen($row['user_name']) > 10 ? substr($row['user_name'], 0, 10) . '...' : $row['user_name']) . "</td>
            <td title='{$row['email']}'>" . (strlen($row['email']) > 10 ? substr($row['email'], 0, 10) . '...' : $row['email']) . "</td>
            <td title='{$row['password']}'>" . (strlen($row['password']) > 10 ? substr($row['password'], 0, 10) . '...' : $row['password']) . "</td>
            <td title='{$row['mobile']}'>" . (strlen($row['mobile']) > 10 ? substr($row['mobile'], 0, 10) . '...' : $row['mobile']) . "</td>
            <td title='{$row['member_name']}'>" . (strlen($row['member_name']) > 10 ? substr($row['member_name'], 0, 10) . '...' : $row['member_name']) . "</td>
            <td title='{$row['location']}'>" . (strlen($row['location']) > 10 ? substr($row['location'], 0, 10) . '...' : $row['location']) . "</td>
            <td><img src='./assets/{$row['avatar']}' width='50'></td>
            <td>{$row['birthday']}</td>
            <td>{$row['gender']}</td>
            <td>
                <a href='./members-edit.php?user_id={$row['user_id']}' class='btn btn-warning btn-sm'><i class='bi bi-pencil-square'></i></a>
                <a href='./api/members/members-del.php?user_id={$row['user_id']}' class='btn btn-danger btn-sm'><i class='bi bi-x-square'></i></a>
            </td>
          </tr>";
}

// 獲取總記錄數用於分頁計算
$totalStmt = $pdo->prepare("SELECT COUNT(*) FROM members WHERE user_name LIKE :search OR email LIKE :search");
$totalStmt->bindParam(':search', $searchTerm);
$totalStmt->execute();
$totalMembers = $totalStmt->fetchColumn();
$totalPages = ceil($totalMembers / $perPage);
