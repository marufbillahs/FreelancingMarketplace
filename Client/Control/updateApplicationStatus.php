<?php
require_once('../Model/db.php');




if (isset($_GET['application_id']) && isset($_GET['status'])) {
    $applicationId = $_GET['application_id'];
    $status = $_GET['status'];

    $data =new myDB();
    $conn = $data->openCon();

    $result = $data->updateApplicationStatus($conn,$applicationId, $status);

    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Failed to update application status.']);
    }
} else {
    echo json_encode(['error' => 'Invalid parameters.']);
}
?>