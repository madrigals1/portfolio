<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin");
    }
    require('connect.php');

    $id = $_GET['id'];
    $name = $_POST['name'];
    $period = $_POST['period'];
    $queue = $_POST['queue'];
    
    $result_work = mysqli_query($con,"
        UPDATE `works` SET
            `name` = '$name',
            `period` = '$period',
            `queue` = '$queue'
        WHERE `id` = '$id'
        ;"
    );

    if($result_work){
        header("Location: /work.php?id=".$id);
    } else {
        header("Location: /log/helper.php?error=work_edit_error");
    }
?>