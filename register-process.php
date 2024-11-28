<?php
require_once ("database.php");

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$company_name = filter_var($_POST['company_name'], FILTER_SANITIZE_STRING);
$city = filter_var($_POST['company_city'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

if (empty($username) || empty($company_name) || empty($city) || empty($password)) {
    header("Location: register.php?msg=failed");
}
else {
    $sql = "INSERT INTO companies (username, company_name, city, password) VALUES ('$username', '$company_name', '$city', MD5('$password'))";
    $pdo->exec($sql);

    header("Location: login.php?msg=register-success");
    die();
}
