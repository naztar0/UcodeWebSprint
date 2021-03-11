let guestList = new WeakSet();
let menu = new Map();
let bankVault = new WeakMap();
let coinCollection = new Set();

let guest1 = {name:'Ann'};
let guest2 = {name:'Janet'};
let guest3 = {name:'Molly'};
let guest4 = {name:'Jack'};
let guest5 = {name:'Michael'};

guestList.add(guest1);
guestList.add(guest2);
guestList.add(guest3);
guestList.add(guest4);
guestList.add(guest5);

menu.set('pelmeni', 100);
menu.set('borshch', 40);
menu.set('vareniki', 50);
menu.set('coffee', 20);
menu.set('oladi', 60);

let user1 = {login1: 'pass1'};
let user2 = {login2: 'pass2'};
let user3 = {login3: 'pass3'};
let user4 = {login4: 'pass4'};
let user5 = {login5: 'pass5'};

bankVault.set(user1, 'account1');
bankVault.set(user2, 'account2');
bankVault.set(user3, 'account3');
bankVault.set(user4, 'account4');
bankVault.set(user5, 'account5');

coinCollection.add('1 pennie');
coinCollection.add('2 pennie');
coinCollection.add('5 pennie');
coinCollection.add('10 pennie');
coinCollection.add('50 pennie');

console.log(guestList.has(guest1));  // True
guestList.delete(guest1);
console.log(guestList.has(guest1));  // False

menu.forEach((value, key, map) => {console.log(key + " - " + value);});

console.log(bankVault.get(user1));  // account1

console.log(coinCollection.forEach((value) => {console.log(value);}));
