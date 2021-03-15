let apiKey = "15aab651bdda454a5072ccf50dadd393";
let lat = '50.0145666', lon = '36.3057416';
let days = 4;
let apiPattern = `https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&exclude=current,minutely,hourely,alerts&units=metric&appid=${apiKey}`;

function requestSend(method, url, responseType='json') {
    const request = new XMLHttpRequest();
    request.open(method, url);
    request.responseType = responseType;
    request.send();
    return request;
}

let main = document.getElementById("main-block");
let request = requestSend('GET', apiPattern);
request.onload = function () {
    let res = request.response;
    let list = res['daily'];
    list.forEach(elem => {
        let dayBlock = document.createElement('div');
        dayBlock.className = "day-block";
        let dt = new Date(elem['dt'] * 1000);
        let temp = elem['temp']['day'];
        // let weather = elem['weather'][0]['main'];
        let icon = elem['weather'][0]['icon'];

        let daynum = document.createElement('p');
        daynum.className = "daynum";
        let img = document.createElement('img');
        let temperature = document.createElement('span');
        temperature.className = "temp";
        let iconPattern = `http://openweathermap.org/img/wn/${icon}@2x.png`;
        daynum.innerHTML = `${dt.getDate()}.0${dt.getMonth() + 1}`;
        console.log(elem['dt']);
        img.src = iconPattern;
        temperature.innerHTML = temp + '°';
        dayBlock.appendChild(daynum);
        dayBlock.appendChild(img);
        dayBlock.appendChild(temperature);
        main.appendChild(dayBlock);
    });
}
