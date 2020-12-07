<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin");
    }
    require('connect.php');
    require_once('resizeImageClass.php');
    
    $id = $_GET['id'];

    $folder = "/portfolio/img/works";
    $target_dir = getenv("STATIC_FILE_HOSTING") + $folder;
    $url = getenv("STATIC_FILE_HOSTING_URL") + $folder;

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

    $result = mysqli_query($con, "
        UPDATE `works`
        SET `picture` = '$url_file'
        WHERE `id` = '$id'
    ;");
    
    if($result){
        header("Location: /work.php?id=".$id);
    } else {
        header("Location: /log/helper.php?error=picture_upload_error");
    }
?>

