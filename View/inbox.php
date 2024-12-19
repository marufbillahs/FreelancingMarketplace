<?php
    session_start();
?>
<html>
<head>
    <title>Inbox</title>

</head>
<body>
    <nav align="right">
        <a href="<?php
        if ($_SESSION['userType'] === 'client') {
            echo 'client_dashboard.php';
        } elseif ($_SESSION['userType'] === 'freelancer') {
            echo 'freelancer_dashboard.php';
        } elseif ($_SESSION['userType'] === 'admin') {
            echo 'admin_dashboard.php';
        } elseif ($_SESSION['userType'] === 'moderator') {
            echo 'moderator_dashboard.php';
        } else {
        }
        ?>">Home</a>|
            <a href="profile.php">Profile</a>|
            <a href="inbox.php">Message</a>|
            <a href="settings.php">Settings</a>|
            <a href="../Control/logoutCheck.php">Logout</a>
    </nav>
    <section>

        

    </section>
</body>
</html>
