<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "portfolio";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if (!$con) {
        die("Error in database : ".mysqli_error($con));  
    }
?>