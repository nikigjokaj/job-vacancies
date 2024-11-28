<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <title>Job Vacancies</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


</head>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <a href='home.php' class="navbar-brand">JobVacancies</a>
        <ul class="navbar-nav">
            <li class="nav-item">
             <?php
                if (!isset($_SESSION['session_username'])) {
                echo "<a href='login.php' class='btn btn-secondary' role='button'>Login</a>
                <a href='register.php' class='btn btn-secondary' role='button'>Register</a>
                <a href='admin-login.php' class='btn btn-primary' role='button'>Admin Login</a>";
                }
                else {
                    echo "<a href='company-profile.php' class='btn btn-secondary' role='button'>My Profile</a>
                <a href='logout.php' class='btn btn-danger' role='button'>Logout</a>";
                }
                ?>
        </ul>
    </nav>
</header>
