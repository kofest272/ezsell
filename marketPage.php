<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZSELL | Главная</title>
    <link rel="stylesheet" href="css/stylemarket.css">
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
            <div class="switcher">
                <form name="switcherForm">
                    <select class="switcherInput" name="social">
                            <option value="all" class="target" selected>All</option>
                            <option value="tiktok" class="target">TikTok</option>
                            <option value="telegram" class="target">Telegram</option>
                            <option value="youtube" class="target">YouTube</option>
                            <option value="clashRoyale" class="target">Clash Royale</option>
                            <option value="clashOfClans" class="target">Clash Of Clans</option>
                            <option value="counterStrike">Counter-Strike 2</option>
                            <option value="minecraft" class="target">Minecraft</option>
                            <option value="dota" class="target">Dota 2</option>
                            <option value="rocketLeague" class="target">Rocket League</option>
                            <option value="worldOfTanks" class="target">World Of Tanks</option>
                            <option value="leagueOfLegends" class="target">League Of Legends</option>
                            <option value="pathOfExile" class="target">Path Of Exile</option>
                    </select>
                </form>
            </div>
            <div class="socials">
                <img src="icons/cybershoke/social/discord.svg" alt="" class="iconsocial">
                <img src="icons/cybershoke/social/instagram.svg" alt="" class="iconsocial">
                <img src="icons/cybershoke/social/steam.svg" alt="" class="iconsocial">
                <img src="icons/cybershoke/social/telegram.svg" alt="" class="iconsocial">
                <img src="icons/cybershoke/social/youtube.svg" alt="" class="iconsocial">
            </div>
            <a href="registration.php">
                <div class="premiumbtn">
                    <h4 class="goldtext">Зарегистрироваться</h4>
                </div>
            </a>
            <p class="forDate"></p>
        </div>
        <div class="cards">
        </div>
        <hr class="horline">
    </div>
    <script type="text/javascript">
    const tracker = document.querySelector(".countries_active"),
          langcsr = document.querySelector(".languagechooser"),
          cardsDiv = document.querySelector(".cards"),
          countriesBtn = document.querySelectorAll('.trackerCntry'),
          onlineText = document.querySelector('.textOnline'),
          premiumBtn = document.querySelector(`.premiumbtn`),
          targetInput = document.querySelector('.target');
    targetInput.addEventListener('click', ()=> {
        console.log('1');
        // let firstLanguage = document.switcherForm.social;
        // console.log("Index:", firstLanguage.index);
        // console.log("Text:", firstLanguage.text);
        // console.log("Value:", firstLanguage.value);
    })
    let signin = false;
    function getCookie(namer) {
        let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + namer.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return result = matches ? decodeURIComponent(matches[1]) : undefined;
    }
    getCookie('user');
    if (result == undefined) {
        premiumBtn.style.cssText = `
        display: flex;
        `
        signin = false;
    }else{
        premiumBtn.style.cssText = `
        display: none;
        `
        signin = true;
    }

    let onlineServers = 0;
    let currentLanguage = 2;
    let textInGame = 'АККАУНТА В ПРОДАЖЕ'
    function openLangChooser(){
        tracker.classList.add('active')
        langcsr.style.cssText = `
            display: flex;
            opacity: 100%;
                            `;
    }
    function closeLangChooser(){
        tracker.classList.remove('active')
            langcsr.style.cssText = `
                display: none;
                opacity: 0%;  `;
    }
    tracker.addEventListener('click', () => {
        if(tracker.classList.contains('active')) {
            closeLangChooser();
        }else {
            openLangChooser();
        }
    });
    countriesBtn[0].addEventListener('click', ()=> {
        tracker.setAttribute('src', 'icons/countries/republic-of-poland.svg');
        currentLanguage = 0;
        closeLangChooser();
    })
    countriesBtn[1].addEventListener('click', ()=> {
        tracker.setAttribute('src', 'icons/countries/russia.svg');
        currentLanguage = 1;
        closeLangChooser();
    })
    countriesBtn[2].addEventListener('click', ()=> {
        tracker.setAttribute('src', 'icons/countries/germany.svg');
        currentLanguage = 2;
        closeLangChooser();
    })
    countriesBtn[3].addEventListener('click', ()=> {
        tracker.setAttribute('src', 'icons/countries/en.svg');
        currentLanguage = 3;
        closeLangChooser();
    }) 
    function addCard(array) {
        if(array['active'] = '1') {
            const id = array['id'],
                  social = array['social'],
                  title = array['title'],
                  category = array['category'],
                  followers = array['followers'],
                  cost = array['cost'];
            var newDiv = document.createElement("div");
            newDiv.innerHTML = `<label>
            <a href="">
                <div class="cardNumber${id}">
                    <div class="infoZone${id}">
                        <h4 class="title${id}">${title}</h4>
                        <img src="icons/social/${social}.png" alt="" class="socialIcon">
                        <h4 class="text${id}">${cost}$</h4>
                    </div>
                </div>
            </a>    
            </label>`;
            // Добавляем только что созданный элемент в дерево DOM
            my_div = document.querySelector(`.cardNumber${id}`);
            document.querySelector('.cards').insertBefore(newDiv, my_div);

            const forStylesCard = document.querySelector(`.cardNumber${id}`)
            forStylesCard.style.cssText = `
            width: 55vh;
            height: 300px;
            background-color: #16111c;
            display: flex;
            align-items: end;
            justify-content: center;
            background-image: url('../pictures/${social}.jpg');
            background-size: 150%;
            background-position: center;
            border-radius: 40px;
            overflow: hidden;
            opacity: 1;
            box-shadow: -1px 1px 31px 0px #1A1A1A;
            -webkit-box-shadow: -1px 1px 31px 0px #1A1A1A;
            -moz-box-shadow: -1px 1px 31px 0px #1A1A1A;
            `
            const forStylesText = document.querySelector(`.title${id}`);
            forStylesText.style.cssText = `
            display: flex;
            z-index: 1;
            margin-top: 0px;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
            `
            const forStylesText2 = document.querySelector(`.text${id}`);
            forStylesText2.style.cssText = `
            font-size: 25px;
            z-index: 1;
            margin-top: 60px;
            position: absolute;
            font-family: Arial, Helvetica, sans-serif;
            color: rgb(255, 107, 107);
            `
            const infoZone = document.querySelector(`.infoZone${id}`);
            infoZone.style.cssText = `
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            width: 100%;
            height: 120px;
            border-top-left-radius: 0%;
            border-top-right-radius: 0%;
            border-bottom-left-radius: 39px;
            border-bottom-right-radius: 39px;
            display: flex;
            background: radial-gradient(178.94% 106.41% at 26.42% 106.41%, #ff8c8c8c 0%, rgba(255, 255, 255, 0) 71.88%), rgba(0, 0, 0, .9);
            `
            zoom(infoZone, forStylesCard, social)
        } else {
            console.log('active 0')
        }
    }
    function zoom(infoZone, card, social) {
        card.onmouseover = function () {
            card.style.cssText = `
            width: 55vh;
            height: 300px;
            background-color: #16111c;
            display: flex;
            align-items: end;
            justify-content: center;
            background-image: url('../pictures/${social}.jpg');
            background-size: 150%;
            background-position: center;
            border-radius: 40px;
            overflow: hidden;
            opacity: 1;
            box-shadow: -1px 1px 31px 0px #1A1A1A;
            -webkit-box-shadow: -1px 1px 31px 0px #1A1A1A;
            -moz-box-shadow: -1px 1px 31px 0px #1A1A1A;
            animation: changeColor 1s;
            animation: zoomIn 0.3s;
            transform: scale(1.05);
            `
            
        };
        card.onmouseleave = function () {
            card.style.cssText = `
            width: 55vh;
            height: 300px;
            background-color: #16111c;
            display: flex;
            align-items: end;
            justify-content: center;
            background-image: url('../pictures/${social}.jpg');
            background-size: 150%;
            background-position: center;
            border-radius: 40px;
            overflow: hidden;
            opacity: 1;
            box-shadow: -1px 1px 31px 0px #1A1A1A;
            -webkit-box-shadow: -1px 1px 31px 0px #1A1A1A;
            -moz-box-shadow: -1px 1px 31px 0px #1A1A1A;
            animation: zoomOut 0.3s;
            transform: scale(1);
            `
            
        }
    }
    <?php
    $mysql = new mysqli('localhost', 'root', '', 'ezsellReg');

    if ($mysql->connect_error) {
        die("Ошибка подключения: " . $mysql->connect_error);
    }

    $resultMax = $mysql->query("SELECT MAX(`id`) AS maxId FROM `marketTiktok`");
    $maxIdArray = $resultMax->fetch_assoc();
    $maxId = intval($maxIdArray['maxId']);

    $data = array();

    for ($minId = 40; $minId <= $maxId; $minId++) {
        $result = $mysql->query("SELECT * FROM `marketTiktok` WHERE `id` = '$minId'");
        $user = $result->fetch_assoc();
        $data[$minId] = $user;
    }

    $mysql->close();
    ?>

    const maxId = <?=$maxId?>;
    const dataArray = <?=json_encode($data)?>;

    for (let minId = 40; minId <= maxId; minId++) {
        const fra = dataArray[minId];
        addCard(fra);
    }
    console.log(dataArray);
    document.cookie = `online=${onlineServers}`;
    onlineText.textContent = onlineServers;
    </script>
</body>

</html>