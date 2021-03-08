let exp = /^[a-z]+$/i;
let firstName = prompt("Enter the first name", '');
if (!firstName.match(exp)) {
   alert("Wrong input!");
   console.log("Wrong input!");
   throw '';
}

let secondName = prompt("Enter the second name", '');
if (!secondName.match(exp)) {
   alert("Wrong input!");
   console.log("Wrong input!");
   throw '';
}

firstName = firstName.charAt(0).toUpperCase() + firstName.slice(1);
secondName = secondName.charAt(0).toUpperCase() + secondName.slice(1);

alert(`Greetings, ${firstName} ${secondName}!`);
console.log(`Greetings, ${firstName} ${secondName}!`);
