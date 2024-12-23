<?php

class myDB {
    
    //open connection

    function openCon() {
        $DBHost = "localhost:3306";
        $DBuser = "root";
        $DBpassword = "";
        $DBname = "freelancingmarketplace";

        $connectionObject = new mysqli($DBHost, $DBuser, $DBpassword, $DBname);

       //write object oriented code to check connection
        if ($connectionObject->connect_error) {
            die("Connection failed: " . $connectionObject->connect_error);
        }
        

        return $connectionObject;
    }   


    // Insert data into the database
    function insertClientData($connectionObject,$fullname,$username,$email,$phone,$dob,$gender,$password,$repassword,$address,$userType) {
        // Check if username already exists
        if ($this->isUsernameExists($connectionObject, $username)) {
            return 0; // Username already exists
        }

        $sql = "INSERT INTO client (fullname, username, email, phone, dob,gender, password, repassword, address,userType) 
        VALUES ('$fullname', '$username', '$email', '$phone', '$dob', '$gender', '$password', '$repassword', '$address', '$userType')";
              
        // Execute the query
        if ($connectionObject->query($sql)) {
            return 1; // Success
        } else {
            return 0; // Failure
        }
    }





    //insert data into the database admin table
    function insertAdminData($connectionObject,$fullname,$username,$email,$nid,$phone,$dob,$gender,$present_address,$permanent_address,$password,$repassword,$userType) {
        // Check if username already exists
        if ($this->isUsernameExists($connectionObject, $username)) {
            return 0; // Username already exists
        }

        $sql = "INSERT INTO admin (fullname, username, email, nid, phone, dob,gender, present_address, permanent_address, password, repassword, userType)
        VALUES ('$fullname', '$username', '$email', '$nid', '$phone', '$dob', '$gender', '$present_address', '$permanent_address', '$password', '$repassword', '$userType')";

        // Execute the query
        if ($connectionObject->query($sql)) {
            return 1; // Success
        } else {
            return 0; // Failure
        }
    }





    

    //put the username and password, userType in user table in the database
    function insertUser($connectionObject, $username, $password,$email,$userType) {
        // Check if username already exists
        if ($this->isUsernameExists($connectionObject, $username)) {
            return 0; // Username already exists
        }

        $sql = "INSERT INTO users (username, password,email,userType) 
        VALUES ('$username', '$password','$email','$userType')";
              
        // Execute the query
        if ($connectionObject->query($sql)) {
            return 1; // Success
        } else {
            return 0; // Failure
        }
    }




     //getUserByUsername
     function getUserByUsername($connectionObject, $username) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $connectionObject->query($sql);
        return $result->fetch_assoc();
    }
    

  


    //isUsernameExists
    function isUsernameExists($connectionObject,$username) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $connectionObject->query($sql);
        return $result->num_rows > 0;
    }

   

    //updateUserPassword
    function updateUserPassword($connectionObject, $username, $newPassword) {
        $sql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
        $connectionObject->query($sql);
    }
    //updateUserEmail
    function updateUserEmail($connectionObject, $username, $newEmail) {
        $sql = "UPDATE users SET email = '$newEmail' WHERE username = '$username'";
        $connectionObject->query($sql);
    }


    //post job
    function postJob($connectionObject, $client_id, $title, $description, $job_type, $payment) {
        $sql = "INSERT INTO jobs (client_id, title, description, job_type, payment) 
        VALUES ('$client_id', '$title', '$description', '$job_type', '$payment')";
              
        // Execute the query
        if ($connectionObject->query($sql)) {
            return 1; // Success
        } else {
            return 0; // Failure
        }
    }

    // Function to fetch jobs
    function ViewJobs($conn, $client_id) {
        $sql = "SELECT * FROM jobs WHERE client_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $client_id);
        $stmt->execute();
         return $stmt->get_result();

    }




    // Close connection
    function closeCon($connectionObject) {
        $connectionObject->close();
    }
}

?>
