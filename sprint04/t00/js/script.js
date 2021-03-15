let state = 1;

function transformation() {
    let hero = document.getElementById("hero");
    let bg = document.getElementById("lab");
    if (state === 1) {
        state = 2;
        hero.innerHTML = "Hulk";
        hero.style.fontSize = "130px";
        hero.style.letterSpacing = "6px";
        bg.style.backgroundColor = "#70964b";
    }
    else if (state === 2) {
        state = 1;
        hero.innerHTML = "Bruce Banner";
        hero.style.fontSize = "60px";
        hero.style.letterSpacing = "2px";
        bg.style.backgroundColor = "#ffb300";
    }
}