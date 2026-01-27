<?php


    session_start(); //starts the session

    require_once("assets/dbconn.php"); //requires dbconn.php to be brought in for the page to run as it is needed to insert data into the database.
    require_once("assets/common.php"); // requires common.php to be brought in for the page to run as it needed to use any of the functions.

    if (isset($_SESSION['user_id'])) {  // Looks for if the user is already logged in
        $_SESSION['usermessage'] = "ERROR: You have already logged in!";  // tells them they are logged in and redirect to index
        header("Location: index.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") { //using post as it is a secure method
        if ($_POST['password'] != $_POST['confirm_password']) { //checks to see if both passwords match
            $_SESSION['usermessage'] = "ERROR: Passwords do not match!"; //message to the user if they do not match
            header("Location: sign_up.php"); //sends them back to the sign up page
            exit; //ensures redirect works and code stops executing
        } else {
            try {
                if (!email_ver(dbconn_select(), $_POST['email'] && reg_user(dbconn_insert(), $_POST))) {
                    $_SESSION['usermessage'] = "USER CREATED SUCCESSFULLY"; //tells the user that the user was created successfully
                    header('Location: login.php'); //redirects the user to the login page
                    exit; //ensures redirect works and code stops executing
                    }
            }   catch (PDOException $e) {  // catch database error
            $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();  // sets it to user message with a redirect
            header("Location: register.php");  // sends them back to same page with user error set
            exit;
        } catch (Exception $e){
            $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();}  // catches any other error and redirects them to reg page
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

            echo "<label for=address'>Phone Number:</label><br>";
            echo "<input type='text' name='phone' id='phone' required><br>";

            echo "<label for='password'>Password:</label><br>";
            echo "<input type='password' name='password' id='password' required><br>";

            echo "<label for='password'>Confirm Password:</label><br>";
            echo "<input type='password' name='password' id='password' required><br>";

            echo "<br><input type='submit' name='submit' id='submit' value='Sign Up'>";

            echo "</form>";

            echo "<br>";
            echo user_message();
            echo "<br>";

            require "assets/footer.php";

        echo "</body>";

    echo "</html>";
