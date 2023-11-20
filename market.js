const tracker = document.querySelector(".countries_active");
const langcsr = document.querySelector(".languagechooser");
const clutchvideo = document.querySelector(".clutchvideo");
const cardsDiv = document.querySelector(".cards");
const countriesBtn = document.querySelectorAll('.trackerCntry');
const onlineText = document.querySelector('.textOnline');
const forStylesTextTT = document.querySelector(`.textcard`);
const forStylesTextTT2 = document.querySelector(`.countercard`);
const cardClutch = document.querySelector(`.cardclutch`);
const premiumBtn = document.querySelector(`.premiumbtn`);
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
function changeOpacity(card, fst, fst2, cardStroke) {
    card.onmouseover = function () {
        card.style.opacity = "1";
        cardStroke.style.cssText = `
        margin-top: 20px;
        margin-left: 20px;
        background-color: #16111c;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 40px;
        overflow: hidden;
        width: 520px;
        height: 300px;
        box-shadow: -1px 1px 31px 0px #ff8b8b;
        -webkit-box-shadow: -1px 1px 31px 0px #ff8b8b;
        -moz-box-shadow: -1px 1px 31px 0px #ff8b8b;
        animation: changeColor 1s;
        `
        fst.style.cssText = `
        display: none;
        `
        fst2.style.cssText = `
        display: none;
        `
    };
    card.onmouseleave = function () {
        card.style.opacity = "0.4";
        cardStroke.style.cssText = `
        margin-top: 20px;
        margin-left: 20px;
        background-color: #16111c;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 40px;
        overflow: hidden;
        width: 520px;
        height: 300px;
        box-shadow: -1px 1px 31px 0px #1A1A1A;
        -webkit-box-shadow: -1px 1px 31px 0px #1A1A1A;
        -moz-box-shadow: -1px 1px 31px 0px #1A1A1A;
        `
        fst.style.cssText = `
        display: flex;
        z-index: 1;
        margin-top: 0px;
        position: absolute;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
        `
        fst2.style.cssText = `
        font-size: 10px;
        z-index: 1;
        margin-top: 50px;
        position: absolute;
        font-family: Arial, Helvetica, sans-serif;
        color: rgb(194, 194, 194);
        `
    }
} 
changeOpacity(clutchvideo, forStylesTextTT, forStylesTextTT2, cardClutch);
const braga = JSON.stringify(getCookie('deals'));
console.log(braga);


function addCard(name) {

    var newDiv = document.createElement("div");
    newDiv.innerHTML = `<a href=""><div class="card${name}">
    <h4 class="textcard${name}">${name.toUpperCase()}</h4>
    <h4 class="countercard${name}"></h4>
    <img src="img/backCard/${name}.jpg" class="${name}video"></img>
</div></a>`;
    onlineServers = onlineServers + randomNum;
    // Добавляем только что созданный элемент в дерево DOM
    my_div = document.querySelector(`.card${name}`);
    document.querySelector('.cards').insertBefore(newDiv, my_div);

    const forStylesCard = document.querySelector(`.card${name}`)
    forStylesCard.style.cssText = `
    margin-top: 20px;
    margin-left: 20px;
    background-color: #16111c;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 40px;
    overflow: hidden;
    width: 520px;
    height: 300px;
    box-shadow: -1px 1px 31px 0px #1A1A1A;
    -webkit-box-shadow: -1px 1px 31px 0px #1A1A1A;
    -moz-box-shadow: -1px 1px 31px 0px #1A1A1A;
    `
    const forStylesVideo = document.querySelector(`.${name}video`);
    forStylesVideo.style.cssText = `
    margin-left: 20px;
    width: 540px;
    opacity: 0.4;
    `
    const forStylesText = document.querySelector(`.textcard${name}`);
    forStylesText.style.cssText = `
    display: flex;
    z-index: 1;
    margin-top: 0px;
    position: absolute;
    font-family: Arial, Helvetica, sans-serif;
    color: white;
    `
    const forStylesText2 = document.querySelector(`.countercard${name}`);
    forStylesText2.style.cssText = `
    font-size: 10px;
    z-index: 1;
    margin-top: 50px;
    position: absolute;
    font-family: Arial, Helvetica, sans-serif;
    color: rgb(194, 194, 194);
    `
    const forChange = document.querySelector(`.${name}video`);
    changeOpacity(forChange, forStylesText, forStylesText2, forStylesCard)
}
document.cookie = `online=${onlineServers}`;
onlineText.textContent = onlineServers;