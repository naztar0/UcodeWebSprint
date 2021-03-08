function Calculator() {
   this.result;
   function init(num) {
      this.result = num;
   }
   function add(num) {
      this.result += num;
   }
   function sub(num) {
      this.result -= num;
   }
   function mul(num) {
      this.result *= num;
   }
   function div(num) {
      this.result /= num;
   }
   function alert() {
      alert(result);
   }
}


const calc = new Calculator();
console.log(
   calc
      .init(2)
      .add(2)
      .mul(3)
      .div(4)
      .sub(2).result // 1
);

calc.alert();