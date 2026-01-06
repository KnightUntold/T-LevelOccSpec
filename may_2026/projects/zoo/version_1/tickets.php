<?php

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

            $type = type_getter(dbconn_select());

            echo "<h3>Check Ticket availability</h3>";
            echo "<form action='' method='post'>";
                echo "<select name='type'>";

                echo "</select>";

                echo "<br>";

                echo "<label for='amount'>Amount of tickets</label>";
                echo "<input type='number' name='amount' id='amount' min='1' max='999'>";

                echo "<br>";

                echo "<input type='time' >"; //for now this doesnt matter, ill do it later

                echo "<br>";

                echo "<input type='submit' value='Check'>";

           echo "</form>";
            echo user_message();


            require "assets/footer.php";

        echo "</body>";

    echo "</html>";
