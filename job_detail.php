<?php
session_start();
require_once ("header.php");
require_once ("database.php");
echo "<link rel='stylesheet' href='profile-picture.css'>";

echo "<div class='container'><p style='font-size: xx-large; text-align: center'>Job details</p></div>
<hr />
";

if (isset($_GET['id'])) {
    echo "<div class='container p-3 my-3 bg-dark text-white'
                    <div class='list-group'>";
    $jobid = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

    $task = "SELECT * FROM jobs WHERE job_id='$jobid'";
    $result = $pdo->query($task, PDO::FETCH_ASSOC);

    while ($row = $result->fetch()) {
        $job_name = $row['job_name'];
        $job_id = $row['job_id'];
        $job_category = $row['job_category'];
        $job_city = $row['job_city'];
        $company_job_id = $row['company_id'];
    }

    $querycompanies = "SELECT * FROM companies WHERE id='$company_job_id'";
    $resultcompanies = $pdo->query($querycompanies, PDO::FETCH_ASSOC);

    while ($row = $resultcompanies->fetch()) {
        $company_logo_url = $row['company_logo'];
        $username = $row['username'];
        $company_name = $row['company_name'];
    }

        echo "<a href='home.php' class='btn btn-secondary'>Back</a><hr />
          Job title: $job_name <br />
          Job category: $job_category <br />
          Job description: $job_city <hr />
          <img src='" . $company_logo_url . "'>
    ";

} else{


}

?>
