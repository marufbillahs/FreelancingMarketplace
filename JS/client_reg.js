function validateSignUpForm() {
    let fullname = document.getElementById('fullname').value;
    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;
    let dob = document.getElementById('dob').value;
    let gender = document.getElementById('gender').value;
    let password = document.getElementById('password').value;
    let repassword = document.getElementById('repassword').value;
    let address = document.getElementById('address').value;
    let terms = document.getElementById('terms').checked;

    let isValid = true;

    // Clear previous error messages
    document.getElementById('fullnameError').innerText = '';
    document.getElementById('usernameError').innerText = '';
    document.getElementById('emailError').innerText = '';
    document.getElementById('phoneError').innerText = '';
    document.getElementById('dobError').innerText = '';
    document.getElementById('genderError').innerText = '';
    document.getElementById('passwordError').innerText = '';
    document.getElementById('repasswordError').innerText = '';
    document.getElementById('addressError').innerText = '';
    document.getElementById('termsError').innerText = '';

    // Fullname validation
    if (fullname.length > 40 || fullname.trim() === '') {
        document.getElementById('fullnameError').innerText = 'Full Name should not exceed 40 characters.';
        document.getElementById('fullnameError').style.color = 'red';
        isValid = false;
    }

    // Username validation
    if (username.trim() === '') {
        document.getElementById('usernameError').innerText = 'Username is required.';
        document.getElementById('usernameError').style.color = 'red';
        isValid = false;
    }

    // Email validation
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById('emailError').innerText = 'Enter a valid email address.';
        document.getElementById('emailError').style.color = 'red';
        isValid = false;
    }

    // Phone validation
    let phoneRegex = /^0[0-9]{10}$/;
    if (!phoneRegex.test(phone)) {
        document.getElementById('phoneError').innerText = 'Phone number must start with 0 and be exactly 11 digits.';
        document.getElementById('phoneError').style.color = 'red';
        isValid = false;
    }

    // Date of Birth validation
    if (dob.trim() === '') {
        document.getElementById('dobError').innerText = 'Date of Birth is required.';
        document.getElementById('dobError').style.color = 'red';
        isValid = false;
    }

    // Gender validation
    if (gender === '') {
        document.getElementById('genderError').innerText = 'Please select a gender.';
        document.getElementById('genderError').style.color = 'red';
        isValid = false;
    }

    // Password validation
    if (password.length < 8) {
        document.getElementById('passwordError').innerText = 'Password must be at least 8 characters long.';
        document.getElementById('passwordError').style.color = 'red';
        isValid = false;
    } else {
        let hasUpperCase = false;
        let hasLowerCase = false;
        let hasDigit = false;

        for (let i = 0; i < password.length; i++) {
            let char = password[i];
            if (char >= 'A' && char <= 'Z') {
                hasUpperCase = true;
            } else if (char >= 'a' && char <= 'z') {
                hasLowerCase = true;
            } else if (char >= '0' && char <= '9') {
                hasDigit = true;
            }
        }

        if (!(hasUpperCase && hasLowerCase && hasDigit)) {
            document.getElementById('passwordError').innerText = 'Password must include at least one uppercase letter, one lowercase letter, and one digit.';
            document.getElementById('passwordError').style.color = 'red';
            isValid = false;
        }
    }

    // Re-password validation
    if (password !== repassword) {
        document.getElementById('repasswordError').innerText = 'Passwords do not match.';
        document.getElementById('repasswordError').style.color = 'red';
        isValid = false;
    }

    // Address validation
    if (address.trim() === '') {
        document.getElementById('addressError').innerText = 'Address is required.';
        document.getElementById('addressError').style.color = 'red';
        isValid = false;
    }

    // Terms validation
    if (!terms) {
        document.getElementById('termsError').innerText = 'You must agree to the terms of service.';
        document.getElementById('termsError').style.color = 'red';
        isValid = false;
    }

    return isValid;
}
