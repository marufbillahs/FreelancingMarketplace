<?php
    session_start();
    
    if (isset($_GET['job_id'])) {
        $jobId = $_GET['job_id'];
        $_SESSION['jobid'] = $jobId;
    }
?>
<html>
<head>
    <title>Client Dashboard</title>
</head>
<body>
<nav align="right">
    <a href="client_dashboard.php">Home</a>|
    <a href="profile.php">Profile</a>|
    <a href="settings.php">Settings</a>|
    <a href="../Control/logoutCheck.php">Logout</a>
    <br>
</nav>
<section style="max-width: 800px; margin: auto;">
        <fieldset>
            <legend><h2>Job Info</h2></legend>
           <?php
                require_once '../Control/jobinfo_cn.php';
            ?>
        </fieldset>
        <fieldset>
            <legend><h2>Applied Freelacer</h2></legend>
            <div id="applicationList"></div>
        </fieldset>
        <fieldset>
            <legend><h2>Update Job</h2></legend>
            <form action="../Control/clientJobUpdate.php" method="post">
                <label>Job Title:</label><br>
                <input type="text" id="title" name="title" required><br><br>
                <label>Job Description:</label><br>
                <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
                <label>Job Type:</label><br>
                <input type="radio" id="hourly" name="job_type" value="hourly" checked>
                <label>Hourly</label><br>
                <input type="radio" id="fixed" name="job_type" value="fixed">
                <label>Fixed</label><br><br>
                <label>Payment Amount:</label><br>
                <input type="number" id="payment" name="payment" step="0.01" required><br><br>
                <input type="submit" value="Update">
            </form>
        </fieldset>
</section>
</body>
</html>