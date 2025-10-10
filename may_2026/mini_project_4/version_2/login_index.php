<?php

    if (!isset($_GET['message'])) {
        session_start();
        $message = false;
    } else {
        //decode the message for display
        $message = htmlspecialchars(urldecode($_GET['message']));
    }

    require_once "assets/dbconn.php";
    require_once "assets/common.php";


    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";

        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='../../reuseable_code/ezstyles.css'>";
            echo "<title>Appointment Booked Successfully</title>";
        echo "</head>";

        echo "<body>";

            require "header.php";

                echo "<h3>Book an Appointment Today!</h3>";
                echo "<a href='book_appointment.php' class='button back_005eb8 white'>Book an Appointment</a>";

                echo user_message();

                try {
                    echo "";
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

            require "footer.php";

        echo "</body>";

    echo "</html>";

    if (!$message) {
        echo user_message();
    } else {
        echo $message;
    }