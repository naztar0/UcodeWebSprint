let validator = {
    set: function(obj, prop, value) {
        if (prop === 'age') {
            if (!Number.isInteger(value)) {
                throw new TypeError('The age is not an integer');
            }
            if (value > 200) {
                throw new RangeError('The age is invalid');
            }
        }
        else if (prop === 'gender') {
            if (!(value === 'male' || value === 'female')) {
                throw new TypeError('The gender is invalid');
            }
        }
  
        obj[prop] = value;
    }
};
