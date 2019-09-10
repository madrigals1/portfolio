<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin");
    }
    require('connect.php');

    $id = $_GET['id'];
    
    $result_work = mysqli_query($con,"
        DELETE FROM `works` 
        WHERE `id` = '$id'
        ;"
    );

    if($result_work){
        header("Location: /works.php");
    } else {
        header("Location: /log/helper.php?error=work_remove_error");
    }
?>