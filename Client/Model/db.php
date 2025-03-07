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
   
        
        $query = "DELETE FROM jobs WHERE job_id = ?";
        $stmt = $connectionObject->prepare($query);
        $stmt->bind_param("i", $jobID);
        $stmt->execute();
        return true;
    }



    //update job
    function updateJob($connectionObject,$jobID, $title, $description, $jobType, $payment) {
   
    $response = ['success' => false, 'message' => ''];
   
        $query = "UPDATE jobs SET title = ?, description = ?, job_type = ?, payment = ? WHERE job_id = ?";
        $stmt = $connectionObject->prepare($query);
        $stmt->bind_param("ssdsi", $title, $description, $jobType, $payment, $jobID);
        
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Job updated successfully";
        } else {
            $response['message'] = "Error updating the job: " . $stmt->error;
        }
   
        $stmt->close();
        $connectionObject->close();
 
        return $response;
    }

    // Update profile picture
     public function updateProfilePicture($connectionObject, $user_id, $profile_pic) {
    $stmt = $connectionObject->prepare("UPDATE users SET profile_pic=? WHERE user_id=?");
    $stmt->bind_param("si", $profile_pic, $user_id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
    }

     // Get user details
    public function getUserById($connectionObject, $user_id) {
    $stmt = $connectionObject->prepare("SELECT * FROM users WHERE user_id=?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result->fetch_assoc();
     }

     
    //for freelancer Application
     function fetchFreelancerApplications($connectionObject,$jobId) {
       
    
        $query = "SELECT applications.application_id, applications.job_id, applications.freelancer_id, 
                  applications.application_text, applications.application_date, applications.status,
                  users.username, users.email
                  FROM applications
                  JOIN users ON applications.freelancer_id = users.user_id
                  WHERE applications.job_id = ?";
    
        $stmt = $connectionObject->prepare($query);
        $stmt->bind_param("i", $jobId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $applications = [];
    
        while ($row = $result->fetch_assoc()) {
            $applications[] = $row;
        }
    
        $stmt->close();
        $connectionObject->close();
    
        return $applications;
    }

    //Update application status

    function updateApplicationStatus($connectionObject,$applicationId, $status) {
       
    
            $query = "UPDATE applications SET status = ? WHERE application_id = ?";
            $stmt = $connectionObject->prepare($query);
            $stmt->bind_param("si", $status, $applicationId);
            $stmt->execute();
            return true;

    }

    
    // Close connection
    function closeCon($connectionObject) {
        $connectionObject->close();
    }
}

?>
