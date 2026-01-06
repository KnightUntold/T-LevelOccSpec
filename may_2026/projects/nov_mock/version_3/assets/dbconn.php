<?php
    // each action (insert, select, delete, update) is put into a different function to be called upon so that
    // the database is more secure, if someone manages to break into the database thruogh one of the connections,
    // it limits what they can do within the database
    function dbconn_insert(){
        $servername = "localhost"; //sets the server name

        $dbusername = "RolsaDb_insert"; //username for the account that was created in the db for inserting data

        $dbpassword = "RolsaDb_insert"; //password for the account that was created in the db for inserting data

        $dbname = "rolsadb"; //database name

        //these 4 things above are super insecure, should not be stored here, especially in plain text.
        //only stored here because of the system and instance being safe enough to do so.

        try { //attempts this block of code, catching an error
            $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $dbusername, $dbpassword); //PDO connection
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //sets error modes
            return $conn;
        } catch(PDOException $e) {
            error_log("database error in super_checker: " . $e->getMessage());
            //throw the exception
            throw $e; //rethrow the exception // outputs the error on the web browser so it can be logged in the server
        }
    }

    function dbconn_select(){
        $servername = "localhost"; //sets the server name

        $dbusername = "RolsaDb_select"; //username for the account that was created in the db for selecting data

        $dbpassword = "RolsaDb_select"; //password for the account that was created in the db for selecting data

        $dbname = "rolsadb"; //database name

        //these 4 things above are super insecure, should not be stored here, especially in plain text.
        //only stored here because of the system and instance being safe enough to do so.

        try { //attempts this block of code, catching an error
            $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $dbusername, $dbpassword); //PDO connection
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //sets error modes
            return $conn;
        } catch(PDOException $e) {
            error_log("database error in super_checker: " . $e->getMessage());
            //throw the exception
            throw $e; //rethrow the exception // outputs the error on the web browser so it can be logged in the server
        }
    }

    function dbconn_delete(){
        $servername = "localhost"; //sets the server name

        $dbusername = "RolsaDb_delete"; //username for the account that was created in the db for deleting data

        $dbpassword = "RolsaDb_delete"; //password for the account that was created in the db for deleting data

        $dbname = "rolsadb"; //database name

        //these 4 things above are super insecure, should not be stored here, especially in plain text.
        //only stored here because of the system and instance being safe enough to do so.

        try { //attempts this block of code, catching an error
            $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $dbusername, $dbpassword); //PDO connection
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //sets error modes
            return $conn;
        } catch(PDOException $e) {
            error_log("database error in super_checker: " . $e->getMessage());
            //throw the exception
            throw $e; //rethrow the exception // outputs the error on the web browser so it can be logged in the server
        }
    }

    function dbconn_update(){
        $servername = "localhost"; //sets the server name

        $dbusername = "RolsaDb_update"; //username for the account that was created in the db for updating data

        $dbpassword = "RolsaDb_update"; //password for the account that was created in the db for updating data

        $dbname = "rolsadb"; //database name

        //these 4 things above are super insecure, should not be stored here, especially in plain text.
        //only stored here because of the system and instance being safe enough to do so.

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