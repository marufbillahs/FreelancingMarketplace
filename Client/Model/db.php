<?php

class myDB {
    
    //open connection

    function openCon() {
        $DBHost = "localhost:3306";
        $DBuser = "root";
        $DBpassword = "";
        $DBname = "freelancingmarketplace";

        $connectionObject = new mysqli($DBHost, $DBuser, $DBpassword, $DBname);

       //object oriented code to check connection
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


     //searchfreelaner
     function searchFreelancer($connectionObject,$searchQuery) {
        
    
        $query = "SELECT * FROM users WHERE userType = 'freelancer' AND (username LIKE ? OR user_id = ?)";
        $stmt = $connectionObject->prepare($query);
        $searchParameter = "%$searchQuery%";
        $stmt->bind_param("ss", $searchParameter, $searchQuery);
        $stmt->execute();
        $result = $stmt->get_result();
        $freelancers = [];
        while ($row = $result->fetch_assoc()) {
            $freelancers[] = $row;
        }
    
        return $freelancers;
    }


    

    //post job
    function postJob($connectionObject,$client_id, $title, $description, $job_type, $payment) {
        
        $response = ['success' => false, 'message' => ''];
    
        if ($connectionObject->connect_error) {
            $response['message'] = "Connection failed: " . $connectionObject->connect_error;
            return $response;
        }
    
        $stmt = $connectionObject->prepare("INSERT INTO jobs (client_id, title, description, job_type, payment) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isssd", $client_id, $title, $description, $job_type, $payment);
    
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "New job posted successfully";
        } else {
            $response['message'] = "Error posting the job: " . $stmt->error;
        }
    
        $stmt->close();
        $connectionObject->close();
    
        return $response;
    }


  // Function to fetch jobs
    function getJobsByClientId($connectionObject,$client_id) {
        
    
        $query = "SELECT j.*, 
                         a.freelancer_id, 
                         u.username AS freelancer_username,
                         a.application_text,
                         a.application_date,
                         a.status AS application_status,
                         p.payment_id,
                         p.amount AS payment_amount,
                         p.payment_date
                  FROM jobs j
                  LEFT JOIN applications a ON j.job_id = a.job_id
                  LEFT JOIN users u ON a.freelancer_id = u.user_id
                  LEFT JOIN payments p ON j.job_id = p.job_id AND a.freelancer_id = p.freelancer_id
                  WHERE j.client_id = ?";
        
        $stmt = $connectionObject->prepare($query);
        $stmt->bind_param("i", $client_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $jobs = [];
        while ($row = $result->fetch_assoc()) {
            $jobs[] = $row;
        }
        return $jobs;
    }

    //search jobs by jobID
    
    function searchJobsByJobID($connectionObject,$jobID) {
      
    
        $query = "SELECT * FROM jobs WHERE job_id = ?";
        $stmt = $connectionObject->prepare($query);
        $stmt->bind_param("i", $jobID);
        $stmt->execute();
        $result = $stmt->get_result();
        $jobs = [];
        while ($row = $result->fetch_assoc()) {
            $jobs[] = $row;
        }
    
        return $jobs;
    }



    //delete job 
    function deleteJob($connectionObject,$jobID) {
    try {
        
        $query = "DELETE FROM jobs WHERE job_id = ?";
        $stmt = $connectionObject->prepare($query);
        $stmt->bind_param("i", $jobID);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
    }



    //update job
    function updateJob($connectionObject,$jobID, $title, $description, $jobType, $payment) {
   
    $response = ['success' => false, 'message' => ''];
    try {
        $query = "UPDATE jobs SET title = ?, description = ?, job_type = ?, payment = ? WHERE job_id = ?";
        $stmt = $connectionObject->prepare($query);
        $stmt->bind_param("ssdsi", $title, $description, $jobType, $payment, $jobID);
        
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Job updated successfully";
        } else {
            $response['message'] = "Error updating the job: " . $stmt->error;
        }
    } catch (Exception $e) {
        $response['message'] = "Exception: " . $e->getMessage();
    } finally {
        $stmt->close();
        $connectionObject->close();
    }

    return $response;
    }

    

    
    // Close connection
    function closeCon($connectionObject) {
        $connectionObject->close();
    }
}

?>
