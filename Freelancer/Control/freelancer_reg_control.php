<?php
// Initialize error message variables
$fullnameError = "";
$emailError = "";
$passwordError = "";
$termsError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hasError = 0;

    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $terms = isset($_POST['terms']);

    // Validate Full Name - alphabets only and at least one uppercase letter
    if (empty($fullname) || !preg_match("/^[A-Za-z]*[A-Z]+[A-Za-z]*$/", $fullname)) {
        $fullnameError = "Full Name must contain only alphabets and at least one uppercase letter.";
        $hasError++;
    }

    // Validate Email - must contain "@" and end with ".xyz" domain
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/@.*\.xyz$/", $email)) {
        $emailError = "Email must be valid and end with the '.xyz' domain.";
        $hasError++;
    }

    // Validate Password - must contain at least one numeric character
    if (empty($password) || !preg_match("/[0-9]/", $password)) {
        $passwordError = "Password must contain at least one numeric character.";
        $hasError++;
    }

    // Validate Terms Agreement
    if (!$terms) {
        $termsError = "You must agree to the Terms and Conditions.";
        $hasError++;
    }

    // If no errors, save data to JSON file
    if ($hasError > 0) {
        echo "Please correct the following errors:<br>";
        echo $fullnameError ? $fullnameError . "<br>" : "";
        echo $emailError ? $emailError . "<br>" : "";
        echo $passwordError ? $passwordError . "<br>" : "";
        echo $termsError ? $termsError . "<br>" : "";
    } else {

        /*
        // Prepare the data array
        $data = [
            "fullname" => $fullname,
            "email" => $email,
            "password" => $password,
        ];

        // Encode the data to JSON
        $json = json_encode($data);

        // Save the data to a JSON file
        file_put_contents("../data/userdata.json", $json);

        echo "Registration successful! Data saved to JSON file.";

        */
    }
}
?>
