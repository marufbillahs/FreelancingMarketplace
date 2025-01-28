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




    
    // Close connection
    function closeCon($connectionObject) {
        $connectionObject->close();
    }
}

?>
