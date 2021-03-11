String.prototype.removeDuplicates = function () {
    let unique = new Set(this.valueOf().split(' '));
    unique.delete('');
    return Array.from(unique).join(' ');
};
