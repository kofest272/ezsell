<?php
    $changeEmail = filter_var(trim($_POST['changeEmail']),
    FILTER_SANITIZE_STRING);
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');
    $username = $_COOKIE['user'];
    $result = $mysql->query("SELECT * FROM `users` WHERE `username` = '$username'");
    $user = $result->fetch_assoc();

    if ($user == 0) {
        echo 'Такой почты не зарегистрировано';
        debug_to_console($result);
        exit();
    }
    $mysql->query("UPDATE `users` SET `email` = '$changeEmail' WHERE `username` = '$username'");
    $mysql->close();
    header('Location: /');
?>