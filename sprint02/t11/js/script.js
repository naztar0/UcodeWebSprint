function addWords(obj, wrds) {
   let words = obj.words.split(' ');
   let newWords = wrds.split(' ');
   let result = words.concat(newWords).filter(function (value, index, self) {
      return self.indexOf(value) == index;
   });
   obj.words = result.join(' ').trim();
}
function removeWords(obj, wrds) {
   let words = obj.words.split(' ');
   let remWords = wrds.split(' ');
   for (let i = 0; i < remWords.length; i++) {
      words = words.filter(function (value) {
         return value != remWords[i];
      });
   }
   obj.words = words.join(' ').trim();
}
function changeWords(obj, oldWrds, newWrds) {
   removeWords(obj, oldWrds);
   addWords(obj, newWrds);
}
