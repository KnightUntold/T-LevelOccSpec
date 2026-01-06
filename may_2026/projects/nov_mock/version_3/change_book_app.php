<?php

    session_start();

    require_once "assets/dbconn.php"; //calls in the connection to the database and common.php where a lot of subroutines are
    require_once "assets/common.php"; //this improves the reuseability of code and lessens processing time

    if (!isset($_SESSION['user_id'])){ //this redirects you to the login page if you aren't logged in so that an unlogged in user can't input into the database
        $_SESSION['usermessage'] = "ERROR: You need to be logged in!"; //this improves the security of the system because someone
        header("Location: login.php"); //trying to break into the system can't input anything into the database without a login
        exit;
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") { //this needs to be at the top because it needs to load first to ensure that the code runs as intended

        try {

            $tmp = $_POST["app_date"] . ' ' . $_POST["app_time"]; //turn app_date and time into epoch time
            $epoch_time = strtotime($tmp);
            if (appt_update(dbconn_update(), $_SESSION['apptid'], $epoch_time)) {
                $_SESSION['usermessage'] = "SUCCESS: Appointment Updated Successfully!";
                unset($_SESSION['apptid']);
                audtitor(dbconn_insert(), $_SESSION['user_id'], "apt", "User has changed appointment");
                header("Location: bookings.php");
                exit;
            } else {
                $_SESSION['usermessage'] = "ERROR: Appointment Update failed!";
                unset($_SESSION['apptid']);
                header("Location: bookings.php");
                exit;
            }

        } catch (PDOException $e) {
            $_SESSION['usermessage'] = "ERROR: " . $e->getMessage(); //to catch errors
        } catch (Exception $e) {
            $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
        }
    }

    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";

        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='assets/styles.css'>";
            echo "<title>Alter an Appointment</title>";
        echo "</head>";

        echo "<body>";

        require "assets/header.php";

        $appt = appt_fetch(dbconn_select(), $_SESSION['apptid']);

        echo "<form action='' method='post' class='center'>";

        $contype = con_getter(dbconn_select());

        $instype = ins_getter(dbconn_select());





        echo "<br><label for='app_type' id='app_type'>Booking type</label><br>";
        echo "<select name='app_type'>";
            echo "<option disabled>Please Select an option</option>";

            foreach ($contype as $ty) { //this works but code would be better if it wasn't repeating and would just
                if ($ty['type'] = "con") {  //select all of them and sort them. lI just do not have the knowledge or
                    $role = "Consultation - "; //time to improve it
                }
                echo "<option value =" . $ty['opt_id'] . "> " .$role. $ty['option_name'] . "</option>";
            }

            foreach ($instype as $ty) {
                if ($ty['type'] = "ins") {
                    $role = "Installation - ";
                }
                echo "<option value =" . $ty['opt_id'] . "> " .$role. $ty['option_name'] . "</option>";
            }

        echo "</select>";

        $apt_time = date('H:i:s', $appt['epoch_app_date']);
        $apt_date = date('Y-m-d', $appt['epoch_app_date']);

        echo "<br><label for='app_date'>Appointment Date:</label><br>";
        echo "<input type='date' name='app_date' id='app_date value='" . $apt_date . "' required>";

        echo "<br><label for='app_time'>Appointment Time:</label><br>";
echo "<input type='time' name='app_time' id='app_time value='" . $apt_time . "' required>";

        echo "<br><input type='submit' name='submit' id='submit' value='Update Appointment'>";

        echo "</form>";

        echo "<br>";
        echo user_message();
        echo "<br>";

        require "assets/footer.php";

        echo "</body>";

    echo "</html>";