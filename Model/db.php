<?php

class myDB {
    
    //open connection

    function openCon() {
        $DBHost = "localhost:3306";
        $DBuser = "root";
        $DBpassword = "";
        $DBname = "marketplace";

        $connectionObject = new mysqli($DBHost, $DBuser, $DBpassword, $DBname);

       //write object oriented code to check connection
        if ($connectionObject->connect_error) {
            die("Connection failed: " . $connectionObject->connect_error);
        }
        

        return $connectionObject;
    }   


    // Insert data into the database
    function insertData($connectionObject,$fullname,$username,$email,$phone,$dob,$gender,$password,$repassword,$address,$userType) {
        $sql = "INSERT INTO client (fullname, username, email, phone, dob,gender, password, repassword, address,userType) 
        VALUES ('$fullname', '$username', '$email', '$phone', '$dob', '$gender', '$password', '$repassword', '$address', '$userType')";
              
        // Execute the query
        if ($connectionObject->query($sql)) {
            return 1; // Success
        } else {
            return 0; // Failure
        }
    }




    public function checkLogin($conobj, $username, $password) {

        $sql = "SELECT * FROM client WHERE username = ? AND password = ?";

        $stmt = $conobj->prepare($sql);

        $stmt->bind_param("ss", $username, $password);

        $stmt->execute();

        return $stmt->get_result();

    }





    // Close connection
    function closeCon($connectionObject) {
        $connectionObject->close();
    }
}

?>
