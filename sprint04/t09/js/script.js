function getFormattedDate(dateObject) {
    let result = 
    (dateObject.getDate() < 10 ? '0' + dateObject.getDate() : dateObject.getDate()) + '.' +
    (dateObject.getMonth() + 1 < 10 ? '0' + (dateObject.getMonth() + 1) : (dateObject.getMonth() + 1)) + '.' +
    dateObject.getFullYear() + ', ' +
    (dateObject.getHours() < 10 ? '0' + dateObject.getHours() : dateObject.getHours()) + ':' +
    (dateObject.getMinutes() < 10 ? '0' + dateObject.getMinutes() : dateObject.getMinutes()) + ':' +
    (dateObject.getSeconds() < 10 ? '0' + dateObject.getSeconds() : dateObject.getSeconds());
    return result;
}

let ti = document.getElementById("ti");
let out = document.getElementById("output");
let addBtn = document.getElementById("btn1");
let clrBtn = document.getElementById("btn2");

addBtn.onclick = () => {
    let text = ti.value;
    if (!text)
        return;
    refreshData();
    localStorage.setItem('text', `${text} [${getFormattedDate(new Date())}]`);
}

clrBtn.onclick = () => {
    localStorage.removeItem('text');
}

function refreshData() {
    let prev = localStorage.getItem('text');
    out.innerText = '--> ' + prev;
}
refreshData();