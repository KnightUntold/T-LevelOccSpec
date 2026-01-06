<?php

    if (!isset($_GET['message'])) {
        session_start();
        $message = false;
    } else {
        //decode the message for display
        $message = htmlspecialchars(urldecode($_GET['message']));
    }

    require_once "assets/dbconn.php";
    require_once "assets/common.php";

    echo "<!DOCTYPE html>";

        echo "<html lang='en'>";
            echo "<head>";
                echo "<meta charset='UTF-8'>";
                echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
                echo "<link rel='stylesheet' type='text/css' href='assets/styles.css'>";
                echo "<title>Home</title>";
            echo "</head>";

            echo "<body>";

                require "assets/header.php";
                echo "<div id='main_content'>";
                    echo "<div id='info'>";
                        echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean viverra tellus eu semper convallis. Suspendisse ac lobortis est. Nulla lectus risus, convallis eu condimentum eu, placerat a felis. In viverra augue ut convallis rhoncus. Cras bibendum erat id turpis molestie lobortis. Etiam eget elit eget nisi mattis convallis. Praesent at pharetra nunc. Nullam viverra urna a enim gravida porta. Ut et sapien vehicula mauris lacinia laoreet sed nec odio. Nam placerat magna dui, non imperdiet ipsum accumsan eu. Curabitur lobortis eu orci malesuada sodales. Nullam mollis vel dolor a consequat. Cras eget lectus libero. Integer non lorem aliquam, placerat velit sed, tincidunt eros.</p>";
                        echo "<p>Mauris finibus dui vitae libero accumsan, sed pretium enim ultricies. Curabitur elementum consequat est, ac placerat nunc. Donec lobortis dignissim nunc, sed aliquet neque bibendum in. Ut eu odio vestibulum, sagittis metus nec, luctus urna. Duis semper rutrum metus in vestibulum. Ut dignissim semper tellus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris porta, felis non ultricies aliquet, metus neque accumsan est, a facilisis ipsum ex nec erat.</p>";
                        echo "<p>Suspendisse non turpis ut nulla consectetur malesuada a et enim. Maecenas tempor ipsum ut cursus varius. Sed sit amet facilisis justo, a condimentum elit. Sed elementum posuere orci, ac dapibus sapien pretium non. Sed a lorem hendrerit, interdum lacus nec, ultricies mi. Pellentesque ac nibh lectus. Donec vitae arcu eget ipsum ornare gravida sit amet tincidunt ex. Mauris sed lectus condimentum, pretium eros sed, suscipit ligula. Curabitur sit amet nibh augue. Quisque scelerisque tempus libero bibendum porttitor. Nunc purus dui, interdum at commodo sit amet, luctus molestie elit. Quisque faucibus justo rhoncus nisl placerat malesuada.</p>";
                        echo user_message();
                    echo "</div>";

                    echo "<div id='photo2'>";
                        echo "<div class='img_con'><img src='assets/photos/green_energy.jpg' alt='A photo of different sources green energy'></div>";
                        echo "<div class='img_con'><img src='assets/photos/electric_car_charger.jpg' alt='A photo of someone charging their car'></div>";
                    echo "</div>";


                echo "</div>";

                echo "<div id='button'>";
                    echo "<a href='calculator.php'>Calculate your Carbon Footprint Today!</a>";
                echo "</div>";

                try {
                    echo "";
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                require "assets/footer.php";

            echo "</body>";

        echo "</html>";


    if (!$message) {
        echo user_message();
    } else {
        echo $message;
    }
