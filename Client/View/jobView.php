<?php
    session_start();
    require_once("../Control/authCheck.php");
    checkLoggedIn();

    if (isset($_GET['job_id'])) {
        $jobId = $_GET['job_id'];
        $_SESSION['jobid'] = $jobId;
    }
?>
<html>
<head>
    <title>Client Dashboard</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/jobView.css">
    <script src="../JS/clientJobView.js"></script>
    <script src="../JS/appliedFreelancer.js"></script>
</head>
<body>
<nav align="right">
    <a href="client_dashboard.php">Home</a>|
    <a href="profile.php">Profile</a>|
    <a href="settings.php">Settings</a>|
    <a href="../Control/logoutCheck.php">Logout</a>
    <br>
</nav>
<section>
        <fieldset>
            <legend><h2>Job Info</h2></legend>
            <div id="job"></div>
        </fieldset>
        <fieldset>
            <legend><h2>Applied Freelacer</h2></legend>
            <div id="applicationList"></div>
        </fieldset>
        <fieldset>
            <legend><h2>Update Job</h2></legend>
            <form onsubmit="return validateJobForm()"; action="../Control/clientJobUpdate.php" method="post">
                <label>Job Title:</label><br>
                <input type="text" id="title" name="title"><br><br>
                <label>Job Description:</label><br>
                <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
                <label>Job Type:</label><br>
                <input type="radio" id="hourly" name="job_type" value="hourly">
                <label>Hourly</label><br>
                <input type="radio" id="fixed" name="job_type" value="fixed">
                <label>Fixed</label><br><br>
                <label>Payment Amount:</label><br>
                <input type="number" id="payment" name="payment" step="0.01"><br><br>
                <input type="submit" value="Update">
            </form>
        </fieldset>
</section>
</body>
</html>