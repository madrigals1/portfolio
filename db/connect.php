<?php
    # Get credentials from environment variables
    $host = getenv("DB_HOST");
    $user = getenv("DB_USER");
    $password = getenv("DB_PASSWORD");
    $dbname = getenv("DB_NAME");

    $con = mysqli_connect($host, $user, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
?>