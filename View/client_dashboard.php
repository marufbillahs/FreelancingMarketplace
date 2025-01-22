<?php
    session_start();

?>
<html>
<head>
    <title>Client Dashboard</title>
    <link rel="stylesheet" href="../CSS/profile.css">
   
</head>
<body>
<nav align="right">
    <a href="client_dashboard.php">Home</a>|
    <a href="profile.php">Profile</a>|
    <a href="inbox.php">Message</a>|
    <a href="settings.php">Settings</a>|
    <a href="../Control/logoutCheck.php">Logout</a>
    <br><br>
    <form action="../Control/searchFreelancer.php" method="GET">
        <label for="search"><strong>Search Freelancers:</strong></label>
        <input type="text" id="search" name="search" placeholder="Enter username or user ID">
        <input type="submit" value="Search">
    </form>
</nav>

<section>
    <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
    <a href="clientjobspost.php">
    <button>JobPost</button>
</a>

</section>
<section style="max-width: 1200px; margin: auto; float: none; width: 100%;">
    <fieldset>
        <legend><h2>Posted Jobs</h2></legend>
        <?php
            include("../Control/clientjobsview_cn.php");
        ?>
    </fieldset>
</section>
</body>
</html>
