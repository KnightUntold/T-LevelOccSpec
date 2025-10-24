<?php
    echo "<header class='header back_005eb8'>"; #header tags so its seen as a header
        echo "<nav>"; #defines everything into a nav
            echo "<a href='index.php'><img src='../images/nhs_logo.png' alt='nhs logo' class='width10per'></a>";
                echo "<h3 class='right'>Primary Oaks Surgery</h3>";

                echo "<ul class='nav_bar'>"; #declares unordered list

                    if (!isset($_SESSION['user'])){
                        echo "<li><a class='white' href='index.php'>Home</a></li>";
                        echo "<li><a class='white' href='log_in.php'>Login</a></li>";
                        echo "<li><a class='white' href='sign_up.php'>Sign Up</a></li>";
                    } else {
                        echo "<li><a class='white' href='login_index.php'>Home</a></li>";
                        echo "<li><a class='white' href='book_appointment.php'>Book an Appointment</a></li>";
                        echo "<li><a class='white' href='booked_page.php'>View Appointments</a></li>";
                        echo "<li><a class='white' href=logout.php>Log out</a></li>";
                    }
                echo "</ul>";
        echo "</nav>";
    echo "</header>";
    ?>
