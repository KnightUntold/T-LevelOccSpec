<?php
    echo "<header class='header'>"; #header tags so its seen as a header
        echo "<nav>"; #defines everything into a nav
            echo "<h1>Password checker</h1>";
            echo "<div class='right_bar'>";
                echo "<ul>"; #declares unordered list
                    echo "<li><a href='index.php'>Home</a></li>";
                echo "</ul>";
                echo "<button type='button'>Check Password Now</button>";
            echo "</div>";
        echo "</nav>";
    echo "</header>";
?>
