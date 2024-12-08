<?php
Session_Start();

//if session is not set then redirect to reg.php
if(!isset($_SESSION["username"])){
    header("Location:../View/reg.php");
}
?>

<html>
    <body>
        <?php echo $_SESSION["fullname"];
        echo $_SESSION["username"];
        echo $_SESSION["email"];
        echo $_SESSION["phone"];
        echo $_SESSION["dob"];
        echo $_SESSION["gender"];
        echo $_SESSION["password"];
        echo $_SESSION["repassword"];
        echo $_SESSION["address"];
        ?>

        <a href="../Control/Sessionout.php">Logout</a>

<p>Full Name: <?php echo $_COOKIE["fullname"] ?? "N/A"; ?></p>
<p>Username: <?php echo $_COOKIE["username"] ?? "N/A"; ?></p>
<p>Email: <?php echo $_COOKIE["email"] ?? "N/A"; ?></p>
<p>Phone: <?php echo $_COOKIE["phone"] ?? "N/A"; ?></p>
<p>Date of Birth: <?php echo $_COOKIE["dob"] ?? "N/A"; ?></p>
<p>Gender: <?php echo $_COOKIE["gender"] ?? "N/A"; ?></p>
<p>Address: <?php echo $_COOKIE["address"] ?? "N/A"; ?></p>

</body>
</html>

