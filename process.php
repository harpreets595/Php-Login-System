<?php
    include_once("config.php");



    // check to see if POST request done 
    if(isset($_POST['signUp'])){
        // passing in the connection
        $con = config::connect();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
               

        if(insertDetails($con, $username, $email, $password ))
        {
            echo "details Inserted Successfully";
        }
    }

    function insertDetails($con, $username, $email, $password){
        $query = $con->prepare("

        INSERT INTO harpreet_singh.account_registration (username, email, password)

        VALUES(:username,:email, :password)
        
        ");

        // bind the parameters 
        $query->bindParam(":username", $username);
        $query->bindParam(":email", $email);
        $query->bindParam(":password", $password);

        // return boolean
        return $query->execute();
    }

?>
