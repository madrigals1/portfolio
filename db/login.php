<?php
    session_start();
    require('connect.php');

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $result = mysqli_query($con, "SELECT `login`, `id` FROM `users` WHERE `login` = '$email' AND `password` = '$password';");
    $user = $result->fetch_array(MYSQLI_ASSOC);
    $id = $user['id'];

    if($result->num_rows == 1){
        $_SESSION['user_id'] = $id;
        header("Location: /admin");
    } else {
        header("Location: /log/helper.php?error=login_error");
    }
?>