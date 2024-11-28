<?php
session_start();
include_once ("database.php");

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM companies WHERE username='$username' AND password=MD5('$password')";

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
} else {
    header("Location: login.php?msg=failed");
}
