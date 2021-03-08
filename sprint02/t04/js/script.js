let num1 = prompt("Number for the beginning of a range", '1');
let num2 = prompt("Number for the end of a range", '100');

checkDivision(num1, num2);

function checkDivision(beginRange, endRange) {
   for (let i = beginRange; i <= endRange; i++) {
      let result = i.toString();
      let comma = false;
      if (i % 2 == 0) {
         result += ' is even';
         comma = true;
      }
      if (i % 3 == 0) {
         if (comma)
            result += ',';
         result += ' a multiple of 3';
         comma = true;
      }
      if (i % 10 == 0) {
         if (comma)
            result += ',';
         result += ' a multiple of 10';
         comma = true;
      }
      if (!comma)
         result += ' -';
      console.log(result);
   }
}