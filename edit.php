<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZSELL | Редактирование профиля</title>
    <link rel="stylesheet" href="css/styleedit.css">
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
                <div class="editContainer">
                        <form action="editUsername.php" class="formChange" method="post">
                            <label>
                                <input class="input" type="text" placeholder="" required="" name="changeUsername">
                                <span>Change username</span>
                            </label>
                            <input class="submitChange" type="submit" value="Сохранить">
                            <span class="hl"></span>
                        </form>
                        <form action="editPass.php" class="formChange" method="post">
                            <label>
                                <input class="input" type="password" placeholder="" required="" name="changePasswordOld">
                                <span>Old password</span>
                            </label>
                            <label>
                                <input class="input" type="password" placeholder="" required="" name="changePasswordNew">
                                <span>New password</span>
                            </label>
                            <label>
                                <input class="input" type="password" placeholder="" required="" name="changePasswordConfirm">
                                <span>Confirm new password</span>
                            </label>
                            <input class="submitChange" type="submit" value="Сохранить">
                            <span class="hl"></span>
                        </form>
                        <form action="editEmail.php" class="formChange" method="post">
                            <label>
                                <input class="input" type="email" placeholder="" required="" name="changeEmail">
                                <span>Change email</span>
                            </label>
                            <input class="submitChange" type="submit" value="Сохранить">
                            <span class="hl"></span>
                        </form>
                        <form action="editAvatar.php" class="formChange" method="post" enctype="multipart/form-data">
                            <label>
                                <input class="input" type="file" placeholder="" required="" name="changeAvatar" accept="image/jpg, image/jpeg, image/png">
                                <span>Change avatar</span>
                            </label>
                            <input class="submitChange" type="submit" value="Сохранить">
                            <span class="hl"></span>
                        </form>
                        <form action="editSex.php" class="formChooser" method="post" enctype="multipart/form-data">
                            <div class="choosers">
                                <input type="radio" id="men" name="fav_language" value="Мужчина">
                                <label for="html">Мужчина</label><br>
                                <input type="radio" id="women" name="fav_language" value="Женщина">
                                <label for="css">Женщина</label><br>
                                <input type="radio" id="nonbinary" name="fav_language" value="Женек">
                                <label for="javascript">Женек</label>
                            </div>
                            <input class="submitChangeChooser" type="submit" value="Сохранить">
                        </form>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
    <!-- <script src="script.js"></script> -->
    <!-- <script src="reg.js"></script> -->
</body>

</html>