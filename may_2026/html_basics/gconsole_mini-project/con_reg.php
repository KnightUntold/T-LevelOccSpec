<?php
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
    echo "<form action='register.php' method='post' class='center'>";
        echo "<label for='manufacturer'>Manufacturer</label><br>";
        echo "<input type='text' name='manufacturer' placeholder='Manufacturer'><br>";

        echo "<label for='console_name'>Console Name</label><br>";
        echo "<input type='text' name='console_name' placeholder='Console Name'><br>";

        echo "<label for='console_release_date'>Console Release Date</label><br>";
        echo "<input type='date' name='console_release_date'><br>";

        echo "<label for='controller'>No of Controllers</label><br>";
        echo "<input type='text' name='controller' placeholder='Controller'><br>";

        echo "<label for='bits'>No of Bits</label><br>";
        echo "<input type='text' name='bits' placeholder='bit'><br>";

        echo "<input type='submit' value='Submit'><br>";
    echo "</form>";

            echo "<footer>";
            require "footer.php";
            echo "</footer>";
        echo "</body>";
    echo "</html>";
