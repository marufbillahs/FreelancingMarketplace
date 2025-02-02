function validatePasswordForm() {
    let currentPassword = document.getElementById("currentPassword").value;
    let newPassword = document.getElementById("newPassword").value;
    let currentPasswordError = document.getElementById("currentPasswordError");
    let newPasswordError = document.getElementById("newPasswordError");

    currentPasswordError.innerHTML = "";
    newPasswordError.innerHTML = "";
    currentPasswordError.style.color = "red";
    newPasswordError.style.color = "red";

    if (currentPassword.trim() === "") {
        currentPasswordError.innerHTML = "Current password is required.";
        return false;
    }

    if (newPassword.trim() === "") {
        newPasswordError.innerHTML = "New password is required.";
        return false;
    }

    if (newPassword.length < 8) {
        newPasswordError.innerHTML = "Password must be at least 8 characters long.";
        return false;
    }

    let hasUpperCase = /[A-Z]/.test(newPassword);
    let hasLowerCase = /[a-z]/.test(newPassword);
    let hasDigit = /[0-9]/.test(newPassword);

    if (!(hasUpperCase && hasLowerCase && hasDigit)) {
        newPasswordError.innerHTML = "Password must include at least one uppercase letter, one lowercase letter, and one digit.";
        return false;
    }

    return true;
}

function validateEmailForm() {
    let newEmail = document.getElementById("newEmail").value;
    let newEmailError = document.getElementById("newEmailError");

    newEmailError.innerHTML = "";
    newEmailError.style.color = "red";

    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (newEmail.trim() === "") {
        newEmailError.innerHTML = "Email is required.";
        return false;
    }

    if (!emailPattern.test(newEmail)) {
        newEmailError.innerHTML = "Enter a valid email address.";
        return false;
    }

    return true;
}


function validImage() {
    let image = document.getElementById("image").value;
    let imageError = document.getElementById("imageError");

    imageError.innerHTML = "";  // Clear previous error message
    imageError.style.color = "red";  // Set error message color

    // Check if the image input is empty
    if (image.trim() === "") {
        imageError.innerHTML = "Image is required.";
        return false;
    }

    return true;
}
