<?php
header('Content-Type: application/json');
require_once ("display_errors.php");
require_once("jobs.php");

$jobs = jobs::get_jobs();

echo json_encode($jobs);
