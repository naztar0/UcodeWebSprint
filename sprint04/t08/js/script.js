let wi = document.getElementById("wi");
let ti = document.getElementById("ti");
let out = document.getElementById("output");
let toPBtn = document.getElementById("btn1");
let wCBtn = document.getElementById("btn2");
let wRBtn = document.getElementById("btn3");

toPBtn.onclick = () => {
    let phone = wi.value;
    if (!phone.match(/^\d{10}$/)) {
        out.innerHTML = "invalid phone number";
        return;
    }
    out.innerHTML = phone.slice(0, 3) + '-' + phone.slice(3, 6) + '-' + phone.slice(6);
}
wCBtn.onclick = () => {
    let word = wi.value;
    let text = ti.value;
    let count = text.match(new RegExp(word));
    console.log(count);
    count = count ? count.lenth : 0;
    out.innerHTML = count;
}