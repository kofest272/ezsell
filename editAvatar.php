<?php
    $changeAvatar = $_FILES['changeAvatar']['name'];
    $changeAvatar_size = $_FILES['changeAvatar']['size'];
    $changeAvatar_tmp_name = $_FILES['changeAvatar']['tmp_name'];
    $changeAvatar_folder = 'avatars/'.$changeAvatar;
    if($changeAvatar_size > 2000000){
        echo "Изображение слишком большое";
        exit();
    }
    
    $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');
    $username = $_COOKIE['user'];
    $result = $mysql->query("SELECT * FROM `users` WHERE `username` = '$username'");
    $user = $result->fetch_assoc();
    if ($mysql->connect_error) {
        die("Ошибка подключения: " . $mysql->connect_error);
    }
    
    if (!$result) {
        die("Ошибка запроса: " . $mysql->error);
    }
    if (is_array($user) == false) {
        echo 'Попробуйте еще раз';
        exit();
    }

    $image_update_query = $mysql->query("UPDATE `users` SET `avatar` = '$changeAvatar' WHERE `username` = '$username'");
         if($image_update_query){
            move_uploaded_file($changeAvatar_tmp_name, $changeAvatar_folder);
            setcookie('avatar', $changeAvatar, time() + 360000, "/");
         }
    $mysql->close();
    header('Location: /');
?>