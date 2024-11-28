<?php
include_once ("header.php");
include_once ("database.php");
?>

<div class="container" style="max-width: 500px; width: 100%">
    <div class="card">
        <br/>
        <p style="font-size: xx-large; text-align: center">Admin Login</p>
        <div class="card-body">
            <?php
            if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                echo "<div class=\"alert alert-danger\" role=\"alert\" style=\"width: 100%\">
                    Wrong Name or Password! Try Again!
                    </div>";
            }
            ?>
            <form method="post" action="authenticate-admin.php" style="width: 100%">
                <div class="form-group">
                    <label for="admin_username">Admin Name:</label>
                    <input type="text" name="admin_username" class="form-control" id="admin_username" aria-describedby="admin_username">
                </div>
                <div class="form-group">
                    <label for="admin_password">Admin Password:</label>
                    <input type="password" name="admin_password" class="form-control" id="admin_password">
                </div>
                <button type="submit" class="btn btn-secondary">Login</button>

            </form>
        </div>
    </div>
</div>
