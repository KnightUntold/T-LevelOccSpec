<?php
    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";

        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='../../reuseable_code/ezstyles.css'>";
            echo "<title>Book an Appointment</title>";
        echo "</head>";

        echo "<body>";

            require "header.php";

            echo "<form action='' method='post' class='center'>";

                echo "<br><label for='app_kind'>Kind of Appointment:</label><br>";
                echo "<input type='text' name='app_kind' id='app_kind' required='true' placeholder='Please Enter the kind of appointment you need:'>";

                echo "<br><label for='app_reason'>Reason for Appointment:</label><br>";
                echo "<input type='text' name='app_reason' id='app_reason' required='true' placeholder='Please Enter the reason for appointment:'>";

                echo "<br><label for='pref_con'>Preferred Contact Method:</label><br>";
                echo "<select name='pref_con' id='pref_con' required='true'>";
                    echo "<option value='' disabled selected>Please pick a Prefered Contact Method:</option>";
                    echo "<option value='email'>Email</option>";
                    echo "<option value='phone'>Phone</option>";
                echo "</select>";

                echo "<br><label for='app_date'>Appointment Date:</label><br>";
                echo "<input type='date' name='app_date' id='app_date'>";

                echo "<br><label for='app_time'>Appointment Time:</label><br>";
                echo "<select name='pref_con' id='pref_con' required='true'>";
                    echo "<option value='' disabled selected>Please pick a timeslot: </option>";
                    echo "<option value='email'>Email</option>";
                    echo "<option value='phone'>Phone</option>";
                echo "</select>";

                echo "<br><label for='accom'>Accommodations:</label><br>";
                echo " <textarea cols='46' rows='8' name='accom' id='accom' placeholder = 'Please let us know about any accomidations you may need:' maxlength= '500'></textarea>";

                echo "<br><input type='submit' name='submit' id='submit' value='Book Appointment'>";

            echo "</form>";

            require "footer.php";

        echo "</body>";

    echo "</html>";