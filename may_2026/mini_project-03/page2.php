<?php

    require_once "common.php"; //requires the common to get the functions but only once

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { //lets the form move to the php
        $_SESSION['msg'] = $_POST['password'];
    }

    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='styles.css'>"; //links the stylesheet
            echo "<title>Password Checker</title>";
        echo "</head>";
        echo "<body>";
            require "header.php"; //gets the header

            echo "<form  method='post' action=''>"; //sets the form method to post
                echo "<input type='text' name='password' id='password' placeholder='Enter Password Here'>"; //user input
                echo "<input type='submit' name='submit' id='submit' value='Submit'>"; //user input
            echo "</form>";
            
    $password = $_POST['password']; //gets the user input as a variable to use to check different factors


    $length = strlen($password);
    $uppercase = hasUpperCase($password); //from here these link to functions in common.php
    $lowercase = hasLowerCase($password);
    $number = hasNumber($password);
    $special = hasSpecialCharacter($password);
    $has_password = hasPassword($password);/*sets the position for left*/
    $special_first = hasSpecialCharacter($password[0]); //checks the requirements of certain characters
    $special_last = hasSpecialCharacter($password[$length - 1]);
    $number_first = hasNumber($password[0]);

    //these need fixing, all should word expect for has password, doesnt validate out certain characters
    if ($length < 8) { //if statement to go through each password condition
        echo "Password length must be at least 8 characters long.<br>";
    }  else {
        echo "Password length is 8 characters long.<br>";
    }
    if (!$uppercase) {
        echo "Password must have at least one uppercase letter.<br>";
    }  else {
        echo "Password has at least one capital letter.<br>";
    }
    if (!$lowercase) {
        echo "Password must have at least one lowercase letter.<br>";
    }  else {
        echo "Password has at least one lowercase letter.<br>";
    }
    if (!$number) {
        echo "Password must have at least one number.<br>";
    } else {
        echo "Password has at least one number.<br>";
    }
    if (!$special) {
        echo "Password must have at least one special character.<br>";
    } else {
        echo "Password has at least one special character.<br>";
    }
    /*if ($has_password) { //this one doesn't work
        echo "Password cannot contain 'password'.<br>";
    } else {
        echo "Password does not contain 'password'.<br>";
    }*/
    if ($special_first) {
        echo "Password cannot have a special character as the first character.<br>";
    } else {
        echo "Password does not have a special character as the first character.<br>";
    }
    if ($special_last) {
        echo "Password cannot have a special character as last character.<br>";
    } else {
        echo "Password does not have a special character as last character.<br>";
    }
    if ($number_first) {
        echo "Password cannot have a number as the first character.<br>";
    } else {
        echo "Password does not have a number as the first character.<br>";
    }

        require "footer.php"; //gets the footer
    echo "</body>";
echo "</html>";
