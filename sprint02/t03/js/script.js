let num = NaN;
while (isNaN(num) || num < 1 || num > 10) {
   num = Number.parseInt(prompt("Type a number from 1 to 10"), '');
}
let idiom;
switch (num) {
   case 1:
      idiom = 'Back to square 1';
      break;
   case 2:
      idiom = 'Goody 2-shoes';
      break;
   case 3:
      idiom = "Two's company, three's a crowd";
      break;
   case 4:
      idiom = 'Counting sheep';
      break;
   case 5:
      idiom = 'Take five';
      break;
   case 6:
      idiom = "Two's company, three's a crowd";
      break;
   case 7:
      idiom = 'Seventh heaven';
      break;
   case 8:
      idiom = 'Behind the eight-ball';
      break;
   case 9:
      idiom = 'Counting sheep';
      break;
   case 10:
      idiom = 'Cheaper by the dozen';
      break;
}
alert(idiom);