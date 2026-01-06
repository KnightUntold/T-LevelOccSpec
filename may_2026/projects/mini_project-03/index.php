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
            require "header.php"; //this means that the header is a requirement
            echo "<div id='title_area'>";
                echo "<h1>Password Safety</h1>";
                echo "<p>Test your Password strength today!</p>";
                echo "<button type='button' onclick='toPassword()'>Password Checker</button>"; //this uses javascript to link page 2 from the button
            echo "</div>";
            echo "<div id='photo_gallery' class='slider'>"; //image slider
                echo "<div id='photos'>";
                    echo "<img class='slide' src='stock-images/guy_gun_computer.jpg' alt='guy pointing a gun at a computer'>";
                    echo "<img class='slide' src='stock-images/man_coffee_computer.webp' alt='a man holding a coffee cup next to a laptop'>";
                    echo "<img class='slide' src='stock-images/password_and_user.jpg' alt='A image of someone entering their username and password'>";
                    echo "<img class='slide' src='stock-images/people.jpg' alt='2 people sitting in the living room together using computers'>";
                echo "</div>";
                echo "<button class='prev' onclick='prevSlide()'>&#10094</button>";
                echo "<button class='next' onclick='nextSlide()'>&#10095</button>";
            echo "</div>";
            echo "<div>";
                echo "<h2>The Importance of Secure passwords</h2>"; //placeholder text
                echo "<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>";
                echo "<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>";
                echo "<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>";
                echo "<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>";
                echo "<p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>";
            echo "</div>";

            require "footer.php"; //this means that the page requires the footer to work
            echo "<script src='script.js'></script>"; //links to javascript for the image slider
        echo "</body>";
    echo "</html>";

