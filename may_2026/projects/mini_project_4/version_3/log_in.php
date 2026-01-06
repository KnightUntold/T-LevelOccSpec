<?php

    session_start();

    require_once "assets/dbconn.php";
    require_once "assets/common.php";

    if (isset($_SESSION['user'])) {
        $_SESSION['ERROR'] = "ERROR: You are already logged in!";
        header('Location: login_index.php');
        exit; //stop further execution
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usr = login(dbconnect_select(), $_POST);

        if ($usr && password_verify($_POST['password'], $usr['password'])) { //this condition isnt being met which means no one can log in
            $_SESSION['user'] = true;
            $_SESSION['usermessage'] = "SUCCESS: User Successfully Logged In!" . $_SESSION['patid'];
            $_SESSION['patid'] = $usr['patient_id'];
            audtitor(dbconnect_insert(), $_SESSION['patid'], "log", "User has successfully logged in");
            header('Location: login_index.php');
            exit;
        } else {
            $_SESSION['usermessage'] = "ERROR: Wrong Email or Password!";
            header('Location: index.php');
            exit; //stop further execution
        }
    }


    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";
        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='../../../reuseable_code/ezstyles.css'>";
            echo "<title>Log In</title>";
        echo "</head>";

        echo "<body>";

            require "header.php";

            echo "<br>";
            echo user_message();
            echo "<br>";

            echo "<h1 class='center'>Log In</h1>";
            echo "<form action='' method='post' class='center'>";
                echo "<label for='fname'>First name:</label><br>";
                echo "<input type='text' name='fname' id='fname' required>";

                echo "<br><label for='lname'>Last name:</label><br>";
                echo "<input type='text' name='lname' id='lname' required>";

                echo "<br><label for='email'>Email:</label><br>";
                echo "<input type='text' name='email' id='email' required>";

                echo "<br><label for='phone'>Phone Number:</label><br>";
                echo "<input type='tel' name='phone' id='phone' required>";

                echo "<br><label for='password'>Password:</label><br>";
                echo "<input type='password' name='password' id='password' required>";

                echo "<br><input type='submit' name='submit' id='submit' value='Log In'>";
            echo "</form>";

            require "footer.php";

        echo "</body>";

    echo "</html>";