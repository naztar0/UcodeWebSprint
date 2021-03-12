function* generator(){
    var num = 1;
    while (true) {
      var n = yield num;
      num += n;
      if (num > 10000)
        num = 1;
    }
  }

let gen = generator();
let n = 1;

while (true) {
    let nTmp = prompt(`Previous result: ${gen.next(n).value}. Enter a new number:`);
    if (isNaN(nTmp)) {
        console.error("Invalid number!");
        break;
    }
    n = parseInt(nTmp);
}
