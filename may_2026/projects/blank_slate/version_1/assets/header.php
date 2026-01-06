<?php
    echo "<header class='header back_005eb8'>"; #header tags so its seen as a header
    echo "<nav>"; #defines everything into a nav

    echo "<ul class='nav_bar'>"; #declares unordered list

    if (!isset($_SESSION['user'])){
        echo "<li><a class='white' href='index.php'>Home</a></li>";
        echo "<li><a class='white' href='login.php'>Login</a></li>";
        echo "<li><a class='white' href='sign_up.php'>Sign Up</a></li>";
    } else {
        echo "<li><a class='white' href='login_index.php'>Home</a></li>";
        echo "<li><a class='white' href='book.php'>Book</a></li>";
        echo "<li><a class='white' href='view_book.php'>View Appointments</a></li>";
        echo "<li><a class='white' href='logout.php'>Log out</a></li>";
        echo "<li><a class='white' href='settings.php'>Settings</a></li>";
    }
    echo "</ul>";
    echo "</nav>";
    echo "</header>";
?>