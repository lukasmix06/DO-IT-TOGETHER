//alert("Hejka, wszystkim!");

const form = document.querySelector("form");
const email_input = form.querySelector('input[name="email"]');
const confirmed_password_input = form.querySelector('input[name="confirmedPassword"]')

//funkcje walidujące
function isEmailCorrect(email) { //regex
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail() {
    setTimeout(function() {
            markValidation(email_input, isEmailCorrect(email_input.value))
        },
        1000
    );
}

function validatePassword() {
    setTimeout(function() {
            const condition = arePasswordsSame(
                confirmed_password_input.previousElementSibling.value,
                confirmed_password_input.value
            );
            markValidation(confirmed_password_input, condition);
        },
        1000
    );
}

email_input.addEventListener('keyup', validateEmail);
confirmed_password_input.addEventListener('keyup', validatePassword);