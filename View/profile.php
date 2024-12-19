<?php
    session_start();
?>
<html>
<head>
    <title>User Profile</title>
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

    <section align="center">
        <h2>User Profile</h2>
    </section>
    <div>
        <?php
            require_once("../Model/db.php");
            $username = $_SESSION['username'];

            //create instance of db class
            $db = new myDB();
            $connection = $db->openCon();

            $user =$db->getUserByUsername($connection,$username);
            if ($user) {
                echo "<p><strong>Username:</strong> " . $user['username'] . "</p>";
                echo "<p><strong>Email:</strong> " . $user['email'] . "</p>";
                echo "<p><strong>User Type:</strong> " . $user['userType'] . "</p>";
            } else {
                echo "<p>Error: User not found.</p>";
            }
        ?>
    </div>

</body>
</html>
