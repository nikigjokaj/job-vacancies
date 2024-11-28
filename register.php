<?php
require_once ("header.php");
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<hr />
<div class="container" style="max-width: 30%">
    <div class="container" style="margin: auto; border: 2px solid darkgrey;">
        <div class="container"  class="border border-secondary" style="border-radius: 25px;">
            <div class="container">
            <p style="font-size: xx-large">Sign Up</p>
            </div>
            <form method="post" action="register-process.php">
                <div class="form-group">

                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="username">
                </div>
                <div class="form-group">
                    <label for="company_name">Company Name:</label>
                    <input type="text" name="company_name" class="form-control" id="company_name">
                </div>
                <div class="form-group">
                    <label for="">City:</label>
                    <input type="text" name="company_city" class="form-control" id="company_city">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-secondary">Register</button>
                <br>
                <br>
                <p>Already have an account? <a href="login.php"> Login here!</a></p>
            </form>

        </div>
        <br/>
    </div>
    <div class="sticky-bottom">
        <?php
        require_once ("footer.php");
        ?>
    </div>
    </div>
    </html>
