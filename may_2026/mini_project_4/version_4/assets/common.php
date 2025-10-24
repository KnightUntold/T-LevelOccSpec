<?php

function new_app($conn, $post)
{
    try {
        $sql = "INSERT INTO appointments (appointment_kind, reason, preferred_contact, app_date, app_time, accomidations)
                    VALUES (?,?,?,?,?,?)"; //prepared statement, this is the best way to prevent sql injections
        $stmt = $conn->prepare($sql); //prepare to sql

        $stmt->bindparam(1, $post['app_kind']);//bind params for security
        $stmt->bindparam(2, $post['app_reason']);
        $stmt->bindparam(3, $post['pref_con']);
        $stmt->bindparam(4, $post['app_date']);
        $stmt->bindparam(5, $post['app_time']);
        $stmt->bindparam(6, $post['accom']);

        $stmt->execute(); //run the query to insert
        header('Location: booked_page.php');
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

function email_ver($conn, $email){
    try {
        $sql = "SELECT email FROM patient_users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(1, $email);
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
        $sql = "INSERT INTO patient_users (first_name, last_name, email, phone, dob, password, sign_up_date) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql); //prepare to sql
        $signupdate = date("Y-m-d");
        $hpwsd = password_hash($post['password'], PASSWORD_DEFAULT); //hash the password,
        // using default encrytion because we don't have anything else built in.
        // If it was a production system i would use better encryption like bcrypt or argon.
        $stmt->bindparam(1, $post['fname']); //bind parameters for security
        $stmt->bindparam(2, $post['lname']);
        $stmt->bindparam(3, $post['email']);
        $stmt->bindparam(4, $post['phone']);
        $stmt->bindparam(5, $post['dob']);
        $stmt->bindparam(6, $hpwsd);
        $stmt->bindparam(7, $signupdate);

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
        $sql = "SELECT patient_id, password FROM patient_users WHERE email = ?"; //set up the sql statement
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

function audtitor($conn, $patid, $code, $long){ //on doing any action, the auditor logs it
    $sql = "INSERT INTO audit (date, patient_id, code, longdesc) VALUES (?,?,?,?)"; //prepared statement
    $stmt = $conn->prepare($sql); //prepare to sql
    $date = date("Y-m-d"); //exact structure that a mysql date field accepts
    $stmt->bindparam(1, $date); //bind params for security
    $stmt->bindparam(2, $patid);
    $stmt->bindparam(3, $code);
    $stmt->bindparam(4, $long);

    $stmt->execute(); //runs the query to insert
    $conn = null; //closes the connection so it can't be abused
    return true; //registration successful
}


function getnewuserid($conn, $email){ //upon registering, this retrieves the userid from
    $sql = "SELECT patient_id FROM patient_users WHERE email = ?";
    $stmt = $conn->prepare($sql); //prepares
    $stmt->bindparam(1, $email);
    $stmt->execute(); //run sql code
    $result = $stmt->fetch(PDO::FETCH_ASSOC); //bring back results
    $conn = null; //closes the connection to prevent abuse
    return $result['patient_id'];
}

function staff_getter($conn){
    //function to get all staff suitable for an appointment

    $sql = "SELECT staff_id, staff_type, fname, sname, room FROM staff_users WHERE staff_type !=? ORDER BY staff_type DESC";
    //get all staff from database where role does NOT equal to "adm" - this is an admin role, unbookable
    $stmt = $conn->prepare($sql);
    $exclude_role = "adm";

    $stmt->bindparam(1, $exclude_role);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //adding all fetches everything person that matches the requirements needed
    $conn = null;
    return $result;
}

function commit_booking($conn, $epoch){
        $sql = "INSERT INTO pat_app (patient_id, staff_id, appointmentdate, bookedon)
                    VALUES (?,?,?,?)"; //prepared statemen, this is the best way to prevent sql injections
        $stmt = $conn->prepare($sql); //prepare to sql

        $stmt->bindparam(1, $_SESSION['patid']);//bind params for security
        $stmt->bindparam(2, $_POST['staff']);
        $stmt->bindparam(3, $epoch);
        $tmp = time();
        $stmt->bindparam(4, $tmp);

        $stmt->execute(); //run the query to insert
        $conn = null; //closes the connection so it cant be abused
        return true;
}



function appt_getter($conn){
    // function to get all staff suitable for an appointment

$sql = "SELECT p.pat_app_id, p.appointmentdate, p.bookedon, s.staff_type, s.fname, s.sname, s.room FROM pat_app p 
    JOIN staff_users s ON p.staff_id = s.staff_id WHERE p.patient_id = ? ORDER BY p.appointmentdate ASC";
    // the p. and s. selects different fields from the 2 tables (pat_app and staff_users) which is known by putting the letters
    // after them when they are called. pat_app is called from and joins the table to staff_users to get the staff information
    // so it can displayed to the user to see when there appointments are.
    // ASC sorts the results in ascending order
    $stmt = $conn->prepare($sql);

    $stmt->bindparam(1, $_SESSION['patid']);
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
    $sql = "DELETE FROM pat_app WHERE pat_app_id = ?"; //sql statement to delete the appointment from pat_app based off the pat_app_id
    $stmt = $conn->prepare($sql); //prepares the sql to bind param
    $stmt->bindparam(1, $aptid); //binds the params for security
    $stmt->execute(); //executes the pdo statement
    $conn = null; //closes the connection so it can't be abused
    return true;
}

function appt_fetch($conn, $bookid){
    $sql = "SELECT * FROM pat_app WHERE pat_app_id = ?";
    //gets a booking based off pat_app_id
    $stmt = $conn->prepare($sql);

    $stmt->bindparam(1, $bookid);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    return $result;
}

function appt_update($conn, $bookid, $apptime){
    $sql = "UPDATE pat_app SET staff_id = ?, appointmentdate = ? WHERE pat_app_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindparam(1, $_POST['staff']);
    $stmt->bindparam(2, $apptime);
    $stmt->bindparam(3, $bookid);
    $stmt->execute();
    $conn = null;
    return true;
}

function aud_getter($conn){
    //function to get all staff suitable for an appointment

    $sql = "SELECT audit_id, patient_id, code, longdesc, date FROM audit WHERE patient_id = ? ORDER BY date ASC";
    //get all staff from database where role does NOT equal to "adm" - this is an admin role, unbookable
    $stmt = $conn->prepare($sql);

    $stmt->bindparam(1, $_SESSION['patid']);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //adding all fetches everything person that matches the requirements needed
    $conn = null;
    return $result;
}
