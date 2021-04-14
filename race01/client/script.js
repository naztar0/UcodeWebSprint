let myId = null;
let myUsername = null;
let myAvatar = null;
let lastMove = null;
let room = null;
let host = null;
let cards = null;
let timerId = null;

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
myId = getCookie("myId");
room = getCookie("room");
myUsername = getCookie("username");
myAvatar = getCookie("avatar");
let first_move = getCookie("first_move");
updateData();
if (first_move === myId) {
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

function animateMove(elem, cardPos) {
    let finalX = 300, finalY = -400;  // for me
    if (lastMove == myId)  // for rival
        finalX = 750, finalY = 400;
    elem.style.position = "absolute";
    let pos = elem.getBoundingClientRect();
    let posX = pos.width * cardPos;
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
        makeMove(cardId);
        animateMove(elem, cardPos);
    }
}

function generateCard(imgContainer, mana, attack, health, text, cardtext, cardclass='neural', race='Superhero') {
    let formData = new FormData();
    formData.append("mana", mana);
    formData.append("attack", attack);
    formData.append("health", health);
    formData.append("text", text);
    formData.append("cardtext", cardtext);
    formData.append("cardclass", cardclass);
    formData.append("race", race);
    formData.append("MAX_FILE_SIZE", 10000000);
    let request = new XMLHttpRequest();
    request.open("POST", `http://${host}:3101/server/send_request.php`);
    request.send(formData);
    request.onload = () => {
        let url = request.response;
        let img = document.createElement('img');
        // img.src = url;
        img.src = "assets/images/superman.png";
        imgContainer.appendChild(img);
    }
}

function updateData() {
    let request1 = requestSend('GET', `http://${host}:3100/server/index.php?get_rival=true&room=${room}&username=${myUsername}`);
    request1.onload = () => {
        let rival = request1.response;
        cardsCount = rival["cards_count"];
        health = rival["health"];
        let rivalDeck = document.getElementById("rivalDeck");
        while (rivalDeck.firstChild)
            rivalDeck.removeChild(rivalDeck.lastChild);
        for (let i = 0; i < cardsCount; i++) {
            let li = document.createElement("li");
            let imgBack = document.createElement('img');
            imgBack.src = "assets/images/cardThanos.jpg";
            li.appendChild(imgBack);
            rivalDeck.appendChild(li);
        }
    }
    let request2 = requestSend('GET', `http://${host}:3100/server/index.php?get_me=true&room=${room}&username=${myUsername}`);
    request2.onload = () => {
        let me = request2.response;
        cards = me["cards"];
        health = me["health"];
        let myDeck = document.getElementById("myDeck");
        while (myDeck.firstChild)
            myDeck.removeChild(myDeck.lastChild);
        let pos = 1;
        for (let cardId in cards) {
            let card = cards[cardId];
            let li = document.createElement("li");
            myDeck.appendChild(li);
            cardListener(li, cardId, pos++);
            generateCard(li, card["mana"], card["attack"], card["health"], card["text"],
                         card["cardtext"], card["cardclass"], card["race"]);
        }
    }
}

function startMove() {
    startTimer();
    // display that i can move
}
function getCardMove() {
    startTimer();
    // block my cards
    let request = requestSend('GET', `http://${host}:3102/server/get_card_move.php?card_move=${lastMove}&room=${room}&username=${myUsername}`);
    request.onload = () => {
        clearInterval(timerId);
        lastMove = myId == 1 ? 2 : 1;
        updateData();
        startMove();
    }
}

function makeMove(cardId) {
    let request = requestSend('POST', `http://${host}:3100/server/index.php`, JSON.stringify({"card_move": true, "room": room, "user_num": myId, "card_id": cardId}));
    request.onload = () => {
        if (request.status == 200) {
            clearInterval(timerId);
            lastMove = myId;
            // updateData();
            getCardMove();
        }
    }
}