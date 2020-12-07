<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin");
    }
    require('connect.php');
    
    $id = $_GET['id'];

    $folder = "/portfolio/img/projects";
    $target_dir = getenv("STATIC_FILE_HOSTING") + $folder;
    $url = getenv("STATIC_FILE_HOSTING_URL") + $folder;

    $temp = explode(".", $_FILES["big_pic"]["name"]);
    $filename = round(microtime(true)) . '-big.' . end($temp);
    $target_file = $target_dir . $filename;
    $url_file = $url . $filename;
    
    if (move_uploaded_file($_FILES["big_pic"]["tmp_name"], $target_file)) {
        $file_uploaded = true;
    } else {
        header("Location: /log/helper.php?error=picture_upload_error");
    }

    $result = mysqli_query($con, "
        UPDATE `projects`
        SET `big_pic` = '$url_file'
        WHERE `id` = '$id'
    ;");
    
    if($result){
        header("Location: /project.php?id=".$id);
    } else {
        header("Location: /log/helper.php?error=picture_upload_error");
    }
?>

