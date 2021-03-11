let num = 1;

while (true) {
    let value = prompt(`Previous result: ${num}. Enter a new number:`);
    if (Number.isNaN(value)) {
        console.error("Invalid number!");
        continue;
    }
    num += value;
    if (num > 10000);
        num = 1;
}