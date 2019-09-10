<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin");
    }
    require('connect.php');

    $name = $_POST['name'];
    $alias = preg_replace('/[^\w]/', '', $_POST['alias']);
    $short_desc = $_POST['short_desc'];
    $long_desc = $_POST['long_desc'];
    $date = $_POST['date'];
    $lnf = $_POST['lnf'];
    $play_link = $_POST['play_link'];
    $github_link = $_POST['github_link'];

    $target_dir = "../img/projects/";

    $temp_big = explode(".", $_FILES["big_pic"]["name"]);
    $filename_big = round(microtime(true)) . '-big.' . end($temp_big);
    $target_file_big  = $target_dir . $filename_big;

    $temp_small = explode(".", $_FILES["small_pic"]["name"]);
    $filename_small = round(microtime(true)) . '-small.' . end($temp_small);
    $target_file_small = $target_dir . $filename_small;

    if (move_uploaded_file($_FILES["big_pic"]["tmp_name"], $target_file_big) && move_uploaded_file($_FILES["small_pic"]["tmp_name"], $target_file_small)) {
        $file_uploaded = true;
        $target_file_small = resize_image($target_file_small, 400, 300);
    } else {
        header("Location: /log/helper.php?error=picture_upload_error");
    }
    
    $result_project = mysqli_query($con,"
        INSERT into `projects` 
        (
            `name`,
            `alias`, 
            `short_desc`,
            `long_desc`,
            `date`,
            `lnf`,
            `play_link`,
            `github_link`,
            `big_pic`,
            `small_pic`
        )
        VALUES 
        (
            '$name',
            '$alias',
            '$short_desc',
            '$long_desc',
            '$date',
            '$lnf',
            '$play_link',
            '$github_link',
            '$filename_big',
            '$filename_small'
        );"
    );
    

    if($result_project){
        header("Location: /projects.php");
    } else {
        header("Location: /log/helper.php?error=project_add_error");
    }

    function resize_image($file, $width, $height) {
        list($w, $h) = getimagesize($file);
        /* calculate new image size with ratio */
        $ratio = max($width/$w, $height/$h);
        $h = ceil($height / $ratio);
        $x = ($w - $width / $ratio) / 2;
        $w = ceil($width / $ratio);
        /* read binary data from image file */
        $imgString = file_get_contents($file);
        /* create image from string */
        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($width, $height);
        imagecopyresampled($tmp, $image,
        0, 0,
        $x, 0,
        $width, $height,
        $w, $h);
        imagepng($tmp, $file, 9);
        
        imagedestroy($image);
        imagedestroy($tmp);
        return $file;
        /* cleanup memory */
    }
?>