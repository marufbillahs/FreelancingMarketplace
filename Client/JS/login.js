function validateLoginForm() {
    const username = document.querySelector('input[name="username"]').value.trim();
    const password = document.querySelector('input[name="password"]').value.trim();
    let isValid = true;

    document.getElementById('usernameError').innerHTML = '';
    document.getElementById('passwordError').innerHTML = '';



    if (username === "") {
        document.getElementById('usernameError').innerHTML = 'please enter username.';
        document.getElementById('usernameError').style.color = 'red';
        isValid = false;
    }

    if (password === "") {
        document.getElementById('passwordError').innerHTML = 'please enter password.';
        document.getElementById('passwordError').style.color = 'red';
        isValid = false;
    }

    return isValid;
}
