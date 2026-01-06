<?php

    session_start();

    require_once "assets/dbconn.php";
    require_once "assets/common.php";

    if (!isset($_SESSION['user_id'])) {  # If they have managed to get to this page without logging in
        $_SESSION['usermessage'] = "ERROR: You are not logged in!";
        header("Location: login.php");
        exit;
    } elseif($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["apptdelete"])) {
            try {
                if (cancel_appt(dbconn_delete(), $_POST['apptid'])) {
                    $_SESSION['usermessage'] = "SUCCESS: Appointment has been cancelled.";
                    audtitor(dbconn_insert(), $_SESSION['user_id'], "apt", "User has successfully cancelled appointment.");
                } else {
                    $_SESSION['usermessage'] = "ERROR: Could not be able to execute complete this action";
                }
            } catch (PDOException $e) {
                $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
            } catch (Exception $e) {
                $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
            }
        } elseif (isset($_POST['apptchange'])) {
            $_SESSION['apptid'] = $_POST['apptid'];
            header("Location: change_book_app.php");
            exit;
        }
    }

    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";

        echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo "<link rel='stylesheet' type='text/css' href='assets/styles.css'>";
            echo "<title>Bookings</title>";
        echo "</head>";

        echo "<body>";

            require "assets/header.php";

            echo "<h2> Rolsa Technologies - Your Bookings</h2>";

            echo "<p> Below are your bookings: </p>";
            $appts = appt_getter(dbconn_select());
            if (!$appts) {
                echo "<p>There are no appointments found.</p>";
            } else {
                echo "<table id='bookings'>";

                foreach ($appts as $appt) { //gets the staff type in the db and makes it into a presentable format
                    if ($appt['type'] = "con") {
                        $role = "Consultation";
                    } else if ($appt['type'] = "ins") {
                        $role = "Installation";
                    }

                    echo "<form action='' method='post'>"; //creating a form per each entry into the table

                    echo "<tr>";
                    echo "<td> Date: " . date('M d, Y @ h:i A', $appt['epoch_app_date']) . "</td>";
                    echo "<td> Made on: " .  $appt['link_date'] . "</td>";
                    echo "<td> for  a: " . $role . " " . $appt['option_name'] . "</td>";
                    echo "<td><input type='hidden' name='apptid' value=".$appt['link_id']."> 
                                                       <input type='submit' name='apptdelete' value='Cancel Appt' />
                                                       <input type='submit' name='apptchange' value='Change Appt' /></td>";

                    echo "</tr>";
                    echo "</form>";
                }
                echo "</table>";
            }


            echo user_message();

            try {
                echo "";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            require "assets/footer.php";

        echo "</body>";

    echo "</html>";