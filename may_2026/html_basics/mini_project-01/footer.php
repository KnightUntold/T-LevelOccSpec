<?php
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
    echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
    echo "</head>";
    echo "<body>";
        echo "<footer class='footer'>";
            echo "<br>";
            require "contact.php";
            echo "<br>";
            echo "<hr>";

            echo "&copy"; echo date("Y");
        echo "</footer>";
    echo "</body>";
echo "</html>";

