<?php
    function hasUpperCase($string) {
        if (preg_match('/[A-Z]/', $string)) { //finds a match for any characters in the string for any capital letters between A-Z
            return true;
        } else {
            return false;
        }
    }
    function hasLowerCase($string) {
        if (preg_match('/[a-z]/', $string)) { //finds a match for any characters in the string for any lowercase letters between a-z
            return true;
        } else {
            return false;
        }
    }
    function hasNumber($string) {
        if (preg_match('/[0-9]/', $string)) { //finds a match for any characters in the string for numbers
            return true;
        } else {
            return false;
        }
    }

    function hasSpecialCharacter($string) {
        if (preg_match('/[^a-zA-Z0-9]/', $string)) { //finds a match for any characters in the string with any special characters
            return true;
        } else {
            return false;
        }
    }

    function hasPassword($string) { //this one needs fixing aaaa
        if(str_contains($_SESSION['password'], "ERROR")) {
            $string = "<div id='error'> USER MESSAGE: ". $_SESSION['password'] ."</div>";
            return true;
        } else {
            $string = "<div id='success'> USER MESSAGE: ". $_SESSION['password'] ."</div>";
            return false;
        }
    }

    function new_console($conn, $post)
    {
        try {
            $sql = "INSERT INTO console (manufacturer, c_name, release_date, controller_no, bit)
                    VALUES (?,?,?,?,?)"; //prepared statemen, this is the best way to prevent sql injections
            $stmt = $conn->prepare($sql); //prepare to sql

            $stmt->bindparam(1, $post['manufacturer']); //bind params for security
            $stmt->bindparam(2, $post['c_name']);
            $stmt->bindparam(3, $post['release_date']);
            $stmt->bindparam(4, $post['controller_no']);
            $stmt->bindparam(5, $post['bit']);

            $stmt->execute(); //run the query to insert
            $conn = null; //closes the connection so it cant be abused
        } catch (PDOException $e) {
            error_log("audit database error: " . $e->getMessage()); //log the error
            throw new Exception("audit database error: " . $e); //throw the exception
        } catch (Exception $e) {
            error_log("auditing error: " . $e->getMessage()); //log the error
            throw new Exception("auditing error: " . $e->getMessage()); //throw the exception
        }
    }


    function user_msg(){
        if(isset($_SESSION['usermessage'])){
            $message = "<p>" . $_SESSION['usermessage'] . "</p>";
            unset($_SESSION['usermessage']);
            return $message;
        } else {
            $message = "";
            return $message;
        }
    }