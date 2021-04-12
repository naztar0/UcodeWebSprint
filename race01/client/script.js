let myId = null;
let lastMove = null;
let host = "http://10.11.4.9:3000/server/index.php";
let room = null;
let cards = [];

function requestSend(method, payload=null) {
    const request = new XMLHttpRequest();
    request.open(method, host);
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

let testBtn = document.getElementById('test1');
testBtn.onclick = () => {
    let request = requestSend('GET');
    request.onload = () =>
        document.getElementById("response").innerHTML = request.response;
};
