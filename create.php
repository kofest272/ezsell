<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZSELL | Профиль</title>
    <link rel="stylesheet" href="css/stylecreate.css">
</head>

<body>
    <?php
    if ($_COOKIE['user'] == '') {
        header('Location: registration.php');
    }
    ?>
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
            <a href="registration.php">
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
            <div class="createDiv">
            <form class="form" action="addDeal.php" method="post">
                <label>
                    <input class="input" type="text" placeholder="" required="" name="title">
                    <span>Title</span>
                </label>
                <div class="flex">
                    <label>
                        <input class="input" type="text" placeholder="" required="" name="link">
                        <span>Link</span>
                    </label>

                    <label>
                        <input class="input" type="number" placeholder="" required="" name="cost">
                        <span>Cost $</span>
                    </label>
                </div>
                <div class="flex">
                    <label>
                        <select class="input" name="social">
                            <option value="tiktok" selected>TikTok</option>
                            <option value="telegram">Telegram</option>
                            <option value="youtube">YouTube</option>
                            <option value="clashRoyale">Clash Royale</option>
                            <option value="clashOfClans">Clash Of Clans</option>
                            <option value="counterStrike">Counter-Strike 2</option>
                            <option value="minecraft">Minecraft</option>
                            <option value="dota">Dota 2</option>
                            <option value="rocketLeague">Rocket League</option>
                            <option value="worldOfTanks">World Of Tanks</option>
                            <option value="leagueOfLegends">League Of Legends</option>
                            <option value="pathOfExile">Path Of Exile</option>
                            <option value="other">Other</option>
                        </select>
                        <span>Social Network</span>
                    </label>

                    <label>
                        <select class="input" name="category">
                        <option value="work" selected>Work</option>
                        <option value="cars">Cars</option>
                        <option value="family">Family</option>
                        <option value="sport">Sport</option>
                        <option value="humor">Humor</option>
                        <option value="business">Business</option>
                        <option value="hobby">Hobby</option>
                        <option value="finances">Finances</option>
                        <option value="games">Games</option>
                        <option value="music">Music</option>
                        <option value="other">Other</option>
                        </select>
                        <span>Category</span>
                    </label>
                </div>
                <div class="downOptions">
                    <div class="leftSide">
                        <label>
                            <textarea class="input" id="description" type="text" name="description" maxlength="1000"></textarea>
                            <span>Description</span>
                        </label>
                    </div>
                    <div class="rightSide">
                        <label>
                            <input class="input" type="file" placeholder="" required="" name="picture" accept="image/jpg, image/jpeg, image/png">
                            <span>Picture</span>
                        </label>
                        <label>
                            <input class="input" type="number" placeholder="" required="" name="followers">
                            <span>Followers</span>
                        </label>
                        <label>
                            <input class="input" type="number" placeholder="" required="" name="income">
                            <span>Income $</span>
                        </label>
                        <label>
                            <input class="input" type="date" placeholder="" required="" name="dateOfRegAccount">
                            <span>Date of registration</span>
                        </label>
                    </div>
                </div>
                
                <button class="submit" type="submit">Submit</button>
            </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <!-- <script src="reg.js"></script> -->
</body>

</html>