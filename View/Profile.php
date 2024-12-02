<?php
Session_Start();

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
</body>
</html>
