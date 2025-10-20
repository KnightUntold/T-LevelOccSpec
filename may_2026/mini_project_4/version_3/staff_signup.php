<?php
    session_start();

    require_once "assets/dbconn.php";
    require_once "assets/staff_common.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if(!username_ver(dbconnect_select(), $_POST['username'])) {
            if (reg_staffuser(dbconnect_insert(), $_POST)) {
                audtitor(dbconnect_insert(),getnewuserid(dbconnect_select(), $_POST['username']), "reg","New staff user registered");
                $_SESSION['usermessage'] = "USER CREATED SUCCESSFULLY";
                header('Location: staff_login.php');
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
        echo "<title>Staff Sign Up</title>";
        echo "</head>";

        echo "<body>";

            require "header.php";

            echo "<h1 class='center'>Sign Up</h1>";
            echo "<form action='' method='post' class='center'>";
                echo "<label for='email'>Email: </label><br>";
                echo "<input type='email' name='email' id='email' required><br>";

                echo "<label for='username'>Username:</label><br>";
                echo "<input type='text' name='username' id='username' required><br>";

                echo "<label for=sname'>Surname:</label><br>";
                echo "<input type='text' name='sname' id='sname' required><br>";

                echo "<label for=fname'>Firstname:</label><br>";
                echo "<input type='text' name='fname' id='fname' required><br>";

                echo "<label for='staff'>Staff Type:</label><br>";
                echo "<input type='text' name='staff' id='staff' required><br>";

                echo "<label for='room'>Room:</label><br>";
                echo "<input type='text' name='room' id='room' required><br>";

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