<?php
    $changePasswordOld = filter_var(trim($_POST['changePasswordOld']),
    FILTER_SANITIZE_STRING);
    $changePasswordNew = filter_var(trim($_POST['changePasswordNew']),
    FILTER_SANITIZE_STRING);
    $changePasswordConfirm = filter_var(trim($_POST['changePasswordConfirm']),
    FILTER_SANITIZE_STRING);
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    if ($changePasswordNew != $changePasswordConfirm) {
        echo 'Пароли не совпадают';
        exit();
    }
    $hashPass = md5($changePasswordOld."xtunedcash272");
    $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');

    $result = $mysql->query("SELECT * FROM `users` WHERE `pass` = '$hashPass'");
    $user = $result->fetch_assoc();
    if ($user == 0) {
        echo 'Неправильный пароль';
        debug_to_console($result);
        exit();
    }
    $hashNewPass = md5($changePasswordNew."xtunedcash272");
    $mysql->query("UPDATE `users` SET `pass` = '$hashNewPass' WHERE `pass` = '$hashPass'");
    $mysql->close();
    header('Location: /');
?>