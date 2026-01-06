<?php
    echo "<header class='header back_blue white'>"; #header tags so its seen as a header
        echo "<nav>"; #defines everything into a nav
            echo "<h1>video games</h1>";
            echo "<div class='nav_bar'>";
                echo "<ul >"; #declares unordered list
                echo "<li><a class='white' href='index.php'>Home</a></li>";

                if (!isset($_SESSION['user'])){
                    echo "<li><a class='white' href='login.php'>Login</a></li>";
                    echo "<li><a class='white' href='register.php'>Sign Up</a></li>";
                } else {
                    echo "<li><a class='white' href=con_reg.php>Register a console</a></li>";
                    echo "<li><a class='white' href=logout.php>Log out</a></li>";
                }
                echo "</ul>";
            echo "</div>";
        echo "</nav>";
    echo "</header>";
?>
