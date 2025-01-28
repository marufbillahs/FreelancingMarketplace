<?php
require_once('../Model/db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = json_decode(file_get_contents("php://input"), true);

    if (isset($postData['jobId'])) {
        $jobID = $postData['jobId'];

        $data=new myDB();
        $conn=$data->openCon();

        $result = $data->deleteJob($conn,$jobID);

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to delete job']);
        }
    } else {
        echo json_encode(['error' => 'Job ID not provided']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>