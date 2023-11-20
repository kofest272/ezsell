<?php
        function debug_to_console($data) {
            $output = $data;
            if (is_array($output))
                $output = implode(',', $output);
            echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
        }
        $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');
        $resultMax = $mysql->query("SELECT MAX(`id`) FROM `marketTiktok`");
        $maxIdArray = $resultMax->fetch_assoc();
        $sa = $maxIdArray['MAX(`id`)'];
        $maxId = intval($sa);
        for ($minId = 40; $minId <= $maxId; $minId++) {
            $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');
            $result = $mysql->query("SELECT * FROM `marketTiktok` WHERE `id` = '$minId'");
            $user = $result->fetch_assoc();
            $jsoner = json_encode($user);
            $array[$minId] = $jsoner;
        }
        debug_to_console($array);
        $mysql->close();
?>