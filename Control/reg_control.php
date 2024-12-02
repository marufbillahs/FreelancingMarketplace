<?php

$fullnameError = "";
$usernameError = "";
$emailError = "";
$phoneError = "";
$dobError = "";
$genderError = "";
$passwordError = "";
$repasswordError = "";
$addressError = "";
$termsError = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hasError = 0; 

    
    $fullname = $_REQUEST["fullname"];
    $username = $_REQUEST["username"];
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];
    $dob = $_REQUEST["dob"];
    $gender = $_REQUEST["gender"];
    $password = $_REQUEST["password"];
    $repassword = $_REQUEST["repassword"];
    $address = $_REQUEST["address"];
    $terms = isset($_REQUEST["terms"]);

    
    if (empty($fullname) || strlen($fullname) > 40) {
        $fullnameError = "Full Name should not exceed 40 characters.";
        $hasError++;
    }

    
    if (empty($username)) {
        $usernameError = "Please enter a username";
        $hasError++;
    }


    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Please enter a valid email address";
        $hasError++;
    }


    if (empty($phone) || !preg_match('/^0[0-9]{10}$/', $phone)) {
        $phoneError = "Phone number must start with 0 and be exactly 11 digits.";
        $hasError++;
    }

    
    if (empty($dob)) {
        $dobError = "Please enter your date of birth.";
        $hasError++;
    }

    
    if (empty($gender)) {
        $genderError = "Please select a gender";
        $hasError++;
    }

    
    if (empty($password) || strlen($password) < 6 || !preg_match('/[a-z]/', $password)) {
        $passwordError = "Password must be at least 6 characters long and contain at least one lowercase letter.";
        $hasError++;
    }

    
    if ($password !== $repassword) {
        $repasswordError = "Passwords do not match.";
        $hasError++;
    }

    
    if (empty($address)) {
        $addressError = "Please enter your address.";
        $hasError++;
    }

    
    if (!$terms) {
        $termsError = "You must agree to the terms of service.";
        $hasError++;
    }

 

    
    if ($hasError>0) {

        echo "Please insert correct data.";
        
    } else {

        
        $data = [
            "fullname" => $fullname,
            "username" => $username,
            "email" => $email,
            "phone" => $phone,
            "dob" => $dob,
            "gender" => $gender,
            "password" => $password,
            "repassword" => $repassword,
            "address" => $address
        ];

        
        $json = json_encode($data);

        
        file_put_contents("../Data/userdata.json", $json);

        echo "Registration successful! Data saved to JSON file.";
        
    }
}
?>
