<?php

    // all functions will be stored in for proper code organisation

    function user_message(){ // function for outputting messages to the user
        if(isset($_SESSION['usermessage'])){
            $message = "<p>" . $_SESSION['usermessage'] . "</p>";
            unset($_SESSION['usermessage']);
            return $message;
        } else {
            $message = "";
            return $message;
        }
    }

    function reg_user($conn, $post){
        $sql = "INSERT INTO customers (first_name, last_name, email, phone, sign_up_date) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql); //prepare to sql
        $signupdate = date("Y-m-d");
        $hpwsd = password_hash($post['password'], PASSWORD_DEFAULT); //hash the password,
        // using default encrytion because we don't have anything else built in.
        // If it was a production system i would use better encryption like bcrypt or argon.
        $stmt->bindparam(1, $post['fname']); //bind parameters for security
        $stmt->bindparam(2, $post['lname']);
        $stmt->bindparam(3, $post['email']);
        $stmt->bindparam(4, $post['phone']);
        $stmt->bindparam(5, $hpwsd);
        $stmt->bindparam(6, $signupdate);

        $stmt->execute(); //run the query to insert
        $conn = null; //closes the connection so it cant be abuse
        return true; //registration successful

    }

    function login($conn, $post){
        $sql = "SELECT user_id, password FROM customers WHERE email = ? OR phone = ?"; //set up the sql statement
        $stmt = $conn->prepare($sql); //prepares the statement
        $stmt->bindparam(1, $post['email']); //binds parameters to execute
        $stmt->bindparam(2, $post['phone']);
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
    }

    function email_ver($conn, $email){
        $sql = "SELECT email FROM customers WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(1, $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

