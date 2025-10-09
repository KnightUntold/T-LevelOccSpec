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


    function user_message(){
        if(isset($_SESSION['usermessage'])){
            $message = "<p>" . $_SESSION['usermessage'] . "</p>";
            unset($_SESSION['usermessage']);
            return $message;
        } else {
            $message = "";
            return $message;
        }
    }

    function username_ver($conn, $username){
        try {
            $sql = "SELECT username FROM user WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindparam(1, $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Database error in only_user:  " . $e->getMessage());
            throw $e;
        }

    }

    function reg_user($conn, $post){
        try { //prepare and execute sql query
            $sql = "INSERT INTO user (username, password, signupdate, dob, country) VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($sql); //prepare to sql

            $stmt->bindparam(1, $post['username']); //bind parameters for security
            $hpwsd = password_hash($post['password'], PASSWORD_DEFAULT); //hash the password,
            // using default encrytion because we don't have anything else built in.
            // If it was a production system i would use better encryption like bcrypt or argon.
            $stmt->bindparam(2, $hpwsd);
            $stmt->bindparam(3, $post['signup']);
            $stmt->bindparam(4, $post['dob']);
            $stmt->bindparam(5, $post['country']);

            $stmt->execute(); //run the query to insert
            $conn = null; //closes the connection so it cant be abuse
            return true; //registration successful
            } catch (PDOException $e) {
                //handle database errors
                error_log("User Reg database error: " . $e->getMessage()); //log the error
                throw new Exception("User Reg database error: " . $e->getMessage());
            } catch (Exception $e) {
                error_log("user Registration database error: " . $e->getMessage());
                throw new Exception("User Registration database error: " . $e->getMessage());
            }
        }


        function login($conn, $post){
            try {
                $sql = "SELECT user_id, password FROM user WHERE username = ?"; //set up the sql statement
                $stmt = $conn->prepare($sql); //prepares the statement
                $stmt->bindparam(1, $post['username']); //binds parameters to execute
                $stmt->execute(); //run the sql code
                $result = $stmt->fetch(PDO::FETCH_ASSOC); //bring back results
                $conn = null; //nulls off the connection so can't be abused

                if($result) { //if there is a result returned
                    return $result;
                } else {
                    $_SESSION['usermessage'] = "User not found";
                    header("Location: login.php");
                    exit; //stop further execution
                }
            } catch (PDOException $e) {
                $_SESSION['usermessage'] = "User Login" . $e->getMessage();
                header("Location: login.php");
                exit; //stop further execution
            }
        }

        function audtitor($conn, $userid, $code, $long){ //on doing any action, the auditor logs it
            $sql = "INSERT INTO audit (date, userid, code, long) VALUES (?,?,?,?)"; //prepared statement
            $stmt = $conn->prepare($sql); //prepare to sql
            $date = date("Y-m-d"); //exact structure that a mysql date field accepts
            $stmt->bindparam(1, $date); //bind params for security
            $stmt->bindparam(2, $userid);
            $stmt->bindparam(3, $code);
            $stmt->bindparam(4, $long);

            $stmt->execute(); //runs the query to insert
            $conn = null; //closes the connection so it can't be abused
            return true; //registration successful
        }
