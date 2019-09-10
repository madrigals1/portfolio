<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin");
    }
    unset($_SESSION["user_id"]);
    header("Location: /index.php");
?>