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

function email_ver($conn, $email){
        $sql = "SELECT email FROM users WHERE email = ?";
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

function reg_user($conn, $post){
        //prepare and execute sql query
        $sql = "INSERT INTO users (email, password, sign_up_date) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql); //prepare to sql
        $signupdate = date("Y-m-d");
        $hpwsd = password_hash($post['password'], PASSWORD_DEFAULT); //hash the password,
        // using default encrytion because we don't have anything else built in.
        // If it was a production system i would use better encryption like bcrypt or argon.
        $stmt->bindparam(1, $post['email']); //bind parameters for security
        $stmt->bindparam(2, $hpwsd);
        $stmt->bindparam(3, $signupdate);

        $stmt->execute(); //run the query to insert
        $conn = null; //closes the connection so it cant be abuse
        return true; //registration successful
}
