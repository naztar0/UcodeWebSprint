let caloriesElem = document.getElementById("calories");
let messageElem = document.getElementById("message");
let sleepButton = document.getElementById("sleep");
let feedButton = document.getElementById("feed");
let flyButton = document.getElementById("fly");
let fightButton = document.getElementById("fight");

class Human {
    constructor() {
        flyButton.style.display = "none";
        fightButton.style.display = "none";

        this.firstName;
        this.lastName;
        this.gender;
        this.age;
        this.calories = 200;
        caloriesElem.innerHTML = this.calories;

        setInterval(() => {
            if (this.calories > 0) {
                this.calories -= 200;
                caloriesElem.innerHTML = this.calories;
                if (this.calories < 500) {
                    flyButton.style.display = 'none';
                    fightButton.style.display = 'none';
                }
            }
        }, 60000);
        setTimeout(() => {
            this.calories -= 200;
            caloriesElem.innerHTML = this.calories;
            console.log("I'm hungry");
        }, 5000);
    }
    sleepFor() {
        let timeout = prompt("Timeout");
        messageElem.innerHTML = "I'm sleeping";
        setTimeout(() => {messageElem.innerHTML = "I'm awake now";}, timeout);
        return this;
    }
    feed() {
        if (this.calories > 500) {
            messageElem.innerHTML = "I'm not hungry";
            return this;
        }
        messageElem.innerHTML = "Nom nom nom";
        setTimeout(() => {
            // NaN
            this.calories += 200;
            caloriesElem.innerHTML = this.calories;
            messageElem.innerHTML = '';
            if (this.calories < 500)
                messageElem.innerHTML = "I'm still hungry";
            else {
                flyButton.style.display = 'unset';
                fightButton.style.display = 'unset';
            }
        }, 10000);
        return this;
    }
}

class Superhero extends Human {
    fly() {
        messageElem.innerHTML = "I'm flying!";
        setTimeout(() => {messageElem.innerHTML = '';}, 10000);
    }
    fightWithEvil() {
        messageElem.innerHTML = "Khhhh-chh... Bang-g-g-g...<br>Evil is defeated!";
    }
}

let human = new Superhero();

sleepButton.onclick = human.sleepFor;
feedButton.onclick = human.feed;
flyButton.onclick = human.fly;
fightButton.onclick = human.fightWithEvil;
flyButton.style.display = "none";
fightButton.style.display = "none";
