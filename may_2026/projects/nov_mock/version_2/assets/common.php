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
        $sql = "INSERT INTO customers (first_name, last_name, email, address, password, sign_up_date) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql); //prepare to sql
        $signupdate = date("Y-m-d");
        $hpwsd = password_hash($post['password'], PASSWORD_DEFAULT); //hash the password,
        // using default encrytion because we don't have anything else built in.
        // If it was a production system i would use better encryption like bcrypt or argon.
        $stmt->bindparam(1, $post['fname']); //bind parameters for security
        $stmt->bindparam(2, $post['lname']);
        $stmt->bindparam(3, $post['email']);
        $stmt->bindparam(4, $post['address']);
        $stmt->bindparam(5, $hpwsd);
        $stmt->bindparam(6, $signupdate);

        $stmt->execute(); //run the query to insert
        $conn = null; //closes the connection so it cant be abuse
        return true; //registration successful

    }

    function login($conn, $post){
        $sql = "SELECT user_id, password FROM customers WHERE email = ?"; //set up the sql statement
        $stmt = $conn->prepare($sql); //prepares the statement
        $stmt->bindparam(1, $post['email']); //binds parameters to execute
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
        $sql = "SELECT email FROM customers WHERE email = ?"; //set up the sql statement
        $stmt = $conn->prepare($sql); //prepares the statement
        $stmt->bindparam(1, $email); //binds parameters to execute
        $stmt->execute(); //run the sql code
        $result = $stmt->fetch(PDO::FETCH_ASSOC); //bring back results
        $conn = null; //nulls off the connection so can't be abused
        if($result) {
            return true;

        } else {
            return false;
        }
    }

    function audtitor($conn, $user_id, $code, $long){ //on doing any action, the auditor logs it
        $sql = "INSERT INTO audit (user_id, code, long_desc, date) VALUES (?,?,?,?)"; //prepared statement
        $stmt = $conn->prepare($sql); //prepare to sql
        $date = date("Y-m-d"); //exact structure that a mysql date field accepts
        $stmt->bindparam(1, $user_id); //bind params for security
        $stmt->bindparam(2, $long);
        $stmt->bindparam(3, $code);
        $stmt->bindparam(4, $date);

        $stmt->execute(); //runs the query to insert
        $conn = null; //closes the connection so it can't be abused
        return true; //registration successful
    }


    function getnewuserid($conn, $email){ //upon registering, this retrieves the userid from
        $sql = "SELECT user_id FROM customers WHERE email = ?";
        $stmt = $conn->prepare($sql); //prepares
        $stmt->bindparam(1, $email);
        $stmt->execute(); //run sql code
        $result = $stmt->fetch(PDO::FETCH_ASSOC); //bring back results
        $conn = null; //closes the connection to prevent abuse
        return $result['user_id'];
    }

    function commit_booking($conn, $epoch){
        $sql = "INSERT INTO customer_book (user_id, opt_id, epoch_app_date, link_date)
                        VALUES (?,?,?,?)"; //prepared statement, this is the best way to prevent sql injections
        $stmt = $conn->prepare($sql); //prepare to sql

        $stmt->bindparam(1, $_SESSION['user_id']);//bind params for security
        $stmt->bindparam(2, $_POST['app_type']);
        $stmt->bindparam(3, $epoch);
        $date = date("Y-m-d");
        $stmt->bindparam(4, $date);

        $stmt->execute(); //run the query to insert
        $conn = null; //closes the connection so it cant be abused
        return true;
    }

    function hasPassword($string) {
        if(!str_contains($_SESSION['password'], "ERROR")) {
            $string = "<div id='error'> USER MESSAGE: ". $_SESSION['password'] ."</div>";
            return true;
        } else {
            $string = "<div id='success'> USER MESSAGE: ". $_SESSION['password'] ."</div>";
            return false;
        }
    }

    function appt_getter($conn){ //may change how db works to fit this better.
        // function to get all staff suitable for an appointment

        $sql = "SELECT c.link_id, c.epoch_app_date, c.link_date, b.type, b.option_name FROM customer_book c 
        JOIN booking_options b ON c.opt_id = b.opt_id WHERE c.user_id = ? ORDER BY c.epoch_app_date ASC";

        $stmt = $conn->prepare($sql);

        $stmt->bindparam(1, $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all iss important to ensure that all the data from the db is pulled not jsut the first one
        $conn = null;
        if($result) {
            return $result;
        } else {
            return false;
        }
    }

    function cancel_appt($conn, $aptid){
        $sql = "DELETE FROM customer_book WHERE link_id = ?"; //sql statement to delete the appointment from pat_app based off the pat_app_id
        $stmt = $conn->prepare($sql); //prepares the sql to bind param
        $stmt->bindparam(1, $aptid); //binds the params for security
        $stmt->execute(); //executes the pdo statement
        $conn = null; //closes the connection so it can't be abused
        return true;
    }

    function appt_fetch($conn, $bookid){
        $sql = "SELECT * FROM customer_book WHERE link_id = ?";
        //gets a booking based off link_id
        $stmt = $conn->prepare($sql);

        $stmt->bindparam(1, $bookid);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;
        return $result;
    }

    function appt_update($conn, $bookid, $apptime){
        $sql = "UPDATE customer_book SET epoch_app_date = ? WHERE link_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(1, $apptime);
        $stmt->bindparam(2, $bookid);
        $stmt->execute();
        $conn = null;
        return true;
    }
//this is not the most effcient way of coding this and will make the system take longer which is bad but i
// don't have the knowledge to improve it
function con_getter($conn){

    $sql = "SELECT * FROM booking_options WHERE type= 'con'"; // SELECT * also works but i wanna specify for now
    $stmt = $conn->prepare($sql);

    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    $conn = null;
    return $result;
}

function ins_getter($conn){

    $sql = "SELECT * FROM booking_options WHERE type= 'ins'"; // SELECT * also works but i wanna specify for now
    $stmt = $conn->prepare($sql);

    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    $conn = null;
    return $result;
}