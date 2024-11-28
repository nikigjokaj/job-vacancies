<?php
require_once ("header.php");
?>

<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">

<style>

</style>
<div class="container" style="max-width: 500px; width: 100%">
    <br />

    <div class="card">
        <div class="card-body">
            <p style="font-size: xx-large;">Login</p>
            <?php
            if (isset($_GET["msg"]) && $_GET["msg"] == 'register-success') {
                echo "<div class=\"alert alert-success\" role=\"alert\" style=\"width: 100%\">
                          <h4 class=\"alert-heading\">Well done! Registration Completed!</h4>
                          <p>You have successfully registered to our Job Vacancies. This will allow you to login and start finding jobs that suit you.</p>
                          <hr>
                          <p class=\"mb-0\">Please login with the credentials you used to register!</p>
                      </div>";
            }
            ?>
            <form method="post" action="authenticate.php" style="width: 100%">
                <div class="form-group">
                    <h1></h1>
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <br />
                <button type="submit" class="btn btn-secondary">Login</button>
            </form>
            <br />
            <p>Don't have an account? <a href="register.php">Sign up here!</a></p>
        </div>
    </div>
</div>
<br/>
<br/>
<div class="sticky-bottom">
    <?php
    require_once ("footer.php");
    ?>
</div>
</body>
</html>
