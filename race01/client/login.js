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

let selectImage = document.querySelector("#selectImage");
const listItems = document.querySelectorAll("#listImage li");

document.querySelector(".textField:nth-child(2)").addEventListener('click', function(e) {
    selectImage.style.display = "block";
});

document.querySelector(".containerImage").addEventListener('click', function(e) {
    selectImage.style.display = "block";
});

document.querySelector(".close").addEventListener('click', function(e) {
    selectImage.style.display = "none";
});

window.addEventListener('click', function(e){
    if(event.target == selectImage) {
        selectImage.style.display = "none";
    }
});

for (let i = 0; i <= listItems.length - 1; i++) {
    listItems[i].addEventListener("click", function(e) {
        document.querySelector("#loginImage").value = this.id;
        document.querySelector(".textField:nth-child(2)").style.display = "none";
        document.querySelector(".containerImage").style.display = "block";
        document.getElementById("avatarImg").src = `assets/avatars/${this.id}.png`;
        selectImage.style.display = "none";
    });
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

let loginBtn = document.getElementById("loginBtn");
loginBtn.onclick = () => {
    myUsername = document.getElementById("loginUsername").value;
    myAvatar = document.getElementById("loginImage").value;
    host = document.getElementById("ipAddress").value;
    room = document.getElementById("loginRoom").value;
    // only for room creator
    if (!room) {
        let request = requestSend('POST', `http://${host}:3100/server/index.php`, JSON.stringify({"create_room": true, "username": myUsername, "avatar": myAvatar}));
        request.onload = () => {
            let res = request.response;
            room = res["room"];
            myId = 1;
            let newRoomText = document.getElementById("newRoomText");
            newRoomText.innerHTML = `New room id: ${room}<br>Waiting for opponent<span id="newRoomLoad"></span>`;
            newRoomText.style.display = "block";
            timerId = setInterval(() => {
                let dots = document.getElementById("newRoomLoad");
                if (dots.innerText == "")
                    dots.innerText = ".";
                else if (dots.innerText == ".")
                    dots.innerText = "..";
                else if (dots.innerText == "..")
                    dots.innerText = "...";
                else if (dots.innerText == "...")
                    dots.innerText = "";
            }, 500);
            getFirstMove();
        }
    }
    else {
        let request = requestSend('POST', `http://${host}:3100/server/index.php`, JSON.stringify({"join_room": true, "room": room, "username": myUsername, "avatar": myAvatar}));
        request.onload = () => {
            myId = 2;
            let first_move = request.response["first_move"];
            setCookie("host", host);
            setCookie("myId", myId);
            setCookie("room", room);
            setCookie("username", myUsername);
            setCookie("avatar", myAvatar);
            setCookie("first_move", first_move);
            location.href = "index.html";
        }
    }
}

function getFirstMove() {
    let request = requestSend('GET', `http://${host}:3103/server/get_first_move.php?room=${room}`);
    request.onload = () => {
        clearInterval(timerId);
        let first_move = request.response["first_move"];
        setCookie("host", host);
        setCookie("myId", myId);
        setCookie("room", room);
        setCookie("username", myUsername);
        setCookie("avatar", myAvatar);
        setCookie("first_move", first_move);
        location.href = "index.html";
    }
}
