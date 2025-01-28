<?php
if (isset($_POST['job_id'])) {
    $jobId = $_POST['job_id'];
    require_once("../Model/db.php");

    $db= new myDB();
    $conn = $db->openCon();

    $jobDetails = $db->searchJobsByJobID($conn,$jobId);
    $jobJson = json_encode($jobDetails);
    echo $jobJson;
} else {
    echo "No job ID provided.";
}
?>
