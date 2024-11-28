<?php
session_start();
if (!isset($_SESSION['session_username'])) {
    header('Location: login.php');
    die();
}
require_once ("profile-header.php");
require_once ("database.php");

$company_id = $_SESSION['session_id'];

echo "
<link rel='stylesheet' href='company-profile.css'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css' integrity='sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l' crossorigin='anonymous'>
<link rel='stylesheet' href='profile-picture.css'>
<div class='container'>
    <div class='main-body'>

        <div class='row gutters-sm'>
            <div class='col-md-4 mb-3'>
                <div class='card'>
                    <div class='card-body'>
        <form method='post' action='job-posting-process.php'>
        <div class='form-group'>
            <p style='font-size: xx-large'>Add Job</p>
            <hr />
            <label for='job_name'>Job name:</label>
            <input type='text' name='job_name' class='form-control' id='job_name' aria-describedby='job_name'>
        </div>
        <div class='form-group'>
            <label for='job_category'>Job Category:</label>
            <input type='text' name='job_category' class='form-control' id='job_category' aria-describedby='job_category'>
        </div>
        <div class='form-group'>
            <label for='job_city'>Job Description:</label>
            <textarea type='text' name='job_city' class='form-control' rows='2'id='job_city'></textarea>
        </div>
        
        <button type='submit' class='btn btn-secondary'>Submit</button>
        
        </form>
                    </div>
                </div>
            </div>
            <div class='col-md-8'>
                <div class='card mb-3'>
                    <div class='card-body'>
                        <div class='d-flex flex-column align-items-center text-center'>
                            <img src='" . $_SESSION['session_logo'] . "'>
                        </div>
                        <hr />
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Username</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                            <p>" . $_SESSION['session_username'] . "</p>

                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Company Name</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                            <p>" . $_SESSION['session_name'] . "</p>
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>City</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                             <p>" . $_SESSION['session_city'] . "</p>
                             <a href='edit-profile.php' class='btn btn-secondary' role='button'>Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                
        <hr />

                <div class='container p-3 my-3 bg-dark text-white'>
                    <p style='font-size: xx-large'>Current available jobs</p>
                    <hr />
                    ";
            $sqltask = "SELECT * FROM jobs WHERE company_id='$company_id'";
            $result = $pdo->query($sqltask, PDO::FETCH_ASSOC);

            while($row = $result->fetch()) {
                $job_name = $row['job_name'];
                $job_id = $row['job_id'];
                echo "<div class='list-group'>" . $row['job_name'] ." - " . $row['job_city'] .
                    "<a href='job_delete.php?id=$job_id' class='btn btn-danger' style='max-width: 10%'>DELETE</a></div><hr />";
            }
            echo "
                  
                   </div>


";

?>
