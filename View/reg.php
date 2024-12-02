<?php
require '../control/reg_control.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
</head>
<body>
    <div class="container" align="center">
        <h2>Sign Up for Client</h2>

        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="fullname">Full Name:</label></td>
                    <td>
                        <input type="text" id="fullname" name="fullname" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $fullnameError; ?></td>
                </tr>
                <tr>
                    <td><label for="username">User Name:</label></td>
                    <td>
                        <input type="text" id="username" name="username" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $usernameError; ?></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td>
                        <input type="email" id="email" name="email" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $emailError; ?></td>
                </tr>
                <tr>
                    <td><label for="phone">Phone Number:</label></td>
                    <td>
                        <input type="tel" id="phone" name="phone" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $phoneError; ?></td>
                </tr>
                <tr>
                    <td><label for="dob">Date of Birth:</label></td>
                    <td>
                        <input type="date" id="dob" name="dob" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $dobError; ?></td>
                </tr>
                <tr>
                    <td><label for="gender">Gender:</label></td>
                    <td>
                        <select id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $genderError; ?></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td>
                        <input type="password" id="password" name="password" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $passwordError; ?></td>
                </tr>
                <tr>
                    <td><label for="repassword">ReType Password:</label></td>
                    <td>
                        <input type="password" id="repassword" name="repassword" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $repasswordError; ?></td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td>
                        <textarea id="address" name="address" rows="3" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $addressError; ?></td>
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
                    <td colspan="2" align="center"><button type="submit">Sign Up</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

