<?php
session_start();
require_once "../Model/db.php"; // Adjust the path to where myDB.php is located

// Initialize error message variables
$usernameError = "";
$passwordError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = 0;

    // Retrieve form data
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    // Validate Username
    if (empty($username)) {
        $usernameError = "Please enter a username";
        $hasError++;
    }

    // Validate Password
    if (empty($password)) {
        $passwordError = "Please enter a password";
        $hasError++;
    }

    // If no errors, check login credentials
    if ($hasError == 0) {
        // Create an instance of the database class
        $mydb = new myDB();
        $conobj = $mydb->openCon();

        // Check login credentials
        $result = $mydb->checkLogin($conobj, $username, $password);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["username"] = $row["username"];
            $_SESSION["userType"] = $row["userType"];

            // Redirect based on user type
            if ($row["userType"] == "client") {
                header("Location: ../View/client_dashboard.php");
            } else if ($row["userType"] == "admin") {
                header("Location: ../View/admin_dashboard.php");
            } else if ($row["userType"] == "freelancer") {
                header("Location: ../View/freelancer_dashboard.php");
            } else if ($row["userType"] == "moderator") {
                header("Location: ../View/moderator_dashboard.php");
            }
        } else {
            echo "Invalid username or password.";
        }

        // Close the database connection
        $mydb->closeCon($conobj);
    } else {
        echo "Please correct the errors and try again.";
    }
}
?>