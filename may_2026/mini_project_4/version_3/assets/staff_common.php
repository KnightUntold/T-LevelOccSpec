<?php
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
            $sql = "SELECT username FROM staff_users WHERE username = ?";
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

    function reg_staffuser($conn, $post){
        try { //prepare and execute sql query
            $sql = "INSERT INTO staff_users (email, username, password, staff_type, fname, sname, room, sign_up_date) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql); //prepare to sql
            $signupdate = date("Y-m-d");
            $hpwsd = password_hash($post['password'], PASSWORD_DEFAULT); //hash the password,
            // using default encrytion because we don't have anything else built in.
            // If it was a production system i would use better encryption like bcrypt or argon.
            $stmt->bindparam(1, $post['email']); //bind parameters for security
            $stmt->bindparam(2, $post['username']);
            $stmt->bindparam(3, $hpwsd);
            $stmt->bindparam(4, $post['staff']);
            $stmt->bindparam(5, $post['fname']);
            $stmt->bindparam(6, $post['sname']);
            $stmt->bindparam(7, $post['room']);
            $stmt->bindparam(8, $signupdate);

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
            $sql = "SELECT staff_id, password FROM staff_users WHERE username = ?"; //set up the sql statement
            $stmt = $conn->prepare($sql); //prepares the statement
            $stmt->bindparam(1, $post['username']); //binds parameters to execute
            $stmt->execute(); //run the sql code
            $result = $stmt->fetch(PDO::FETCH_ASSOC); //bring back results
            $conn = null; //nulls off the connection so can't be abused

            if($result) { //if there is a result returned
                return $result;
            } else {
                $_SESSION['usermessage'] = "User not found";
                header("Location: index.php");
                exit; //stop further execution
            }
        } catch (PDOException $e) {
            $_SESSION['usermessage'] = "User Login" . $e->getMessage();
            header("Location: index.php");
            exit; //stop further execution
        }
    }

    function hasPassword($string) { //this one needs fixing aaaa
        if(!str_contains($_SESSION['password'], "ERROR")) {
            $string = "<div id='error'> USER MESSAGE: ". $_SESSION['password'] ."</div>";
            return true;
        } else {
            $string = "<div id='success'> USER MESSAGE: ". $_SESSION['password'] ."</div>";
            return false;
        }
    }


    //need to figure this out
    function password_confirm($string) {
        //  if (! $password = $password2) {}

    }

    function audtitor($conn, $staffid, $code, $long){ //on doing any action, the auditor logs it
        $sql = "INSERT INTO staff_audit (date, staff_id, code, longdesc) VALUES (?,?,?,?)"; //prepared statement
        $stmt = $conn->prepare($sql); //prepare to sql
        $date = date("Y-m-d"); //exact structure that a mysql date field accepts
        $stmt->bindparam(1, $date); //bind params for security
        $stmt->bindparam(2, $staffid);
        $stmt->bindparam(3, $code);
        $stmt->bindparam(4, $long);

        $stmt->execute(); //runs the query to insert
        $conn = null; //closes the connection so it can't be abused
        return true; //registration successful
    }


    function getnewuserid($conn, $username){ //upon registering, this retrieves the userid from
        $sql = "SELECT staff_id FROM staff_users WHERE username = ?";
        $stmt = $conn->prepare($sql); //prepares
        $stmt->bindparam(1, $username);
        $stmt->execute(); //run sql code
        $result = $stmt->fetch(PDO::FETCH_ASSOC); //bring back results
        $conn = null; //closes the connection to prevent abuse
        return $result['staff_id'];
    }

