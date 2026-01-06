<?php
    echo "<header class='header'>";  // header tags since its the header
        echo"<nav class='nav_color'>"; // defines everything into a nav
            echo "<a><img src='photos/leaf_logo_temp.avif' alt='leaf rolsa technologies logo'></a>";
            echo "<h3>Rolsa Technologies</h3>"; // temporary text (would be replaced with logo)

            echo "<ul class='nav_bar'>"; //declared an unordered list

            if (!isset($_SESSION['user'])){ //this changes what appears on the navbar depending on if the user is logged in or not.
                echo "<li><a href='index.php'>Home</a></li>";
                echo "<li><a href='calculator.php'>Carbon Calculator</a></li>";
                echo "<li><a href='login.php'>Login</a></li>";
                echo "<li><a href='sign_up.php'>Sign Up</a></li>";
            } else {
                echo "<li><a href='login_index.php'>Home</a></li>";
                echo "<li><a href='book.php'>Book</a></li>";
                echo "<li><a href='bookings.php'>View Bookings</a></li>";
                echo "<li><a href='settings.php'>Settings</a></li>";
                echo "<li><a href='logout.php'>Logout</a></li>";
            }

            echo "</ul>";
        echo "</nav>";
    echo "</header>";