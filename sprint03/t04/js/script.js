let houseMixin = {
    wordReplace(str1, str2) {
        // this.descryption = 'ok';
        // console.log(this.description);

        let desc = this.description.split(' ');
        for (let i = 0; i < desc.length; i++)
            if (desc[i] === str1)
                desc[i] = str2;
        this.description = desc.join(' ');
        return this;
    },
    wordInsertAfter(str1, str2) {
        let desc = this.description.split(' ');
        for (let i = 0; i < desc.length; i++)
            if (desc[i] === str1) {
                // not working
                desc.slice(i, 0, str2);
            }
        this.description = desc.join(' ');
        return this;
    },
    wordDelete(str) {
        let desc = this.description.split(' ');
        for (let i = 0; i < desc.length; i++)
            if (desc[i] === str)
                // not working
                desc.slice(i, 1);
        this.description = desc.join(' ');
        return this;
    },
    wordEncrypt() {
        this.description = this.description.replace(/[a-z]/gi, i =>
            "NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm"[
            "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz".indexOf(i)]);
        return this;
    },
    wordDecrypt() {
        this.description = this.description.replace(/[a-z]/gi, i =>
            "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"[
            "NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm".indexOf(i)]);
        return this;
    }
}

const house = new HouseBuilder('88 Crescent Avenue',
    'Spacious town house with wood flooring, 2-car garage, and a back patio.',
    'J. Smith', 110, 5);
Object.assign(house, houseMixin);
console.log(house.getDaysToBuild());
// 220
console.log(house.description);
// Spacious town house with wood flooring, 2-car garage, and a back patio.
house.wordReplace("wood", "tile");
console.log(house.description);

// Spacious town house with tile flooring, 2-car garage, and a back patio.
house.wordDelete("town ");
console.log(house.description);
// Spacious house with tile flooring, 2-car garage, and a back patio.
house.wordInsertAfter ("with", "marble");
console.log(house.description);
// Spacious house with marble tile flooring, 2-car garage, and a back patio.
house.wordEncrypt();
console.log(house.description);
// Fcnpvbhf ubhfr jvgu zneoyr gvyr sybbevat, 2-pne tnentr, naq n onpx cngvb.
house.wordDecrypt();
console.log(house.description);
// Spacious house with marble tile flooring, 2-car garage, and a back patio.
