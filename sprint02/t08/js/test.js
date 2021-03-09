mocha.setup('bdd');
let assert = chai.assert;

describe("checkBrackets", () => {
    it ("Test 1", () => {
        assert.equal(checkBrackets('1)()(())2(()'), 2);
    });
    it ("Test 2", () => {
        assert.equal(checkBrackets('1)()'), 1);
    });
    it ("Test 3", () => {
        assert.equal(checkBrackets('(())2(()(('), 3);
    });
    it ("Test 4", () => {
        assert.equal(checkBrackets(NaN), -1);
    });
    it ("Test 5", () => {
        assert.equal(checkBrackets(null), -1);
    });
    it ("Test 6", () => {
        assert.equal(checkBrackets(undefined), -1);
    });
    it ("Test 7", () => {
        assert.equal(checkBrackets(0), -1);
    });
    it ("Test 8", () => {
        assert.equal(checkBrackets(1), -1);
    });
    it ("Test 9", () => {
        assert.equal(checkBrackets(''), -1);
    });
    it ("Test 10", () => {
        assert.equal(checkBrackets('0'), -1);
    });
});

mocha.run();