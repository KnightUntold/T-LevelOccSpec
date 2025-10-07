<?php
    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";
        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='../../reuseable_code/ezstyles.css'>";
            echo "<title>Sign Up</title>";
        echo "</head>";

        echo "<body>";

            require "header.php";

            echo "<h1 class='center'>Sign Up</h1>";
            echo "<form action='' method='post' class='center'>";
                echo "<label for='fname'>First name:</label><br>";
                echo "<input type='text' name='fname' id='fname'><br>";

                echo "<label for='lname'>Last name:</label><br>";
                echo "<input type='text' name='lname' id='lname'><br>";

                echo "<label for='email'>Email:</label><br>";
                echo "<input type='email' name='email' id='email'><br>";

                echo "<label for='phone'>Phone Number:</label><br>";
                echo "<input type='tel' name='phone' id='phone'><br>";

                echo "<label for=dob'>Date of Birth:</label><br>";
                echo "<input type='date' name='dob' id='dob'><br>";

                echo "<label for='password'>Password:</label><br>";
                echo "<input type='password' name='password' id='password'><br>";

                echo "<label for='password2'>Confirm Password:</label><br>";
                echo "<input type='password' name='password2' id='password2'><br>";

                echo "<br><input type='submit' name='submit' id='submit' value='Sign Up'>";
            echo "</form>";

            require "footer.php";

        echo "</body>";

    echo "</html>";