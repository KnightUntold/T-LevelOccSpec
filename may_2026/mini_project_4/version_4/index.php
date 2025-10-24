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
                echo "<link rel='stylesheet' type='text/css' href='../../reuseable_code/ezstyles.css'>";
                echo "<title>Home</title>";
            echo "</head>";

            echo "<body>";

                require "assets/header.php";

                echo "<h1 class='center'>Book a GP appointment</h1>";
                echo "<a href='sign_up.php' class='button back_005eb8 white'>Sign Up</a>";
                echo "<a href='log_in.php' class='button back_005eb8 white'>Log In</a>";
                echo "<br>";
                echo user_message();

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