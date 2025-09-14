<?php

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
    echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<link rel='stylesheet' type='text/css' href='styles.css'>";
    echo "</head>";
    echo "<body>";
        echo "<form method='post' action='contact.php' id='contact-form'>";
            echo "<h2>Contact Us</h2>";
            echo " <label for='name'>Name:</label><br>";
            $name = "<input type='text' name='name' id='name' placeholder='Name' required='true'>";
            echo $name;
            echo "<br><label for='email'>Email:</label><br>";
            $email = "<input type='email' name='email' id='email' placeholder='Email' required='true'>";
            echo $email;
            echo "<br><label for='subject'>Subject:</label><br>";
            $subject = "<select name='subject' id='subject' required='true'>";
            echo $subject;
            echo "<option value='' disabled selected>Choose Subject</option>";
            echo "<option value='movies'>movies</option>";
            echo "<option value='enquiries'>enquiries</option>";
            echo "<option value='vacancies'>job vacancies</option>";
            echo "</select>";
            echo "<br><label for='message'>Message:</label><br>";
            $message =  "<textarea cols='30' rows='4' name='message' id='message' required='true' placeholder ='message' maxlength= '500'></textarea>";
            echo $message;
            echo "<br><br>";
            echo "<input type='submit' name='submit' value='Submit'>";
            echo "<br><br>";
        echo "</form>";
    echo "</body>";
echo "</html>";

?>
