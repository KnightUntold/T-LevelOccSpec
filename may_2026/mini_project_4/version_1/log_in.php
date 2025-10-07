<?php
    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";
        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='../../reuseable_code/ezstyles.css'>";
            echo "<title>Log In</title>";
        echo "</head>";

        echo "<body>";

            require "header.php";

            echo "<h1 class='center'>Log In</h1>";
            echo "<form action='' method='post'>";
                echo "<label for='fname'>First name:</label>";
            echo "</form>";

            require "footer.php";

        echo "</body>";

    echo "</html>";