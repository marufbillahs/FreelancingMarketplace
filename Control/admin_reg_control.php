<?php
session_start();
// Initialoze error message variables.
$fullnameError = "";
$usernameError = "";
$emailError = "";
$nidError = "";
$phoneError = "";
$dobError = "";
$genderError = "";
$present_addressError = "";
$parmanent_addressError = "";
$passwordError = "";
$re_passwordError = "";
$termsError = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hasError = 0; 

    // Retrieve form data.
    $fullname = $_REQUEST["fullname"];
    $username = $_REQUEST["username"];
    $email = $_REQUEST["email"];
    $nid = $_REQUEST["nid"];
    $phone = $_REQUEST["phone"];
    $dob = $_REQUEST["dob"];
    $gender = $_REQUEST["gender"];
    $present_address = $_REQUEST["present_address"];
    $permanent_address = $_REQUEST["permanent_address"];
    $password = $_REQUEST["password"];
    $re_password = $_REQUEST["re_password"];
    $terms = isset($_REQUEST["terms"]);
    
   


    // Validate Full Name.
    if (empty($fullname) || preg_match('/[0-9]/', $fullname)) {
        $fullnameError = "Full Name should not contain any numbers.";
        $hasError++;
    }

    // Validate Username
    if (empty($username)) {
        $usernameError = "Please enter a username";
        $hasError++;
    }

    // Validate Email.
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Please enter a valid email address with an '@' symbol.";
        $hasError++;
    }

     // Validate NID.
     if (empty($nid) || !ctype_digit($nid)) {
        $nidError = "NID should only contain numbers.";
        $hasError++;
    }

    // Validate Phone Number.
    if (empty($phone) ||strlen($phone) > 11 || !ctype_digit($phone)) {
        $phoneError = "Phone number must not be longer than 11 digits and should only contain numbers.";
        $hasError++;
    }

    // Validate Date Of Birth.
    if (empty($dob) || !strtotime($dob)) {
        $dobError = "Please enter a valid date of birth.";
        $hasError++;
    }

    // Validate Gender.
    if (empty($gender)) {
        $genderError = "Please select a gender";
        $hasError++;
    }

     // Validate Address.
     if (empty($present_address)) {
        $present_addressError = "Please enter your address.";
        $hasError++;
    }

    // Parmanent Address.
    if (empty($permanent_address)) {
        $parmanent_addressError = "Please enter your address.";
        $hasError++;
    }


    // Validate Password.
    if (empty($password) || !preg_match('/[@#$&]/', $password)) {
        $passwordError = "Password must contain at least one special character (@, #, $, or &).";
        $hasError++;
    }

    
    // Validate Password Confirmation
    if ($password !== $re_password) {
        $re_passwordError = "Passwords do not match.";
        $hasError++;
    }

    // Validate Terms Agreement
    if (!$terms) {
        $termsError = "You must agree to the terms of service.";
        $hasError++;
    }

 

    // If no errors, save data to JSON file
    if ($hasError>0) {

        echo "Please insert correct data.";
        
    } else
    
    {
        /*
        // Prepare the data array
        $data = [
            "fullname" => $fullname,
            "username" => $username,
            "email" => $email,
            "nid" => $nid,
            "phone" => $phone,
            "dob" => $dob,
            "gender" => $gender,
            "present_address" => $present_address,
            "parmanent_address" => $permanent_address,
            "password" => $password,
            "re_password" => $re_password,
            
        ];

        

         // Encode the data to JSON with pretty print
            $json = json_encode($data, JSON_PRETTY_PRINT);

        // Save the data to a JSON file
            file_put_contents("../Data/userdata.json", $json);
   

        echo "Registration successful! Data saved to JSON file.";

    
    $_SESSION["fullname"]=$_REQUEST["fullname"];
    $_SESSION["username"]=$_REQUEST["username"];
    $_SESSION["email"]=$_REQUEST["email"];
    $_SESSION["nid"]=$_REQUEST["nid"];
    $_SESSION["phone"]=$_REQUEST["phone"];
    $_SESSION["dob"]=$_REQUEST["dob"];
    $_SESSION["gender"]=$_REQUEST["gender"];
    $_SESSION["present_addres"]=$_REQUEST["present_addres"];
    $_SESSION["parmanent_address"]=$_REQUEST["parmanent_address"];

    header("location: ../view/profile.php");
    */
    
    
        
    }
}
?>




