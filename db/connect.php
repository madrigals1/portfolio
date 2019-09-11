<?php
    // $servername = "shareddb-q.hosting.stackcp.net";
    $servername = "localhost";
    $username = "admin_portfolio";
    $password = "R;R€R€:Hdo+O";
    $dbname = "portfolio-313137c4ba";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if (!$con) {
        die("Error in database : ".mysqli_error($con));  
    }
?>