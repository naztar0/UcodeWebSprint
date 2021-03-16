let wi = document.getElementById("wi");
let ti = document.getElementById("ti");
let out = document.getElementById("output");
let toPBtn = document.getElementById("btn1");
let wCBtn = document.getElementById("btn2");
let wRBtn = document.getElementById("btn3");
updateBtnCount();

function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : 0;
}

function setCookie(name, value) {
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);
}

function updateBtnCount() {
    let numBtn1 = +getCookie('btn1');
    let numBtn2 = +getCookie('btn2');
    let numBtn3 = +getCookie('btn3');
    toPBtn.value = `To phone number [${numBtn1}]`;
    wCBtn.value = `Word count [${numBtn2}]`;
    wRBtn.value = `Word replace [${numBtn3}]`;
}

toPBtn.onclick = () => {
    let phone = wi.value;
    if (!phone.match(/^\d{10}$/))
        out.innerHTML = "invalid phone number";
    else
        out.innerHTML = phone.slice(0, 3) + '-' + phone.slice(3, 6) + '-' + phone.slice(6);
    setCookie('btn1', +getCookie('btn1') + 1);
    updateBtnCount();
}
wCBtn.onclick = () => {
    let word = wi.value;
    let text = ti.value;
    let count = text.match(new RegExp('\\b'+word+'\\b', 'g'));
    console.log(count);
    count = count ? count.length : 0;
    out.innerHTML = count;
    setCookie('btn2', +getCookie('btn2') + 1);
    updateBtnCount();
}
wRBtn.onclick = () => {
    let word = wi.value;
    let text = ti.value;
    text = text.replaceAll(/(\w+)/g, word);
    ti.value = text;
    setCookie('btn3', +getCookie('btn3') + 1);
    updateBtnCount();
}
