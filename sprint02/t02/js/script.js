let animalName = prompt("What animal is the superhero most similar to?", '');
let animalNameExp = /^[a-zA-Z]{1,20}$/;

if (animalName == '') {
   alert("First and last name must be filled out!");
   throw '';
}
else if (!animalName.match(animalNameExp)) {
   alert("Name must contain letters only!");
   throw '';
}

let gender = prompt("Is the superhero male or female? Leave blank if unknown or other.", '');
let genderExp = /^(fe)?male$/i;

if (gender != '') {
   if (!gender.match(genderExp)) {
      alert("Male or female only!");
      throw '';
   }
}

let age = prompt("How old is the superhero?", '');
let ageExp = /^[1-9]\d{0,4}$/;

if (age == '') {
   alert("Age must be filled out!");
   throw '';
}
else if (!age.match(ageExp)) {
   alert("Digits only!");
   throw '';
}

let suffix;

if (gender == '')
   suffix = age < 18 ? 'kid' : 'hero';
else if (gender.length == 4)
   suffix = age < 18 ? 'boy' : 'man';
else
   suffix = age < 18 ? 'girl' : 'woman';

alert(`The superhero name is: ${animalName}-${suffix}!`);
