<?php
session_start();

require_once "database.php";

$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

$pdo->exec("DELETE FROM jobs WHERE job_id='$id'");

header("Location: company-profile.php");
