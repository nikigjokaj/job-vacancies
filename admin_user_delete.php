<?php
session_start();
$user_id = $_SESSION['user_id'];

require_once "database.php";

$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

$pdo->exec("DELETE FROM companies WHERE id='$id'");

header("Location: admin-home.php");
