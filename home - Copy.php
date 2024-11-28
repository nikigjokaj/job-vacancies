<?php
session_start();
require_once ("header.php");
require_once ("database.php");

echo "
<body onload='loadJobs()'>
<div class='container p-3 my-3 border'>
<hr />
    <h2>Search Job</h2><hr />
    <form method='get'>
    <h4>City:</h4>
    <input type='text' name='city'>
    <h4>Job:</h4>
    <input type='text' name='job'>
    <input type='submit' value='search'>
</form>
</div>
<hr />
";
if (isset($_GET['city']) || isset($_GET['job'])) {

}

else {
    echo "<div class='container p-3 my-3 bg-dark text-white'>
                   <div id='jobs-list' class='list-group'>
                    </div>
        </div>
    <script type='text/javascript'>
            function loadJobs() {
                var request = new XMLHttpRequest();
                request.open('GET', 'get_jobs.php');
                request.onreadystatechange = function() {
                    if(this.readyState === 4 && this.status === 200) {
                        let data = JSON.parse(this.responseText);
                        let txt = '';
                        let row;
                        for(let i = 0; i < data.length; i++) {
                            row = data[i];
                            txt += '<a href=\'job_detail.php?id=' + row.job_id + '\' class=\'list-group-item list-group-item-action\'>' + row.job_name + '</a>';

                        }
                        document.getElementById('jobs-list').innerHTML = txt;
                    }
                };

                request.send();
            }
            </script>";
}

echo "</div>
</div>
</body>


";

if (isset($_GET['city']) || isset($_GET['job'])) {
    echo "<div class='container p-3 my-3 bg-dark text-white'
                    <div class='list-group'>";
    $city = filter_var($_GET['city'], FILTER_SANITIZE_STRING);
    $job = filter_var($_GET['job'], FILTER_SANITIZE_STRING);

    $task = "SELECT * FROM jobs WHERE job_city='$city' OR job_category='$job'";
    $result = $pdo->query($task, PDO::FETCH_ASSOC);

    while ($row = $result->fetch()) {
        $job_name = $row['job_name'];
        $job_id = $row['job_id'];
        echo "<a href='job_detail.php?id=$job_id' class='list-group-item list-group-item-action'>" . $row['job_name'] . "</a>";
    }

    echo "</div>
</div>";

}
else{

}

?>
