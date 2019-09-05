<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin/login.php");
    } else {
        header("Location: /projects.php");
    }
?>