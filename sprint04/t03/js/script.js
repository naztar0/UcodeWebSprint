let images = ["assets/images/1.jpeg", "assets/images/2.jpeg", "assets/images/3.jpeg", "assets/images/4.jpeg"];
let pos = 0;
let img = document.getElementsByTagName('img')[0];
img.setAttribute('src', images[0]);

let leftBtn = document.getElementById('lb');
let rigthBtn = document.getElementById('rb');

let int;
function changeImg(direction) {
    if (direction === 'right') {
        if (pos === images.length - 1)
            pos = 0;
        else
            pos++;
    }
    else if (direction === 'left') {
        if (pos === 0)
            pos = images.length - 1;
        else
            pos--;
    }
    img.setAttribute('src', images[pos]);
    clearInterval(int);
    int = setInterval(changeImg, 3000, 'right');
}

leftBtn.onclick = () => changeImg('left');
rigthBtn.onclick = () => changeImg('right');

int = setInterval(changeImg, 3000, 'right');
