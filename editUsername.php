<?php
    $changeUsername = filter_var(trim($_POST['changeUsername']),
    FILTER_SANITIZE_STRING);
    $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');

    $username = $mysql->real_escape_string($_COOKIE['user']);
    $result = $mysql->query("SELECT * FROM `users` WHERE `username` = '$username'");
    $user = $result->fetch_assoc();
    
    $changeUsername = $mysql->real_escape_string($changeUsername);
    $currentUsername = $mysql->real_escape_string($_COOKIE['user']);
    $mysql->query("UPDATE `users` SET `username` = '$changeUsername' WHERE `username` = '$currentUsername'");
    $mysql->query("UPDATE `achives` SET `username` = '$changeUsername' WHERE `username` = '$currentUsername'");
    setcookie('user', $changeUsername, time() + 3600, "/");
    // function debug_to_console($data) {
    //     $output = $data;
    //     if (is_array($output))
    //         $output = implode(',', $output);
    
    //     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    // }
    // debug_to_console($user);
    $mysql->close();
    header('Location: /');
?>