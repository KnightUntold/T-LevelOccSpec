<?php

    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";
        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
            echo "<title>Home</title>";
        echo "</head>";
        echo "<body>";
            echo "<header>";
                require "header.php";
            echo "</header>";
            echo "<form action='register.php' method='post'>";
                echo "<input type='text' name='username' placeholder='Username'>";
                echo "<input type='password' name='password' placeholder='Password'>";
                echo "<input type='submit' value='Login'>";
            echo "</form>";
            echo "<footer>";
                require "footer.php";
            echo "</footer>";
        echo "</body>";
    echo "</html>";
