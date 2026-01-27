<?php

    session_start(); //connects to session for session infomation

    require_once("assets/dbconn.php");
    require_once("assets/common.php");

    if (isset($_SESSION['user'])) { //checks to see if the user is already loged in
        $_SESSION['ERROR'] = "ERROR: You are already logged in!"; //shows message to user
        header('Location: login_index.php'); //redirects them
        exit; //stop further execution
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $usr = login(dbconn_select(), $_POST); // login subroutine done here so we can use parts of the data if successful

            if ($usr && password_verify($_POST['password'], $usr['password'])) { //this condition isnt being met which means no one can log in
                $_SESSION['user'] = $usr['user_id'];
                $_SESSION['usermessage'] = "SUCCESS: User Successfully Logged In!"; //shows a success message to the user
                header('Location: login_index.php'); //redirects on success
                exit; //ensures code stops and helps redirect

            } elseif(!$usr) {
                $_SESSION['usermessage'] = "ERROR: User not found!"; //displays message to user
                header("Location: login.php"); //redirects user back to the login page
                exit; //stops further execution
            } else {
                $_SESSION['usermessage'] = "ERROR: Wrong Email or Password!";
                header('Location: login.php');
                exit; //stop further execution
            }

            //catches errors and sends messages to the user
        } catch(PDOException $e) {
            $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
            header("Location: login.php");
            exit;
        } catch(Exception $e) {
            $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
            header("Location: login.php");
            exit;
        }
    }




    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";
        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='assets/styles.css'>";
            echo "<title>Log In</title>";
        echo "</head>";

        echo "<body>";

            require "assets/header.php";

            echo "<br>";
            echo user_message();
            echo "<br>";

            echo "<h1 class='center'>Log In</h1>";
            echo "<form action='' method='post' class='center'>";

            echo "<br><label for='email'>Email:</label><br>";
            echo "<input type='text' name='email' id='email' required>";

            echo "<br><label for='password'>Password:</label><br>";
            echo "<input type='password' name='password' id='password' required>";

            echo "<br><input type='submit' name='submit' id='submit' value='Log In'>";

            echo "</form>";

            require "assets/footer.php";

        echo "</body>";

    echo "</html>";

