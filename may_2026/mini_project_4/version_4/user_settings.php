<?php
    session_start();

    require_once "assets/dbconn.php"; //calls in the connection to the database and common.php where a lot of subroutines are
    require_once "assets/common.php"; //this improves the reuseability of code and lessens processing time

    if (!isset($_SESSION['user'])){ //this redirects you to the login page if you aren't logged in so that a unlogged in user can't input into the database
        $_SESSION['usermessage'] = "ERROR: You need to be logged in!"; //this improves the security of the system because someone
        header("Location: log_in.php"); //trying to break into the system can't input anything into the database without a login
        exit;
    }

    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";

        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='../../reuseable_code/ezstyles.css'>";
            echo "<title>Settings</title>";
        echo "</head>";

        echo "<body>";

            require "assets/header.php";

            echo "<p>View Audit</p>";

            echo "<a href='user_settings_opts/user_viewaudits.php'><button name='useraudit' >View your Audits</button></a>";

            echo "<p>Change Personal Details</p>";

            echo "<a href='user_settings_opts/user_changepassword.php'><button  name='userpasschange'>Change Password</button></a>";

            echo "<input type='submit' name='userpasschange' value='Change Name' />";

            echo "<input type='submit' name='useremailchange' value='Change Email' />";

            echo "<input type='submit' name='userphonechange' value='Change Phone Number' />";



            echo user_message();

            try {
                echo "";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            require "assets/footer.php";


        echo "</body>";

    echo "</html>";

