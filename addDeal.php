<?php
    $title = filter_var(trim($_POST['title']),
    FILTER_SANITIZE_STRING);
    $link = filter_var(trim($_POST['link']),
    FILTER_SANITIZE_STRING);
    $cost = filter_var(trim($_POST['cost']),
    FILTER_SANITIZE_STRING);
    $social = filter_var(trim($_POST['social']),
    FILTER_SANITIZE_STRING);
    $category = filter_var(trim($_POST['category']),
    FILTER_SANITIZE_STRING);
    $description = $_POST['description'];
    $picture = $_FILES['picture']['name'];
    $picture_size = $_FILES['picture']['size'];
    $picture_tmp_name = $_FILES['picture']['tmp_name'];
    $picture_folder = 'pictures/'.$picture;
    $followers = filter_var(trim($_POST['followers']),
    FILTER_SANITIZE_STRING);
    $income = filter_var(trim($_POST['income']),
    FILTER_SANITIZE_STRING);
    $dateOfRegAccount = filter_var(trim($_POST['dateOfRegAccount']),
    FILTER_SANITIZE_STRING);
    if(mb_strlen($title) < 5 || mb_strlen($title) > 90) {
        echo "Недопустимая длина названия (От 5 до 90 символов";
        exit();
    } else if(mb_strlen($link) < 10 || mb_strlen($link) > 100) {
        echo "Недопустимая длина ссылки (От 10 до 100 символов)";
        exit();
    } else if($cost < 0.1) {
        echo "Недопустимая стоимость (От 0.1 до 100000)";
        exit();
    } else if($picture_size > 2000000){
        echo "Изображение слишком большое (>2MB)";
        exit();
    } else if($income < 0.1) {
        echo "Недопустимый доход (От 0.1 до 10000)";
        exit();
    }
    $username = $_COOKIE['user'];
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');
    debug_to_console($username);
    $resultMax = $mysql->query("SELECT MAX(`id`) AS maxId FROM `marketTiktok`");
    $maxIdArray = $resultMax->fetch_assoc();
    $maxId = intval($maxIdArray['maxId']);

    $data = array();
    $countOfDeals = 0;
    for ($minId = 40; $minId <= $maxId; $minId++) {
        $result = $mysql->query("SELECT id FROM `marketTiktok` WHERE `creatorUsername` = '$username' AND `id` = '$minId'");
        $user = $result->fetch_assoc();
        if (is_array($user)) {
            $countOfDeals++;
        }
        $data[$minId] = $user;
    }
    if ($countOfDeals > 5) {
        echo "У вас больше 5 активных слотов. Чтобы иметь 100 слотов купите премиум</a>";
        exit();
    }
    $sqlDeal = $mysql->query("INSERT INTO `marketTiktok` (`creatorUsername`, `title`, `picture`, `link`, `cost`, `category`, `social`, `description`, `followers`, `income`, `dateOfRegAccount`)
    VALUES('$username', '$title', '$picture', '$link', '$cost', '$category', '$social', '$description', '$followers', '$income', '$dateOfRegAccount')") or die('Ошибка. Попробуйте еще раз либо обратитесь в тех.поддержку');
    if($sqlDeal){
        move_uploaded_file($picture_tmp_name, $picture_folder);
     }
    $mysql->close();
    header('Location: /')
?>