<?php
    if (!isset($_GET['message'])) {
        session_start();
        $message = false;
    } else {
        //decode the message for display
        $message = htmlspecialchars(urldecode($_GET['message']));
    }

    require_once "../reuseable_code/dbconn.php";
    require_once "../reuseable_code/common.php";

    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='../reuseable_code/ezstyles.css'>";
            echo "<title>Home</title>";
        echo "</head>";
        echo "<body class='back_powderblue'>";
            echo "<header>";
                require "header.php";
            echo "</header>";
                echo "<img src='photos/video_game_photo.webp' alt='video game footage'>";
                echo "<br>";
                echo user_message();

                try {
                    echo "success";
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

            echo "<footer>";
                require "footer.php";
            echo "</footer>";
        echo "</body>";
    echo "</html>";


    if (!$message) {
        echo user_message();
    } else {
        echo $message;
    }
