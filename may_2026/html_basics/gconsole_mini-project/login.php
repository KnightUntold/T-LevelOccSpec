<?php

    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";
        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='../../reuseable_code/ezstyles.css'>";
            echo "<title>log in</title>";
        echo "</head>";
        echo "<body class='back_powderblue'>";
            echo "<header>";
                require "header.php";
            echo "</header>";
            echo "<form action='login.php' method='post' class='center'>";
                echo "<br><label for='username'>Username</label><br>";
                echo "<input type='text' name='username' placeholder='Username'><br>";
                echo "<label for='password'>Password</label><br>";
                echo "<input type='password' name='password' placeholder='Password'><br>";
                echo "<input type='submit' value='Login'>";
            echo "</form>";
            echo "<footer>";
                require "footer.php";
            echo "</footer>";
        echo "</body>";
    echo "</html>";
