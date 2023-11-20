<?php 
    $radio = filter_var(trim($_POST['fav_language']),
    FILTER_SANITIZE_STRING);
    
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    debug_to_console($radio);

    $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');
    $username = ($_COOKIE['user']);
    $result = $mysql->query("UPDATE `users` SET `sex` = '$radio' WHERE `username` = '$username'");
    $mysql->close();
    header('Location: /');
?>