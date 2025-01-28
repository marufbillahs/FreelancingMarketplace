<?php
session_start();
require_once("../Model/db.php");
$jobId = $_SESSION['jobid'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_title = $_POST['title'];
    $job_description = $_POST['description'];
    $job_type = $_POST['job_type'];
    $payment = $_POST['payment'];
    $data = new myDB();
    $conn=$data->openCon();
    $data->updateJob($conn,$jobId, $job_title, $job_description, $job_type, $payment);
    header("Location: ../view/JobView.php?job_id=$jobId");
    exit();
}
?>