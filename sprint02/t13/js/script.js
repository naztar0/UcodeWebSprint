class Calculator {
   constructor(num) {
      this.result = num;
   }
   init(num) {
      this.result = num;
      return this;
   };
   add(num) {
      this.result += num;
      return this;
   };
   sub(num) {
      this.result -= num;
      return this;
   };
   mul(num) {
      this.result *= num;
      return this;
   };
   div(num) {
      this.result /= num;
      return this;
   };
   alert() {
      setTimeout(() => {
         alert(this.result);
         return this;
      }, 5000);
   };
};
