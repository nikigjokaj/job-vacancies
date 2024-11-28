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
    <div class='col-auto'>
      <label class='sr-only' for='inlineFormInputGroup'></label>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        </div>
        <input name='city' type='text' class='form-control' id='inlineFormInputGroup' placeholder='example: Tirana'>
      </div>
    </div>
    <div class='col-auto'>
      <label class='sr-only' for='inlineFormInputGroup'></label>
      <div class='input-group mb-2'>
        <div class='input-group-prepend'>
          <div class='input-group-text'> Job Category </div>
        </div>
        <input name='job' type='text' class='form-control' id='inlineFormInputGroup' placeholder='example: Programming'>
      </div>
    </div>
    <div class='col-auto'>
      <button type='submit' class='btn btn-secondary mb-2'>Search</button>
    </div>
  </div>
</form>
</div>
<hr />
";
if (isset($_GET['city']) || isset($_GET['job'])) {

}

else {
    echo "
    <div class='container'><p style='font-size: xx-large; text-align: center'>Available jobs</p></div>
    <div id='jobs-list' class='container p-3 my-3 bg-dark text-white'>
                   
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
                            txt += '<div style=\'text-align: center; margin-left: auto; margin-right: auto;\' class=\'list-group\'>' + row.job_name + ' - ' + row.job_city + '<a href=\'job_detail.php?id=' + row.job_id + '\' class=\'btn btn-secondary\' style=\'max-width: 10%; margin-left: auto; margin-right: auto;\'>Details</a></div><hr />';

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
