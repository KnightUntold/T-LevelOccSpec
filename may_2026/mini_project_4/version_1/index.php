<?php
    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";
        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='../../reuseable_code/ezstyles.css'>";
            echo "<title>Home</title>";
        echo "</head>";

        echo "<body>";

            require "header.php";

            echo "<h1 class='center'>Book a GP appointment</h1>";
            echo "<a href='sign_up.php' class='button back_005eb8 white'>Sign Up</a>";
            echo "<a href='log_in.php' class='button back_005eb8 white'>Log In</a>";

            require "footer.php";

        echo "</body>";

    echo "</html>";