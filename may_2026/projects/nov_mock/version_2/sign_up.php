<?php

// COMMENT PAGES, ADD PASSWORD VERIFICATION

    session_start(); //starts the session

    require_once("assets/dbconn.php"); //requires dbconn.php to be brought in for the page to run as it is needed to insert data into the database.
    require_once("assets/common.php"); // requires common.php to be grought in for the page to run as it needed to use any of the functions.

    if ($_SERVER["REQUEST_METHOD"] === "POST") { //using post as it is a secure method 

        if(!email_ver(dbconn_select(), $_POST['email'])) {
            if (reg_user(dbconn_insert(), $_POST)) {
                audtitor(dbconn_insert(),getnewuserid(dbconn_select(), $_POST['email']), "reg","New user registered");
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
            echo "<link rel='stylesheet' type='text/css' href='assets/styles.css'>";
            echo "<title>Sign Up</title>";
        echo "</head>";

        echo "<body>";

            require "assets/header.php";

            echo "<h1 class='center'>Sign Up</h1>";

            echo "<form action='' method='post' class='center'>";

                echo "<label for='fname'>First name:</label><br>";
                echo "<input type='text' name='fname' id='fname' required><br>";

                echo "<label for='lname'>Last name:</label><br>";
                echo "<input type='text' name='lname' id='lname' required><br>";

                echo "<label for='email'>Email:</label><br>";
                echo "<input type='email' name='email' id='email' required><br>";

                echo "<label for=address'>Address:</label><br>";
                echo "<input type='text' name='address' id='address' required><br>";

                echo "<label for='password'>Password:</label><br>";
                echo "<input type='password' name='password' id='password' required><br>";

                echo "<br><input type='submit' name='submit' id='submit' value='Sign Up'>";

            echo "</form>";

            echo "<br>";
            echo user_message();
            echo "<br>";

            require "assets/footer.php";

        echo "</body>";

    echo "</html>";