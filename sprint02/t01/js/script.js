let anumber = 123;
let abigint = 123456n;
let astring = "example";
let abool = true;
let anull = null;
let aundefined = undefined;
let aobject = {1: 1};
let asymbol = Symbol("id");
let afunction = function (params) {};

alert(
   `anumber is ${typeof anumber}\n`+
   `abigint is ${typeof abigint}\n`+
   `astring is ${typeof astring}\n`+
   `abool is ${typeof abool}\n`+
   `anull is ${typeof anull}\n`+
   `aundefined is ${typeof aundefined}\n`+
   `aobject is ${typeof aobject}\n`+
   `asymbol is ${typeof asymbol}\n`+
   `afunction is ${typeof afunction}\n`
);
