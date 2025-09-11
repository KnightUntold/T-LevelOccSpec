<?php
include 'header.php';

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
    echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
        echo "<title>Movies</title>";
    echo "</head>";
    echo "<body>";
        echo "<h1>Studio Ghibli Films</h1>";
        echo "<div class='movie_list'>";
            echo "<a href='movies/grave_of_the_fireflies.php' class='image'><img src='movie-photos/grave_of_the_fireflies.jpg' alt='grave of the fireflies'></a>";
            echo "<a href='movies/howls_moving_castle.php' class='image'><img src='movie-photos/howls_moving_castle.jpg' alt='Howls Moving Castle'></a>";
            echo "<a href='movies/kikis_delivery_service.php' class='image'><img src='movie-photos/kikis_delivery_service.jpg' alt='Kikis Delivery Service'></a>";
            echo "<a href='movies/my_neighbour_totoro.php' class='image'><img src='movie-photos/My-Neighbour-Totoro.jpg' alt='My Neighbour totoro'></a>";
            echo "<a href='movies/ponyo.php' class='image'><img src='movie-photos/ponyo.jpg' alt='ponyo'></a>";
            echo "<a href='movies/when_marnie_was_here.php' class='image'><img src='movie-photos/when_marnie_was_here.webp' alt='when marnie was here'></a>";
        echo "</div>";
    echo "</body>";
echo "</html>";

include 'footer.php';
?>
