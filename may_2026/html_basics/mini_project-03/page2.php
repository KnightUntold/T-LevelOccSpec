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

            require "footer.php"; //gets the footer
        echo "</body>";
    echo "</html>";





    $password = $_POST['password']; //gets the user input as a variable to use to check different factors


    $length = strlen($password);
    $uppercase = hasUpperCase($password); //from here these link to functions in common.php
    $lowercase = hasLowerCase($password);
    $number = hasNumber($password);
    $special = hasSpecialCharacter($password);

    if ($length < 8) {
        echo "Password length must be at least 8 characters long.";
    } else if ($uppercase != "") {
        echo "Password length must be at least one uppercase letter.";
    } else if ($lowercase != "") {
        echo "Password length must be at least one lowercase letter.";
    } else if ($number != "") {
        echo "Password length must be at least one number.";
    } else if ($special != "") {
        echo "Password length must be at least one special character.";
    }