<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin");
    }
    require('connect.php');

    $id = $_GET['id'];
    $name = $_POST['name'];
    $alias = preg_replace('/[^\w]/', '', $_POST['alias']);
    $short_desc = $_POST['short_desc'];
    $is_visible = $_POST['is_visible'] == "Yes" ? 1 : 0;
    $date = $_POST['date'];
    $lnf = $_POST['lnf'];
    $play_link = $_POST['play_link'];
    $github_link = $_POST['github_link'];
    $visit_link = $_POST['visit_link'];
    
    $result_project = mysqli_query($con,"
        UPDATE `projects` SET
            `name` = '$name',
            `alias` = '$alias',
            `short_desc` = '$short_desc',
            `is_visible` = '$is_visible',
            `date` = '$date',
            `lnf` = '$lnf',
            `play_link` = '$play_link',
            `github_link` = '$github_link',
            `visit_link` = '$visit_link'
        WHERE `id` = '$id'
        ;"
    );

    if($result_project){
        header("Location: /project.php?id=".$id);
    } else {
        header("Location: /log/helper.php?error=project_edit_error");
    }
?>