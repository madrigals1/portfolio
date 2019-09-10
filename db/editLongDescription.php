<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin");
    }
    require('connect.php');

    $id = $_GET['id'];
    $long_desc = $_POST['long_desc'];
    
    $result_project = mysqli_query($con,"
        UPDATE `projects` SET
            `long_desc` = '$long_desc'
        WHERE `id` = '$id'
        ;"
    );

    if($result_project){
        header("Location: /project.php?id=".$id);
    } else {
        header("Location: /log/helper.php?error=project_edit_error");
    }
?>