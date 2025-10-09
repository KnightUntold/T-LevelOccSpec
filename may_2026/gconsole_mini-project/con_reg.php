<?php
    session_start();

    require_once "../reuseable_code/dbconn.php"; //calls in the connection to the database and common.php where a lot of subroutines are
    require_once "../reuseable_code/common.php"; //this improves the reuseability of code and lessens processing time

    if (!isset($_SESSION['user'])){ //this redirects you to the login page if you aren't logged in so that a unlogged in user can't input into the database
        $_SESSION['usermessage'] = "ERROR: You need to be logged in!"; //this improves the security of the system because someone
        header("Location: login.php"); //trying to break into the system can't input anything into the database without a login
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        try {
         new_console(dbconnect_insert(), $_POST); //calling a subroutine and passing another subroutine through it because if the connection is successful, it sends $conn
            $_SESSION['usermessage'] = "SUCCESS: Console created!";
        } catch (PDOException $e) {
            $_SESSION['usermessage'] = $e->getMessage();
        }
    }


    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='../reuseable_code/ezstyles.css'>";
            echo "<title>Register a console</title>";
        echo "</head>";
        echo "<body class='back_powderblue'>";
            echo "<header>";
            require "header.php";
            echo "</header>";
            echo "<br>";
            echo user_message();
            echo "<br>";
    echo "<form action='' method='post' class='center'>";
        echo "<label for='manufacturer'>Manufacturer</label><br>";
        echo "<input type='text' name='manufacturer' placeholder='Manufacturer'><br>";

        echo "<label for='console_name'>Console Name</label><br>";
        echo "<input type='text' name='c_name' placeholder='Console Name'><br>";

        echo "<label for='console_release_date'>Console Release Date</label><br>";
        echo "<input type='date' name='release_date'><br>";

        echo "<label for='controller'>No of Controllers</label><br>";
        echo "<input type='text' name='controller_no' placeholder='Controller'><br>";

        echo "<label for='bits'>No of Bits</label><br>";
        echo "<input type='text' name='bit' placeholder='bit'><br>";

        echo "<input type='submit' value='Submit'><br>";
    echo "</form>";

            echo "<footer>";
            require "footer.php";
            echo "</footer>";
        echo "</body>";
    echo "</html>";
