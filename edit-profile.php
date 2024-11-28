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
                        <div class='d-flex flex-column align-items-center text-center'>
                            <img src='" . $_SESSION['session_logo'] . "'><hr />
                            <form action='upload.php' method='post' enctype='multipart/form-data'>
                                <input type='file' name='new_image'><hr />
                                <input class='btn btn-secondary' type='submit' value='Upload & Update Company Logo'>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class='col-md-8'>
                <div class='card mb-3'>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Username</h6>
                            </div>
                            <form method='get' action='update-profile.php'>
                            <div class='col-sm-9 text-secondary'>
                            <input name ='new-username' id='new-username' class='form-control' type='text' value='" . $_SESSION['session_username'] ." '>


                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>Company Name</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                             <input name='new-name' id='new-name' class='form-control' type='text' value='" . $_SESSION['session_name'] ." '>
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-sm-3'>
                                <h6 class='mb-0'>City</h6>
                            </div>
                            <div class='col-sm-9 text-secondary'>
                              <input name='new-city' id='new-city' class='form-control' type='text' value='" . $_SESSION['session_city'] ." '>
                            </div>
                        </div>
                        <hr />
                        <button type='submit' class='btn btn-secondary'>Update Profile Info</button>
                        <a href='company-profile.php' class='btn btn-primary'>Back to Profile</a>
                        <hr />
                        </form>
                    </div>
                </div>
                </div>"
?>
