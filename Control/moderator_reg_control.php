<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $errors = [];

    // Validate Full Name (at least 4 characters)
    if (empty($_POST["fullName"]) || strlen($_POST["fullName"]) < 4) 
    {
        $errors[] = "Full Name must be at least 4 characters.";
    }

    // Validate Email (required and must contain aiub.edu domain)
    if (empty($_POST["email"])) 
    {
        $errors[] = "Email is required.";
    } 
    elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) || substr($_POST["email"], -9) !== "@aiub.edu") 
    {
        $errors[] = "Email must be a valid aiub.edu email address.";
    }

    // Validate Phone (only numbers)
    if (empty($_POST["phone"])) 
    {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match('/^[0-9]+$/', $_POST["phone"])) {
        $errors[] = "Phone number must contain only numbers.";
    }

    // Validate Security Question (must select one option)
    if (empty($_POST["securityQuestion"])) 
    {
        $errors[] = "Please select a security question.";
    }

    // Validate Password Confirmation
    if (empty($_POST["password"]) || empty($_POST["confirmPassword"])) 
    {
        $errors[] = "Password and confirmation are required.";
    } elseif ($_POST["password"] !== $_POST["confirmPassword"]) 
    {
        $errors[] = "Passwords do not match.";
    }

    // Check if there are any errors
    if (count($errors) > 0) {
        // Display errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
     else 
     {
        /* // Prepare data for JSON
        $data = [
            "fullName" => $_POST["fullName"],
            "email" => $_POST["email"],
            "phone" => $_POST["phone"],
            "dob" => $_POST["dob"],
            "gender" => $_POST["gender"],
            "presentAddress" => $_POST["presentAddress"],
            "permanentAddress" => $_POST["permanentAddress"],
            "username" => $_POST["username"],
            "securityQuestion" => $_POST["securityQuestion"],
            "securityAnswer" => $_POST["securityAnswer"]
        ];

        Convert data to JSON format
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);

         Write JSON to a file
        $file = "../Data/userdata.json";
        if (file_put_contents($file, $jsonData . PHP_EOL, FILE_APPEND)) 
        {
            echo "<p>Registration successful! Data has been saved.</p>";
        } 
        else 
        {
            echo "<p>Failed to save data. Please try again.</p>";
        }

        $_SESSION["fullName"] = $_REQUEST["fullName"];
        $_SESSION["email"] = $_REQUEST["email"];
        $_SESSION["phone"] = $_REQUEST["phone"];
        $_SESSION["dob"] = $_REQUEST["dob"];
        $_SESSION["gender"] = $_REQUEST["gender"];
        $_SESSION["presentAddress"] = $_REQUEST["presentAddress"];
        $_SESSION["permanentAddress"] = $_REQUEST["permanentAddress"];
        $_SESSION["username"] = $_REQUEST["username"];
        $_SESSION["securityQuestion"] = $_REQUEST["securityQuestion"];
        $_SESSION["securityAnswer"] = $_REQUEST["securityAnswer"];

        header("Location:../view/profile.php");

        */

    }
}

?>