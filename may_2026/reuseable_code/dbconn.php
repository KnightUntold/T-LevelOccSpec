<?php

    function dbconnect_insert(){
        $servername = "localhost"; //sets servername

        $dbusername = "gconsoleinsert";

        $dbpassword = "password1G"; //password for db account

        $dbname = "gconsole"; //db name to connect to

        //these 4 things above are super insecure, should not be stored here, especially in plain text.
        //only stored here because of the system and instance being safe enough to do so.
        //alternative to PDO is mysqli but PDO is more standard now because it can connect to any database type

        try { //attempts tihs block of code, catching an error
            $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $dbusername, $dbpassword); //PDO connection
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //sets error modes
            return $conn;
        } catch(PDOException $e) {
            error_log("database error in super_checker: " . $e->getMessage());
            //throw the exception
            throw $e; //rethrow the exception // outputs the error on the web browser so it can be logged in the server
        }
    }
