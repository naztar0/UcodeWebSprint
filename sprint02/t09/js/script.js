function getFormattedDate(dateObject) {
   let result = 
   (dateObject.getDate() < 10 ? '0' + dateObject.getDate() : dateObject.getDate()) + '.' +
   (dateObject.getMonth() + 1 < 10 ? '0' + (dateObject.getMonth() + 1) : (dateObject.getMonth() + 1)) + '.' +
   dateObject.getFullYear() + ' ' +
   (dateObject.getHours() < 10 ? '0' + dateObject.getHours() : dateObject.getHours()) + ':' +
   (dateObject.getMinutes() < 10 ? '0' + dateObject.getMinutes() : dateObject.getMinutes()) + ' ';
   switch (dateObject.getDay()) {
      case 1:
         result += 'Monday';
         break;
      case 2:
         result += 'Tuesday';
         break;
      case 3:
         result += 'Wednesday';
         break;
      case 4:
         result += 'Thursday';
         break;
      case 5:
         result += 'Friday';
         break;
      case 6:
         result += 'Saturday';
         break;
      case 7:
         result += 'Sunday';
         break;
   }
   return result;
}
