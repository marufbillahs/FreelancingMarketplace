<?php
    session_start();
    require_once("../Control/authCheck.php");
    checkLoggedIn();
?>
<html>
<head>
    <title>User Settings</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <script src="../JS/settings.js" defer></script>
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
        }
        ?>">Home</a> |
        <a href="profile.php">Profile</a> |
        <a href="inbox.php">Message</a> |
        <a href="settings.php">Settings</a> |
        <a href="../Control/logoutCheck.php">Logout</a>
    </nav>

    <section>
        <h2>User Settings</h2>

        <?php require_once("../Control/errorShowing.php"); ?>

        <h3>Change Password</h3>
        <form onsubmit="return validatePasswordForm();" action="../Control/settings_control.php" method="post">
            <table>
                <tr>
                    <td><label for="currentPassword">Current Password:</label></td>
                    <td>
                        <input type="password" id="currentPassword" name="currentPassword">
                        <span id="currentPasswordError" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="newPassword">New Password:</label></td>
                    <td>
                        <input type="password" id="newPassword" name="newPassword">
                        <span id="newPasswordError" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="changePassword" value="Change Password">
                    </td>
                </tr>
            </table>
        </form>

        <h3>Change Email</h3>
        <form onsubmit="return validateEmailForm();" action="../Control/settings_control.php" method="post">
            <table>
                <tr>
                    <td><label for="newEmail">New Email:</label></td>
                    <td>
                        <input type="email" id="newEmail" name="newEmail">
                        <span id="newEmailError" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="changeEmail" value="Change Email"></td>
                </tr>
            </table>
        </form>

        <h3>Profile Picture</h3>
        <form onsubmit="return validImage();" action="../Control/settings_control.php" method="post" enctype="multipart/form-data">
           <table>
              <tr>
                 <td><input type="file" name="image" id="image"></td>
                <td><span id="imageError" class="error"></span></td>
              </tr>
            <tr>
            <td><input type="submit" name="changeProfilePicture" value="Upload Picture"></td>
            </tr>
          </table>
          </form>

    </section>

</body>
</html>
