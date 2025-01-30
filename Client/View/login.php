<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <script src="../JS/login.js"></script>
</head>
<body>
    <table align="center">
        <tr>
            <td>
                <fieldset>
                    <legend><h2>Login</h2></legend>
                    <form onsubmit="return validateLoginForm();" action="../Control/login_control.php" method="post">
                        <b>UserName:</b>
                        <input type="text"id="username" name="username" ><br>
                        <span id="usernameError"></span>
                        
                        <b>Password :</b>
                        <input type="password" id="password"name="password" ><br><br>
                        <span id="passwordError"></span>

                        <input type="submit" value="Login">
                        <br><br>
                    </form>


                    <form onsubmit="return validlogin();" action=" " method="post">
                        <b>Don't have an account?</b> 
                        <br>

                        <b>Select User Type:</b>
                    
                            <select  id="userType" name="user_type" >
                                <option value="">Select type</option>
                                <option value="admin">Admin</option>
                                <option value="client">Client</option>
                                <option value="freelancer">Freelancer</option>
                                <option value="moderator">Moderator</option>
                            </select><br><br>

                            <span id="userTypeError"></span><br>

                            <input type="submit" name="signup" value="Signup" >
                     </form>

                        <?php
                        if (isset($_POST['signup'])) {
                            // Check the selected user type and redirect accordingly
                            $userType = $_POST['user_type'];

                            if ($userType == 'admin') {
                                header("Location:../../Admin/View/admin_reg.php");
                                exit;
                            } elseif ($userType == 'client') {
                                header("Location: client_reg.php");
                                exit;
                            } elseif ($userType == 'freelancer') {
                                header("Location: ../../Freelancer/View/freelancer_reg.php");
                                exit;
                            } elseif ($userType == 'moderator') {
                                header("Location:../../Moderator/View/moderator_reg.php");
                                exit;
                            }
                            /* else {
                                 
                                echo "Please select a user type!";
                            }
                            */
                        }


                        ?>
                    </form>
                </fieldset>
            </td>
        </tr>
    </table> 
</body>
</html>
