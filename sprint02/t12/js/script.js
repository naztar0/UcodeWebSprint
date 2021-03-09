let concat = (string1, string2=null) => {
   if (string2 != null)
      return string1 + ' ' + string2;
   let count = 0;
   return function getstr() {
      count++;
      getstr.count = count;
      string2 = prompt("Enter the second string", '');
      return string1 + ' ' + string2;
   };
}
