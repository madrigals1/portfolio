<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin");
    }
    require('connect.php');

    $id = $_GET['id'];
    $name = $_POST['name'];
    $short_desc = $_POST['short_desc'];
    $date = $_POST['date'];
    $lnf = $_POST['lnf'];
    $play_link = $_POST['play_link'];
    $github_link = $_POST['github_link'];
    
    $result_project = mysqli_query($con,"
        UPDATE `projects` SET
            `name` = '$name',
            `short_desc` = '$short_desc',
            `date` = '$date',
            `lnf` = '$lnf',
            `play_link` = '$play_link',
            `github_link` = '$github_link'
        WHERE `id` = '$id'
        ;"
    );

    if($result_project){
        header("Location: /projects.php");
    } else {
        header("Location: /log/helper.php?error=project_edit_error");
    }
?>