<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <table align="center">
        <tr>
            <td>
                <fieldset>
                    <legend><h2>Login</h2></legend>
                    <form action="../Control/login_control.php" method="post">
                        <b>UserName:</b>
                        <input type="text" name="username" ><br>
                        
                        <b>Password :</b>
                        <input type="password" name="password" ><br><br>

                        <input type="submit" value="Login">
                        <br><br>
                        </form>


                    <form action=" " method="post">
                        <b>Don't have an account?</b> 
                        <br>

                        <b>Select User Type:</b>
                    <form action="" method="post">
                            <select name="user_type" required>
                                <option value="">Select type</option>
                                <option value="admin">Admin</option>
                                <option value="client">Client</option>
                                <option value="freelancer">Freelancer</option>
                                <option value="moderator">Moderator</option>
                            </select><br><br>

                            <input type="submit" name="signup" value="Signup">
                     </form>

                        <?php
                        if (isset($_POST['signup'])) {
                            // Check the selected user type and redirect accordingly
                            $userType = $_POST['user_type'];

                            if ($userType == 'admin') {
                                header("Location: admin_reg.php");
                                exit;
                            } elseif ($userType == 'client') {
                                header("Location: client_reg.php");
                                exit;
                            } elseif ($userType == 'freelancer') {
                                header("Location: freelancer_reg.php");
                                exit;
                            } elseif ($userType == 'moderator') {
                                header("Location: moderator_reg.php");
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
