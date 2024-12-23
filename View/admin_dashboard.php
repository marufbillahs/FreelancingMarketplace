<?php
    session_start();
    
?> 
<html>
<head>
    
    <title>Admin DashBoard</title>

</head>
    
<body>
    <nav align="right">
        <a href = "admin_dashboard.php">Home |</a>
        <a href="profile.php">Profile</a>|
        <a href="inbox.php">Message</a>| 
        <a href="settings.php">Settings</a>|
        <a href="../Control/logoutCheck.php">Logout</a>

    </nav>

    <h3> Welcome <?php echo $_SESSION['username']; ?> !!</h3>

    
    <a href="viewUser.php">View and Edit Users</a> <br> <br>
    <a href="insertUser.php">Insert User</a>

</body>
</html>