<?php
    session_start();

    require_once "../reuseable_code/dbconn.php";
    require_once "../reuseable_code/common.php";

    if (isset($_SESSION['user'])) {
        $_SESSION['ERROR'] = "ERROR: You are already logged in!";
        header('Location: index.php');
        exit; //stop further execution
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usr = login(dbconnect_select(), $_POST);

        if ($usr && hasPassword($_POST['password'], $usr['password'])) {
            $_SESSION['user'] = true;
            $_SESSION['usermessage'] = "SUCCESS: User Successfully Logged In!";
            $_SESSION['userid'] = $usr['user_id'];
            audtitor(dbconnect_insert(), $_SESSION['userid'], "log", "User has successfully logged in");
            header('Location: index.php');
            exit;
        } else {
            $_SESSION['usermessage'] = "ERROR: Wrong Username or Password!";
            header('Location: index.php');
            exit; //stop further execution
        }
    }

    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";
        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='../reuseable_code/ezstyles.css'>";
            echo "<title>log in</title>";
        echo "</head>";
        echo "<body class='back_powderblue'>";
            echo "<header>";
                require "header.php";
            echo "</header>";
            echo "<br>";
            echo user_message();
            echo "<br>";
            echo "<form action='' method='post' class='center'>";
                echo "<br><label for='username'>Username</label><br>";
                echo "<input type='text' name='username' placeholder='Username'><br>";
                echo "<label for='password'>Password</label><br>";
                echo "<input type='password' name='password' placeholder='Password'><br>";
                echo "<input type='submit' value='Login'>";
            echo "</form>";
            echo "<footer>";
                require "footer.php";
            echo "</footer>";
        echo "</body>";
    echo "</html>";
