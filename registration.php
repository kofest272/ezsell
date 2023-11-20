<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZSELL | Профиль</title>
    <link rel="stylesheet" href="css/stylereg.css">
</head>

<body>
    <div class="header">
        <a href="index.html" class="apage">
            <img src="img/logo.png" alt="" class="logo">
        </a>
        <div class="online">
            <div class="dot"></div>
            <h4 class="textOnline"><?=$_COOKIE['online']?></h4>
        </div>
        <div class="maina">
            <a href="">
                <div class="animdiv">
                    <img src="icons/cybershoke/shop-outline.svg" alt="" class="iconheader">
                    <h4 class="texticons">Shop</h4>
                </div>
            </a>
            <a href="create.php">
                <div class="animdiv">
                    <img src="icons/add.png" alt="" class="iconheaderPlus">
                    <h4 class="texticons">Create</h4>
                </div>
            </a>
            <a href="">
                <div class="animdiv">
                    <img src="icons/help.png" alt="" class="iconheader">
                    <h4 class="texticons">Help</h4>
                </div>
            </a>
            <a href="">
                <div class="animdiv">
                    <img src="icons/profile.png" alt="" class="iconheader">
                    <h4 class="texticons">Profile</h4>
                </div>
            </a>
        </div>
        <div class="languagediv">
            <div class="languagechooser">
                <div class="trackerCntry"><img src="icons/countries/republic-of-poland.svg" alt="" class="countries">
                </div>
                <div class="trackerCntry"><img src="icons/countries/russia.svg" alt="" class="countries"></div>
                <div class="trackerCntry"><img src="icons/countries/germany.svg" alt="" class="countries"></div>
                <div class="trackerCntry"><img src="icons/countries/en.svg" alt="" class="countries"></div>
            </div>
            <div class="languageactive">
                <!-- <a href="" class="tracker"> -->
                <img src="icons/countries/en.svg" alt="" class="countries_active">
                <!-- </a> -->
                <h4 class="texticons">language</h4>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="mainheader">
            <div class="marginleft"></div>
            <div class="socials">
                <img src="icons/cybershoke/social/discord.svg" alt="" class="iconsocial">
                <img src="icons/cybershoke/social/instagram.svg" alt="" class="iconsocial">
                <img src="icons/cybershoke/social/steam.svg" alt="" class="iconsocial">
                <img src="icons/cybershoke/social/telegram.svg" alt="" class="iconsocial">
                <img src="icons/cybershoke/social/youtube.svg" alt="" class="iconsocial">
            </div>
        </div>
        <div class="modebtns">
        </div>
        <div class="infoDiv">
            <?php
                if($_COOKIE['user'] == ''):
            ?>
            <form class="form" action="check.php" method="post" id="anim">
                <p class="title">Register </p>
                <p class="message">Signup now and get full access to our app. </p>
                    <label>
                        <input class="input" type="text" placeholder="" required="" name="username">
                        <span>Username</span>
                    </label>
                <div class="flex">
                    <label>
                        <input class="input" type="text" placeholder="" required="" name="firstname">
                        <span>Firstname</span>
                    </label>

                    <label>
                        <input class="input" type="text" placeholder="" required="" name="secondname">
                        <span>Lastname</span>
                    </label>
                </div>

                <label>
                    <input class="input" type="email" placeholder="" required="" name="email">
                    <span>Email</span>
                </label>

                <label>
                    <input class="input" type="password" placeholder="" required="" name="password">
                    <span>Password</span>
                </label>
                <label>
                    <input class="input" type="password" placeholder="" required="" name="confirmPassword">
                    <span>Confirm password</span>
                </label>
                <button class="submit" type="submit">Submit</button>
            </form>
            <form class="form" action="auth.php" method="post" id="anim">
                <p class="title">Login </p>
                <p class="message"> </p>
                <label>
                    <input class="input" type="email" placeholder="" required="" name="email">
                    <span>Email</span>
                </label>

                <label>
                    <input class="input" type="password" placeholder="" required="" name="password">
                    <span>Password</span>
                </label>
                <button class="submit" type="submit">Submit</button>
            </form>
            <?php else: ?>
                <?php
                $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');
                $username = $_COOKIE['user'];
                $result = $mysql->query("SELECT `avatar` FROM `users` WHERE `username` = '$username'");
                $user = $result->fetch_assoc();
                function debug_to_console($data) {
                    $output = $data;
                    if (is_array($output))
                        $output = implode(',', $output);
                
                    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
                }
                $inputAvatar = implode($user);
                setcookie('avatar', $inputAvatar, time() + 36000000, "/");

                $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');

                if ($mysql->connect_error) {
                    die("Ошибка подключения: " . $mysql->connect_error);
                }

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
                debug_to_console($username);
                debug_to_console($data[42]);
                debug_to_console($countOfDeals);


                $resultDate = $mysql->query("SELECT * FROM `users` WHERE `username` = '$username'");
                $userDate = $resultDate->fetch_assoc();
                $date = $userDate['datereg'];
                $sex = $userDate['sex'];
                $jsonDate = Json_encode($date);
                $rest = substr($jsonDate, 1, 11);
                $todayDate = (date("d.m.Y"));
                $minusDate = strtotime($rest);
                $finalDate = date('d.m.Y', $minusDate);
                $floorDate = ($todayDate - $finalDate) / (60 * 60 * 24);
                $yearsRegLvl = intdiv($floorDate, 365);
                $sqlReg = $mysql->query("UPDATE `achives` SET `yearsRegLvl` = '$yearsRegLvl' WHERE `username` = '$username'");
                $mysql->close();
                ?>
                <div class="profileDiv">
                    <div class="leftZone">
                        <div class="avatarZone">
                        <div class="avatar" style="background-image: url('../avatars/<?=$_COOKIE['avatar']?>')"></div>
                        <form action="edit.php">
                            <button class="writerBtn">
                            Редактировать
                            </button>
                        </form>
                    </div>
                    <div class="deposit">
                        <p class="textGray">Страховой депозит</p>
                        <div class="btns">
                            <button class="toBtn">
                            Пополнить
                        </button>
                        <button class="fromBtn">
                            Снять
                        </button>
                        </div>
                    </div>
                </div>
                    <div class="infoacc">
                        <div class="nameAndOnline">
                            <h2><?=$_COOKIE['user']?></h2>
                            <p class="onlineText">Не в сети</p>
                        </div>
                        <span class="hl"></span>
                        <div class="mainInfo">
                            <div class="regDate">
                                <?php
                                $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');
                                $result = $mysql->query("SELECT * FROM `users` WHERE `username` = '$username'");
                                $user = $result->fetch_assoc();
                                $date = $user['datereg'];
                                $mysql->close();
                                ?>
                                <p class="textGray">Регистрация:</p>
                                <p class="regDatetext"><?=$date?></p>
                            </div>
                            <div class="sex">
                                <p class="textGray">Пол:</p>
                                <p class="bornDatetext"><?=$sex?></p>
                            </div>
                            <div class="achives">
                            <?php
                                $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');
                                $resultDa = $mysql->query("SELECT * FROM `achives` WHERE `username` = '$username'");
                                $userDa = $resultDa->fetch_assoc();
                                $mysql->close();
                            ?>
                                <img src="img/achives/adminlvl<?=$userDa['adminLvl']?>.png" alt="" class="achive" id="active<?=$userDa['adminLvl']?>">
                                <img src="img/achives/regYears<?=$userDa['yearsRegLvl']?>.png" alt="" class="achive"">
                                <img src="img/achives/premium.png" alt="" class="achive" id="active<?=$userDa['premium']?>">
                            </div>
                        </div>
                        <span class="hl"></span>
                        <div class="statsProfile">
                            <div class="sells">
                                <p class="statText">0</p>
                                <p class="statsInfoText">Продаж</p>
                            </div>
                            <div class="buys">
                                <p class="statText">0</p>
                                <p class="statsInfoText">Покупок</p>
                            </div>
                            <div class="activeSells">
                                <p class="statText"><?=$countOfDeals?></p>
                                <p class="statsInfoText">Активных слотов</p>
                            </div>
                        </div>

                        <h4 class="exitText"><a href="exit.php">Выйти с аккаунта</a></h4>
                    </div>
                    <div class="upBar"></div>
                    
                </div>
            <?php endif;?>
        </div>
    </div>
    <script src="script.js"></script>
    <!-- <script src="reg.js"></script> -->
</body>

</html>