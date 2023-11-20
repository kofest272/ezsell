<?php
    $email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_STRING);

    $pass = md5($pass."xtunedcash272");

    $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');


    $result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `pass` = '$pass'");
    $user = $result->fetch_assoc();
    if(count($user) == 0) {
        echo "Такой пользователь не найден";
        exit();
    }

    setcookie('user', $user['username'], time() + (3600 * 6), "/");

    $mysql->close();

    header('Location: /');
?>