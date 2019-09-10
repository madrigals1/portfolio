<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin");
    }
    require('connect.php');

    $name = $_POST['name'];
    $period = $_POST['period'];
    $description = $_POST['description'];
    $queue = $_POST['queue'];

    $target_dir = "../img/works/";

    $temp = explode(".", $_FILES["picture"]["name"]);
    $filename = round(microtime(true)) . '-work.' . end($temp);
    $target_file  = $target_dir . $filename;
    
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        $file_uploaded = true;
    } else {
        header("Location: /log/helper.php?error=picture_upload_error");
    }
    
    $result_work = mysqli_query($con,"
        INSERT into `works` 
        (
            `name`, 
            `period`,
            `description`,
            `queue`,
            `picture`
        )
        VALUES 
        (
            '$name',
            '$period',
            '$description',
            '$queue',
            '$filename'
        );"
    );
    

    if($result_work){
        header("Location: /works.php");
    } else {
        header("Location: /log/helper.php?error=work_add_error");
    }
?>