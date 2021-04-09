let pass1 = document.getElementById("password");
let pass2 = document.getElementById("confirm");
let form = document.getElementById("reg");

form.addEventListener('submit', event => {
    if (pass1.value !== pass2.value) {
        event.preventDefault();
        alert("Passwords does not match!");
    }
})