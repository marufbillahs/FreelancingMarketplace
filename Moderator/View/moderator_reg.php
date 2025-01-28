<?php
require '../Control/moderator_reg_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator Registration</title>
</head>
<body>

    <table width="100%" height="100%" border="0">
        <tr>
            <td align="center" valign="middle">
                
                <h1>Moderator Registration</h1>
                
                <form action="" method="post" enctype="multipart/form-data">

                                      
                    <table cellpadding="8" cellspacing="0">
                        <tr>
                            <td colspan="2"><strong>Personal Information</strong></td>
                        </tr>
                        
                        <tr>
                            <td><label for="fullName">Full Name:</label></td>
                            <td><input type="text" id="fullName" name="fullName" required size="30"></td>
                        </tr>
                        
                        <tr>
                            <td><label for="email">Email:</label></td>
                            <td><input type="email" id="email" name="email" required size="30"></td>
                        </tr>
                        
                        <tr>
                            <td><label for="phone">Phone:</label></td>
                            <td><input type="tel" id="phone" name="phone" placeholder="123-456-7890" required size="30"></td>
                        </tr>
                        
                        <tr>
                            <td><label for="dob">Date of Birth:</label></td>
                            <td><input type="date" id="dob" name="dob" required size="30"></td>
                        </tr>
                        
                        <tr>
                            <td>Gender:</td>
                            <td>
                                <input type="radio" id="male" name="gender" value="Male">
                                <label for="male">Male</label>
                                <input type="radio" id="female" name="gender" value="Female">
                                <label for="female">Female</label>
                                <input type="radio" id="other" name="gender" value="Other">
                                <label for="other">Other</label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><label for="presentAddress">Present Address:</label></td>
                            <td><textarea id="presentAddress" name="presentAddress" rows="3" cols="28" required></textarea></td>
                        </tr>
                        
                        <tr>
                            <td><label for="permanentAddress">Permanent Address:</label></td>
                            <td><textarea id="permanentAddress" name="permanentAddress" rows="3" cols="28" required></textarea></td>
                        </tr>
                        
                       <!---- <tr>
                            <td><label for="profileImage">Profile Image:</label></td>
                            <td><input type="file" id="profileImage" name="profileImage" accept="image/*"></td>
                        </tr>-->
                    </table>
                    
                    <br>

                    <table cellpadding="8" cellspacing="0">
                        <tr>
                            <td colspan="2"><strong>Account Information</strong></td>
                        </tr>
                        
                        <tr>
                            <td><label for="username">Username:</label></td>
                            <td><input type="text" id="username" name="username" required size="30"></td>
                        </tr>
                        
                        <tr>
                            <td><label for="password">Password:</label></td>
                            <td><input type="password" id="password" name="password" required size="30"></td>
                        </tr>
                        
                        <tr>
                            <td><label for="confirmPassword">Confirm Password:</label></td>
                            <td><input type="password" id="confirmPassword" name="confirmPassword" required size="30"></td>
                        </tr>
                    </table>
                    
                    <br>


                    <table cellpadding="8" cellspacing="0">
                        <tr>
                            <td colspan="2"><strong>Security Question</strong></td>
                        </tr>
                        
                        <tr>
                            <td><label for="securityQuestion">Choose a Security Question:</label></td>
                            <td>
                                <select id="securityQuestion" name="securityQuestion" required>
                                    <option value="">Select a question</option>
                                    <option value="motherMaidenName">What is your mother’s maiden name?</option>
                                    <option value="firstPetName">What was the name of your first pet?</option>
                                    <option value="favoriteTeacher">Who was your favorite teacher?</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><label for="securityAnswer">Answer:</label></td>
                            <td><input type="text" id="securityAnswer" name="securityAnswer" required size="30"></td>
                        </tr>
                    </table>
                    
                    <br>


                    <input type="submit" value="Register">
                    <input type="reset" value="Clear Form">
                    
                </form>

            </td>
        </tr>
    </table>

</body>
</html>
