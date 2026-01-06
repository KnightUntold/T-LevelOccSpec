<?php
    session_start();

    require_once "../reuseable_code/dbconn.php";
    require_once "../reuseable_code/common.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if(!username_ver(dbconnect(), $_POST['username'])) {
            if (reg_user(dbconnect(), $_POST)) {
                audtitor(dbconnect(),getnewuserid(dbconnect(), $_POST['username']), "reg","New user registered");
                $_SESSION['usermessage'] = "USER CREATED SUCCESSFULLY";
                header('Location: login.php');
                exit;


            } else {
                $_SESSION['usermessage'] = "ERROR: USER REGISTRATION FAILED";
            }
        } else {
        $_SESSION['usermessage'] = "ERROR: USERNAME NOT AVAILABLE";
        }
    }

    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";
        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='../../reuseable_code/ezstyles.css'>";
            echo "<title>Sign Up</title>";
        echo "</head>";
        echo "<body class='back_powderblue'>";
            echo "<header>";
                require "header.php";
            echo "</header>";
            echo "<form action='' method='post' class='center'>";
                echo "<br><label for='username'>Username</label><br>";
                echo "<input type='text' name='username' placeholder='Username'><br>";
                echo "<label for='password'>Password</label><br>";
                echo "<input type='password' name='password' placeholder='Password'><br>";
                echo "<label for='signup'>Sign Up Date</label><br>";
                echo "<input type='date' name='signup' placeholder='today'><br>";
                echo "<label for='dob'>Date of Birth</label><br>";
                echo "<input type='date' name='dob' placeholder='Date of Birth'><br>";
                echo "<label for='country'>country</label><br>";
                echo "<input type='text' name='country' placeholder='country'><br>";
                echo "<input type='submit' value='Sign Up'>";
            echo "</form>";
            echo "<br>";
            echo user_message();
            echo "<footer>";
                require "footer.php";
            echo "</footer>";
        echo "</body>";
    echo "</html>";
