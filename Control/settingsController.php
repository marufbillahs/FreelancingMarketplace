<?php
session_start();
require_once("../Model/db.php");




//create instance of database class
$data = new myDB();
$connection = $data->openCon();

//check if the request method is post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];

    if (isset($_POST['changePassword'])) {
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];

        $user = $data->getUserByUsername($connection,$username);

        if ($user && $currentPassword == $user['password']) {
            $data->updateUserPassword($connection,$username, $newPassword);
            $successMessage = "Password updated successfully!";
        } else {
            $errorMessage = "Current password is incorrect.";
        }        
    } elseif (isset($_POST['changeEmail'])) {
        $newEmail = $_POST['newEmail'];
        $data->updateUserEmail($connection,$username, $newEmail);
        $successMessage = "Email updated successfully!";
    }
}

if (isset($errorMessage)) {
    header("Location: ../View/settings.php?error=" . urlencode($errorMessage));
    exit();
} elseif (isset($successMessage)) {
    header("Location: ../View/settings.php?success=" . urlencode($successMessage));
    exit();
}
?>
