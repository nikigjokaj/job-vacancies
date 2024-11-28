<?php
session_start();
include_once("database.php");

$admin_username = filter_var($_POST['admin_username'], FILTER_SANITIZE_STRING);
$admin_password = filter_var($_POST['admin_password'], FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM admins WHERE admin_username='$admin_username' AND admin_password='$admin_password'";

$result = $pdo->query($sql, PDO::FETCH_ASSOC);

if ($result->rowCount() > 0) {
    $row = $result->fetch();
    $_SESSION['admin_name'] = $row['admin_username'];
    $_SESSION['admin_currentpassword'] = $row['admin_password'];
    header("Location: admin-home.php");
} else {
    header("Location: admin-login.php?msg=failed");
}
