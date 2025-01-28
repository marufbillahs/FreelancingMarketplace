<?php
    session_start();
    
?>
<html>
<head>
  <title>Job Posting Form</title>
  <link rel="stylesheet" href="../CSS/index.css">
</head>
<body>
  <nav align="right">
          <a href="client_dashboard.php">Home</a>|
          <a href="project.php">Projects</a>|
          <a href="profile.php">Profile</a>|
          <a href="jobpost.php">JobPost</a>|
          <a href="settings.php">Settings</a>|
          <a href="../Control/logoutCheck.php">Logout</a>
  </nav>
  
  <div>
    <table cellspacing="0" align="center">
            <tr height="10%">
                <td>
                  <fieldset>
                    <legend><h2>Post a Job</h2></legend>
                    <form action="../Control/clientjobspost_cn.php" method="post" onsubmit="return jobPostValidition();">
                      <label >Job Title:</label><br>
                      <input type="text" id="title" name="title" ><br><br>
                      
                      <label>Job Description:</label><br>
                      <textarea id="description" name="description" rows="4" cols="50" ></textarea><br><br>
                    
                      <label>Job Type:</label><br>
                      <input type="radio" id="hourly" name="job_type" value="hourly" checked>
                      <label>Hourly</label><br>
                      <input type="radio" id="fixed" name="job_type" value="fixed">
                      <label>Fixed</label><br><br>
                    
                      <label>Payment Amount:</label><br>
                      <input type="number" id="payment" name="payment" step="0.01" ><br><br>
                    
                      <input type="submit" value="Submit">
                    </form>
                    <?php require("../Control/errorShowing.php");?>
                  </fieldset>
                </td> 
        </table> 
  </div>

      <script src="../JS/jobPostValidation.js"></script>
</body>
</html>
