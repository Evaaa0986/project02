<?php
include '../db_connection.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $sql = "DELETE FROM members WHERE user_id = :user_id";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([':user_id' => $user_id]);
        header('Location: ../../members.php');
    } catch (PDOException $ex) {
        echo 'Error: ' . $ex->getMessage();
    }
}
