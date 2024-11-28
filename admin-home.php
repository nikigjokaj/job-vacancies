<?php
session_start();
require_once ("profile-header.php");
require_once ("database.php");


$sqltask = "SELECT * FROM companies";
$result = $pdo->query($sqltask, PDO::FETCH_ASSOC);
echo "<br /><h2 style='text-align: center'>Admin Panel</h2>
    <hr />
<ul>";
while($row = $result->fetch()) {
    $username = $row['username'];
    $id = $row['id'];

    echo "<div style='border: darkgray; text-align: center'><li class='list-group-item'>" . $row['username'] . " - " .
        "<a href='admin_user_delete.php?id=$id' class='btn btn-danger' style='max-width: 10%'>DELETE</a></li><hr />";
}
    echo "
                 </div> 
                   </div>";

?>