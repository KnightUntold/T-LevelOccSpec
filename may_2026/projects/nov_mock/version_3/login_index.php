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
            echo "<link rel='stylesheet' type='text/css' href='assets/styles.css'>";
            echo "<title>Home</title>";
        echo "</head>";

        echo "<body>";

            require "assets/header.php";


        echo "<div id='button'>";
            echo "<a href='book.php'>Book a Consultation/ Installation Today!</a>";
        echo "</div>";

        echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean viverra tellus eu semper convallis. Suspendisse ac lobortis est. Nulla lectus risus, convallis eu condimentum eu, placerat a felis. In viverra augue ut convallis rhoncus. Cras bibendum erat id turpis molestie lobortis. Etiam eget elit eget nisi mattis convallis. Praesent at pharetra nunc. Nullam viverra urna a enim gravida porta. Ut et sapien vehicula mauris lacinia laoreet sed nec odio. Nam placerat magna dui, non imperdiet ipsum accumsan eu. Curabitur lobortis eu orci malesuada sodales. </p>";

        echo "<div id='photo'>";
            echo "<img src='assets/photos/smart_home.jpg' alt='A photo of different sources green energy'>";
            echo "<img src='assets/photos/electric_car_2.jpg' alt='A photo of someone charging their car'>";
        echo "</div>";

            echo user_message();

            try {
                echo "";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            require "assets/footer.php";

        echo "</body>";

    echo "</html>";

    if (!$message) {
        echo user_message();
    } else {
        echo $message;
    }