<?php
require '../Control/admin_reg_control.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Registration</title>
</head>
<body>
    <div class="container" align="center">
    <h2>Admin Registration</h2>

    <form action="" method="POST" enctype="multipart/from-data">
        <table>
            <tr>
                <td><label for="fullname">Full Name:</label></td>
                <td><input type="text" id="fullname" name="fullname" required></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $fullnameError; ?></td>
            </tr>

            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" id="username" name="username" required></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $usernameError; ?></td>
            </tr>

            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $emailError; ?></td>
            </tr>

            <tr>
                <td><label for="nid">National ID (NID):</label></td>
                <td><input type="text" id="nid" name="nid" required></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $nidError; ?></td>
            </tr>

            <tr>
                <td><label for="phone">Phone Number:</label></td>
                <td><input type="tel" id="phone" name="phone" required></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $phoneError; ?></td>
            </tr>

            <tr>
                <td><label for="dob">Date of Birth:</label></td>
                <td><input type="date" id="dob" name="dob" required></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $dobError; ?></td>
            </tr>

            <tr>
                <td><label>Gender:</label></td>
                <td>
                    <input type="radio" id="male" name="gender" value="male" required>
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="female" required>
                    <label for="female">Female</label><br>
                    <input type="radio" id="other" name="gender" value="other" required>
                    <label for="other">Other</label>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $genderError; ?></td>
            </tr>

            <tr>
                <td><label for="present_address">Present Address:</label></td>
                <td><textarea id="present_address" name="present_address" rows="4" required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $present_addressError; ?></td>
            </tr>

            <tr>
                <td><label for="permanent_address">Permanent Address:</label></td>
                <td><textarea id="permanent_address" name="permanent_address" rows="4" required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $parmanent_addressError; ?></td>
            </tr>

            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $passwordError; ?></td>
            </tr>

            <tr>
                <td><label for="re_password">Re-Type Password:</label></td>
                <td><input type="password" id="re_password" name="re_password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $re_passwordError; ?></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">
                         Yes, I understand and agree to the Terms of Service, including the 
                        <a href="#" target="_blank">User Agreement</a> and 
                        <a href="#" target="_blank">Privacy Policy</a>.
                    </label>
                </td>
            </tr>
            <tr>
                    <td></td>
                    <td><?php echo $termsError; ?></td>
            </tr>

            <tr>
                <td colspan="2" align="center"><button type="submit">Register</button></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
