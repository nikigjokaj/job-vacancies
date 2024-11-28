<?php
session_start();
require_once "database.php";
$user_id = $_SESSION['user_id'];
$new_username = filter_var($_GET['new-username'], FILTER_SANITIZE_STRING);
$new_name = filter_var($_GET['new-name'], FILTER_SANITIZE_STRING);
$city = filter_var($_GET['city'], FILTER_SANITIZE_STRING);
$comp = $_SESSION['user_name'];

$pdo->exec("UPDATE companies SET username='$new_username', city='$city', company_name='$new_name' WHERE id='$user_id'");

$sql = "SELECT * FROM companies WHERE id='$user_id'";

$result = $pdo->query($sql, PDO::FETCH_ASSOC);

if ($result->rowCount() > 0) {
    $row = $result->fetch();
    $_SESSION['session_id'] = $row['id'];
    $_SESSION['session_username'] = $row['username'];
    $_SESSION['session_city'] = $row['city'];
    $_SESSION['session_name'] = $row['company_name'];
    $_SESSION['session_password'] = $row['password'];
    $_SESSION['session_logo'] = $row['company_logo'];

    header("Location: company-profile.php");
}
