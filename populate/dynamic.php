<?php
    require('utils/functions.php');

    # Get JSON data
    $json_path = "/../data.json";
    $data = read_json($json_path);

    $dynamic = $data["dynamic"];
?>