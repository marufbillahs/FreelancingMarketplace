<?php
// Initialize all variables to avoid warnings
$fullnameError = $usernameError = $dobError = $genderError = "";
$emailError = $passwordError = $confirmPasswordError = $skillsError = $termsError = "";

// Include your registration control logic here
require '../Control/freelancer_reg_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancer Signup</title>
</head>
<body>
    <div class="container" align="center">
        <h2>Signup for Freelancer</h2>

        <form action="" method="POST" enctype="multipart/form-data">
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
                    <td><label for="username">Username:</label></td>
                    <td>
                        <input type="text" id="username" name="username" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                 <td><?php echo $usernameError; ?></td>
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
                    <td><label for="confirm_password">Confirm Password:</label></td>
                    <td>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $confirmPasswordError; ?></td>
                </tr>
                <tr>
                    <td><label>Skills:</label></td>
                    <td>
                        <input type="checkbox" id="web_dev" name="skills[]" value="Web Development">
                        <label for="web_dev">Web Development</label><br>
                        <input type="checkbox" id="graphic_design" name="skills[]" value="Graphic Design">
                        <label for="graphic_design">Graphic Design</label><br>
                        <input type="checkbox" id="content_writing" name="skills[]" value="Content Writing">
                        <label for="content_writing">Content Writing</label><br>
                        <input type="checkbox" id="seo" name="skills[]" value="SEO">
                        <label for="seo">SEO</label><br>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo $skillsError; ?></td>
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
                    <td colspan="2" align ="center">
                        <button type="submit">Sign Up</button>
                        <button type="reset">Clear</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
