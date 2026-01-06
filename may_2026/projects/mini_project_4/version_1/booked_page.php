<?php
    echo "<!DOCTYPE html>";

        echo "<html lang='en'>";

        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='../../../reuseable_code/ezstyles.css'>";
            echo "<title>Appointment Booked Successfully</title>";
        echo "</head>";

        echo "<body>";

            require "header.php";

            echo "<h1 class='center'>Appointment Booked for [date and time here]</h1>";

            require "footer.php";

        echo "</body>";

    echo "</html>";