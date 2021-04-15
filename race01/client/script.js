let myId = null;
let myUsername = null;
let myAvatar = null;
let myHealth = null;
let myMana = null;
let lastMove = null;
let room = null;
let host = null;
let cards = null;
let timerId = null;
let myCardOnTable = null;
let rivalCardOnTable = null;
let rivalCardOnTableChanged = false;

function setCookie(name,value,hours=1) {
    var expires = "";
    if (hours) {
        var date = new Date();
        date.setTime(date.getTime() + (hours*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

host = getCookie("host");
myId = parseInt(getCookie("myId"));
room = parseInt(getCookie("room"));
myUsername = getCookie("username");
myAvatar = getCookie("avatar");
let first_move = getCookie("first_move");
document.getElementById("myAvatar").src = `assets/avatars/${myAvatar}.png`;
document.getElementById("myUsername").innerHTML = myUsername;
updateData();
if (first_move == myId) {
    console.log("I am first move!");
    startMove();
}
else {
    getCardMove();
}

function requestSend(method, url, payload=null) {
    const request = new XMLHttpRequest();
    request.open(method, url);
    if (payload) {
        if (method === 'GET')
            request.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        else
            request.setRequestHeader('content-type', 'application/json');
    }
    request.responseType = 'json';
    request.send(payload);
    return request;
}

function startTimer() {
    let sec = 30;
    timerId = setInterval(() => {
        if (sec == 0) {
            clearInterval(timerId);
            if (lastMove != myId)
                makeMove(null);
        }
        document.querySelector("#timeOutput").innerHTML = "00:" + (sec <= 9 ? "0" + sec : sec);
        sec--;
    }, 1000);
}

function animateMove(elem, cardPos, my=true, instant=false) {
    let rand = Math.floor(Math.random() * 100) - 50;
    let finalX = 300 + rand, finalY = -400 + rand;  // for me
    if (!my)  // for rival
        finalX = 750 + rand, finalY = 400 + rand;
    elem.style.position = "absolute";
    if (instant) {
        elem.style.left = finalX;
        elem.style.top = finalY;
        return;
    }
    let pos = elem.getBoundingClientRect();
    let posX = my ? pos.width * cardPos : 1050;
    if (lastMove == myId)
        posX = pos.left - posX;
    let posY = 0;
    let shot = 0;
    let shots = 100;
    let interval = setInterval(() => {
        if (++shot == shots)
            clearInterval(interval);
        elem.style.left = ((finalX - posX) * shot / shots) + posX;
        elem.style.top = ((finalY - posY) * shot / shots) + posY;
    }, 10);
}

function cardListener(elem, cardId, cardPos) {
    elem.onclick = () => {
        if (lastMove == myId)
            return;
        if (cards[cardId]["mana"] > myMana) {
            return;
        }
        myCardOnTable = cardId;
        makeMove(cardId);
        animateMove(elem, cardPos);
    }
}

function generateCard(imgContainer, text, health) {
    let img = document.createElement('img');
    img.src = `assets/cards/${text}.png`;
    imgContainer.appendChild(img);
    let imgHealth = document.createElement("span");
    imgHealth.innerHTML = health;
    imgContainer.appendChild(imgHealth);
    imgContainer.className = "cardContainer";
    imgHealth.className = "cardHealth";
}

function updateData() {
    let request1 = requestSend('GET', `http://${host}:3100/server/index.php?get_rival=true&room=${room}&username=${myUsername}`);
    request1.onload = () => {
        let rival = request1.response;
        let cardsCount = rival["cards_count"];
        let health = rival["health"];
        let username = rival["username"];
        let avatar = rival["avatar"];
        let mana = rival["mana"];
        document.getElementById("rivalUsername").innerHTML = username;
        document.getElementById("rivalHealth").innerHTML = health;
        document.getElementById("rivalMana").innerHTML = mana;
        document.getElementById("rivalAvatar").src = `assets/avatars/${avatar}.png`;
        let rivalDeck = document.getElementById("rivalDeck");
        while (rivalDeck.firstChild)
            rivalDeck.removeChild(rivalDeck.lastChild);
        for (let i = 0; i < cardsCount; i++) {
            let li = document.createElement("li");
            let imgBack = document.createElement('img');
            imgBack.src = "assets/images/cardBackground.png";
            li.appendChild(imgBack);
            rivalDeck.appendChild(li);
            console.log(rivalCardOnTable);
            if (rivalCardOnTableChanged && i == 0) {
                imgBack.src = `assets/cards/${rivalCardOnTable["text"]}.png`;
                let imgHealth = document.createElement("span");
                imgHealth.innerHTML = rivalCardOnTable["health"];
                li.appendChild(imgHealth);
                li.className = "cardContainer";
                imgHealth.className = "cardHealth";
                animateMove(li, 1, false);
                rivalCardOnTableChanged = false;
            }
            else if (rivalCardOnTable && i == 0) {
                console.log("ok");
                imgBack.src = `assets/cards/${rivalCardOnTable["text"]}.png`;
                let imgHealth = document.createElement("span");
                imgHealth.innerHTML = rivalCardOnTable["health"];
                li.appendChild(imgHealth);
                li.className = "cardContainer";
                imgHealth.className = "cardHealth";
                animateMove(li, 1, false, true);
            }
        }
    }
    let request2 = requestSend('GET', `http://${host}:3100/server/index.php?get_me=true&room=${room}&username=${myUsername}`);
    request2.onload = () => {
        let me = request2.response;
        myUsername = me["username"]
        cards = me["cards"];
        myHealth = me["health"];
        myMana = me["mana"];
        document.getElementById("myUsername").innerHTML = myUsername;
        document.getElementById("myHealth").innerHTML = myHealth;
        document.getElementById("myMana").innerHTML = myMana;

        let myDeck = document.getElementById("myDeck");
        while (myDeck.firstChild)
            myDeck.removeChild(myDeck.lastChild);
        let pos = 1;
        for (let cardId in cards) {
            let card = cards[cardId];
            let li = document.createElement("li");
            myDeck.appendChild(li);
            cardListener(li, cardId, pos++);
            generateCard(li, card["text"], card["health"]);
            if (cardId == myCardOnTable) {
                animateMove(li, pos - 1, true, true);
            }
        }
        if (myHealth <= 0)
            location.href = "lose.html";
    }
}

function startMove() {
    startTimer();
    // display that i can move
    document.getElementById("arrow").style = "transform: rotate(90deg);";
}
function getCardMove() {
    startTimer();
    // block my cards
    document.getElementById("arrow").style = "transform: rotate(-90deg);";
    let request = requestSend('GET', `http://${host}:3102/server/get_card_move.php?card_move=${lastMove ? lastMove : (myId == 1 ? 2 : 1)}&room=${room}`);
    request.onload = () => {
        if (request.response["card_data"]) {
            if (rivalCardOnTable != request.response["card_data"])
                rivalCardOnTableChanged = true;
            rivalCardOnTable = request.response["card_data"];
        }
        clearInterval(timerId);
        lastMove = myId == 1 ? 2 : 1;
        updateData();
        startMove();
    }
}

function makeMove(cardId) {
    let request = requestSend('POST', `http://${host}:3100/server/index.php`, JSON.stringify({"card_move": true, "room": room, "user_num": myId, "card_id": cardId, "username": myUsername}));
    request.onload = () => {
        if (!request.response["win"]) {
            clearInterval(timerId);
            lastMove = myId;
            // updateData();
            setTimeout(getCardMove, 2000);
        }
        else {
            location.href = "win.html"
        }
    }
}