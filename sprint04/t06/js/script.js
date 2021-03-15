let loaded = 0, imgAll = 8;
let info = document.getElementById("info");
info.innerHTML = "0 images loaded from " + imgAll;

function loadImage(elem) {
    let img = new Image();
    let src = elem.getAttribute('data-src');
    if (!src)
        return;
    elem.removeAttribute('data-src');
    img.onload = () => {
        elem.src = src;
        info.innerHTML = ++loaded + " images loaded from " + imgAll;
        if (loaded >= imgAll)
            info.style.backgroundColor = "lightgreen";
    }
    img.src = src;
}

function elementInViewport(elem) {
    let rect = elem.getBoundingClientRect();
    console.log(rect);
    let res = rect.top >= 0 &&
                rect.left >= 0 &&
                rect.top <= document.documentElement.clientHeight;
    console.log(document.documentElement.clientHeight);
    console.log(res);
    return res;
}

let images = document.getElementsByTagName('img');
let eventScroll = () => {
    for (let i = 0; i < images.length; i++)
        if (elementInViewport(images[i]))
            loadImage(images[i]);
}

eventScroll();
addEventListener('scroll', eventScroll);