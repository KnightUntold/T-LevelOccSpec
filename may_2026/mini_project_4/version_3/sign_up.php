<?php
    session_start();

    require_once "assets/dbconn.php";
    require_once "assets/common.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if(!email_ver(dbconnect_select(), $_POST['email'])) {
            if (reg_user(dbconnect_insert(), $_POST)) {
                audtitor(dbconnect_insert(),getnewuserid(dbconnect_select(), $_POST['username']), "reg","New user registered");
                $_SESSION['usermessage'] = "USER CREATED SUCCESSFULLY";
                header('Location: log_in.php');
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

        echo "<body>";

            require "header.php";

            echo "<h1 class='center'>Sign Up</h1>";
            echo "<form action='' method='post' class='center'>";
                echo "<label for='fname'>First name:</label><br>";
                echo "<input type='text' name='fname' id='fname' required><br>";

                echo "<label for='lname'>Last name:</label><br>";
                echo "<input type='text' name='lname' id='lname' required><br>";

                echo "<label for='email'>Email:</label><br>";
                echo "<input type='email' name='email' id='email' required><br>";

                echo "<label for='phone'>Phone Number:</label><br>";
                echo "<input type='tel' name='phone' id='phone' required><br>";

                echo "<label for=dob'>Date of Birth:</label><br>";
                echo "<input type='date' name='dob' id='dob' required><br>";

                echo "<label for='password'>Password:</label><br>";
                echo "<input type='password' name='password' id='password' required><br>";

                echo "<br><input type='submit' name='submit' id='submit' value='Sign Up'>";
            echo "</form>";

            echo "<br>";
            echo user_message();
            echo "<br>";

            require "footer.php";

        echo "</body>";

    echo "</html>";