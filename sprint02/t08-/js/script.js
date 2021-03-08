function checkBrackets(str) {
   if (typeof str != 'string')
      return -1;
   if (!str.match(/[\(\)]/))
      return -1;
   let left = 0, right = 0;  // unclosed
   for (let i = 0; i < str.length; i++) {
      if (str[i] == '(') {
         left++;
      }
      else if (str[i] == ')') {
         if (left > 0)
            left--;
         else
            right++;
      }
      
   }
   return left + right;
}