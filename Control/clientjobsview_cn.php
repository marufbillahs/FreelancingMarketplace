<?php

// Include database connection
include("../Model/db.php");

$data = new myDB();
$conn = $data->openCon();

if (isset($_SESSION["user_id"])) {
    $client_id = $_SESSION["user_id"];

    $result = $data->ViewJobs($conn, $client_id);

    // Display jobs
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='job'>";
            echo "<h3>Tittle:</strong> "  . htmlspecialchars($row["title"]) . "</h3>";
            echo "<p><strong>Description:</strong> "  . htmlspecialchars($row["description"]) . "</p>";
            echo "<p><strong>Type:</strong> " . htmlspecialchars($row["job_type"]) . "</p>";
            echo "<p><strong>Payment:</strong> $" . htmlspecialchars($row["payment"]) . "</p>";
            echo "<form action='clientjobshandle.php' method='post'>";
            echo "<input type='hidden' name='job_id' value='" . htmlspecialchars($row["job_id"]) . "'>";
            echo "<button type='submit' name='status' value='completed'>Status</button>";
            echo "</form>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>No jobs posted yet.</p>";
    }
}



// Close connection
$conn->close();
?>