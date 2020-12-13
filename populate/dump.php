<?php
    $secret_key = $_POST['secret_key'];

    if ($secret_key != getenv("SECRET_KEY")) {
        throw new Exception("Secret key is invalid");
    }

    require('../utils/functions.php');
    require('../db/connect.php');

    # Success message;
    $success_message = "</br><span style=\"color: green;\">Success</span></br>";

    # Get JSON data
    $json_path = "/../data.json";
    $data = read_json($json_path);

    $dump = $data["dump"];

    # Initial
    if (mysqli_query($con, $dump["initial"])) {
        echo "Initials added\n";
    }

    # Create Database and use
    $database_name = $dump["db_name"];

    $create_query = "CREATE DATABASE IF NOT EXISTS `$database_name` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
    if (mysqli_query($con, $create_query)) {
        echo $create_query.$success_message;
    }

    $use_query = "USE `$database_name`;";
    if (mysqli_query($con, $use_query)) {
        echo $use_query.$success_message;
    }

    # Create tables
    foreach ($dump["tables"] as $table_name => $table_data) {
        $fields = $table_data["fields"];
        $fields_array = [];

        foreach ($fields as $field_name => $field_data) {
            $type = $field_data["type"];
            $null = "NOT NULL";
            if($field_data["null"]) $null = "NULL";
            $fields_array[] = "`$field_name` $type $null";
        }

        $fields_string = join(", ", $fields_array);

        $ENGINE = $table_data["ENGINE"];
        $type = $table_data["type"];
        $CHARSET = $table_data["CHARSET"];

        $table_query = "CREATE TABLE IF NOT EXISTS `$table_name` ($fields_string) ENGINE=$ENGINE $type CHARSET=$CHARSET;";
        
        if (mysqli_query($con, $table_query)) {
            echo $table_query.$success_message;
        }
    }

    # Indexes
    foreach ($dump["indexes"] as &$index) {
        $table_name = $index["table_name"];
        $primary_key = $index["primary_key"];

        $index_query = "ALTER TABLE `$table_name` ADD PRIMARY KEY (`$primary_key`)";
        if (mysqli_query($con, $index_query)) {
            echo $index_query.$success_message;
        };
    }

    # Auto Increment
    foreach ($dump["auto_increment"] as &$ai) {
        $table_name = $ai["table_name"];
        $field_name = $ai["field_name"];
        $modification = $ai["modification"];

        $ai_query = "ALTER TABLE `$table_name` MODIFY `$field_name` $modification";
        if (mysqli_query($con, $ai_query)) {
            echo $ai_query.$success_message;
        };
    }

    # Population
    foreach ($dump["population"] as &$population) {
        $table_name = $population["table_name"];
        $values = $population["values"];
        $fields_array = [];
        $values_array = [];

        foreach ($values as $field_name => $value) {
            $fields_array[] = "`$field_name`";
            $values_array[] = "'$value'";
        }

        $fields_string = join(", ", $fields_array);
        $values_string = join(", ", $values_array);

        $values_query = "INSERT INTO `$table_name` ($fields_string) VALUES ($values_string);";
    
        if (mysqli_query($con, $values_query)) {
            echo $values_query.$success_message;
        }
    }

    mysqli_commit($con);
?>