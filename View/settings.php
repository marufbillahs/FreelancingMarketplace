<?php
    session_start();
?>
<html>
<head>
    <title>User Settings</title>
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
    }else {
    }
    ?>">Home</a>|
        <a href="profile.php">Profile</a>|
        <a href="inbox.php">Message</a>|
        <a href="settings.php">Settings</a>|
        <a href="../Control/logoutCheck.php">Logout</a>
    </nav>

    <section>
        <h2>User Settings</h2>

        <?php
            require_once("../Control/errorShowing.php");
        ?>

        <h3>Change Password</h3>
        <form action="../Control/settings_control.php" method="post">
           <table>
                
            <tr>
                <td>
                    <label for="currentPassword">Current Password:</label>
                </td>
                <td>
                    <input type="password" id="currentPassword" name="currentPassword" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="newPassword">New Password:</label>
                </td>
                <td>
                    <input type="password" id="newPassword" name="newPassword" required>
                </td>
            </tr>
            <tr><td><input type="submit" name="changePassword" value="Change Password"></td></tr>

            </table>
        </form>

        <h3>Change Email</h3>
        <form action="../Control/settings_control.php" method="post">
            <table>
            <tr>
                <td>
                    <label for="newEmail">New Email:</label>
                </td>
                <td>
                <input type="email" id="newEmail" name="newEmail" required><br>
                </td>
                
            </tr>
            <tr><td><input type="submit" name="changeEmail" value="Change Email"></td></tr>
            </table>
        </form>
    </section>

</body>
</html>
