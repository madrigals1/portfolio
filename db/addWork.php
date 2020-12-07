<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin");
    }
    require('connect.php');
    require('../utils/imageResizer.php');
    require('../utils/functions.php');

    $name = $_POST['name'];
    $period = $_POST['period'];
    $description = $_POST['description'];
    $queue = $_POST['queue'];

    $folder = "/portfolio/img/works";
    $res = get_static_path($folder);
    $target_dir = $res[0];
    $url = $res[1];

    if($_FILES["picture"]["name"]) {
        $temp = explode(".", $_FILES["picture"]["name"]);
        $filename = round(microtime(true)) . '-work.' . end($temp);
        $target_file = $target_dir . $filename;
        $url_file = $url . $filename;

        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
            $file_uploaded = true;
            $resize = new ResizeImage($target_file);
            $resize->resizeTo(200, 200, "exact");
            $resize->saveImage($target_file);
        } else {
            header("Location: /log/helper.php?error=picture_upload_error");
        }
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
            '$url_file'
        );"
    );
    

    if($result_work){
        header("Location: /works.php");
    } else {
        header("Location: /log/helper.php?error=work_add_error");
    }
?>