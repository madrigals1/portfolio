<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin");
    }
    require('connect.php');

    $id = $_GET['id'];
    
    $result_project = mysqli_query($con,"
        DELETE FROM `projects` 
        WHERE `id` = '$id'
        ;"
    );

    if($result_project){
        header("Location: /projects.php");
    } else {
        header("Location: /log/helper.php?error=project_remove_error");
    }
?>