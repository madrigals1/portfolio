<?php
    session_start();
    require('connect.php');
    
    $id = $_GET['id'];

    $target_dir = "../img/classes/";
    $temp = explode(".", $_FILES["image"]["name"]);
    $filename = round(microtime(true)) . '.' . end($temp);
    $target_file  = $target_dir . $filename;
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $file_uploaded = true;
    } else {
        header("Location: /log/helper.php?error=class_image_upload_error");
    }

    $result_class_images = mysqli_query($con, "
        SELECT COUNT(id) FROM `class_images` WHERE `class_id` = '$id'
    ;");

    echo mysqli_error($con);

    if($result_class_images){
        $class_images = $result_class_images->fetch_array(MYSQLI_NUM);
        $image_count = $class_images[0];
        $image_count++;
    } else {
        $image_count = 0;
    }

    $result = mysqli_query($con, "
        INSERT INTO `class_images`
        (
            `class_id`,
            `image`
        )
        VALUES
        (
            '$id',
            '$filename'
        )
    ;");

    echo mysqli_error($con);

    $result_class = mysqli_query($con, "
        UPDATE `classes` SET `image_count` = '$image_count' WHERE `id` = '$id'
    ;");

    echo mysqli_error($con);
    
    if($file_uploaded && $result && $result_class){
        header("Location: /classes/class.php?id=".$id);
    } else {
        header("Location: /log/helper.php?error=class_image_upload_error");
    }
?>

