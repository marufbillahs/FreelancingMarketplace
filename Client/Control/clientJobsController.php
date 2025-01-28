<?php
session_start();
require_once("../Model/db.php");
if (isset($_SESSION['user_id']) && $_SESSION['userType'] === 'client') {
    $client_id = $_SESSION['user_id'];

    $db = new myDB();
    $conn = $db->openCon();

    $jobs = $db->getJobsByClientId($conn,$client_id);
    echo json_encode($jobs);
} else {
    header("Location: ../Client/view/login.php");
    exit();
}
?>
