<?php
    $username = filter_var(trim($_POST['username']),
    FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_STRING);
    $firstname = filter_var(trim($_POST['firstname']),
    FILTER_SANITIZE_STRING);
    $secondname = filter_var(trim($_POST['secondname']),
    FILTER_SANITIZE_STRING);
    if(mb_strlen($pass) < 5 || mb_strlen($pass) > 90) {
        echo "Недопустимая длина пароля (От 5 до 90 символов";
        exit();
    } else if(mb_strlen($firstname) < 2 || mb_strlen($firstname) > 20) {
        echo "Недопустимая длина имени (От 2 до 20 символов)";
        exit();
    } else if(mb_strlen($secondname) < 2 || mb_strlen($secondname) > 30) {
        echo "Недопустимая длина фамилии (От 2 до 30 символов)";
        exit();
    } else if(mb_strlen($username) < 3 || mb_strlen($username) > 15) {
        echo "Недопустимая длина Логина (От 3 до 15 символов)";
        exit();
    }

    $pass = md5($pass."xtunedcash272");
    $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');
    $resultEmail = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email'");
    $userEmail = $resultEmail->fetch_assoc();
    $resultUsername = $mysql->query("SELECT * FROM `users` WHERE `username` = '$username'");
    $userUsername = $resultUsername->fetch_assoc();
    if(is_array($userEmail)) {
        echo "Уже зарегана почта";
        exit();
    } else if(is_array($userUsername)) {
        echo "Уже зареганое Имя пользователя";
        exit();
    }
    $mysql->query("INSERT INTO `achives` (`username`, `adminLvl`, `yearsRegLvl`, `sellerLvl`)
    VALUES('$username', '0', '0', '0')");
    $mysql->query("INSERT INTO `users` (`username`, `email`, `pass`, `firstname`, `secondname`)
    VALUES('$username', '$email', '$pass', '$firstname', '$secondname')");
    $mysql->close();

    header('Location: /')
?>