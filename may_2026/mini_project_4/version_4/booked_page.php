<?php

    session_start();

    require_once "assets/dbconn.php";
    require_once "assets/common.php";

    if (!isset($_SESSION['patid'])) {  # If they have managed to get to this page without logging in
        $_SESSION['usermessage'] = "ERROR: You are not logged in!";
        header("Location: login.php");
        exit;
    } elseif($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["apptdelete"])) {
            try {
                if (cancel_appt(dbconnect_delete(), $_POST['apptid'])) {
                    $_SESSION['usermessage'] = "SUCCESS: Appointment has been cancelled.";
                    audtitor(dbconnect_insert(), $_SESSION['patid'], "apt", "User has successfully cancelled appointment.");
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
                    echo "<link rel='stylesheet' type='text/css' href='../../reuseable_code/ezstyles.css'>";
                    echo "<title>Bookings</title>";
                echo "</head>";

                echo "<body>";

                    require "assets/header.php";

                        echo "<h2> Primary Oaks Surgery - Your Bookings</h2>";

                        echo "<p> Below are your bookings: </p>";
                        $appts = appt_getter(dbconnect_select());
                        if (!$appts) {
                            echo "<p>There are no appointments found.</p>";
                        } else {
                            echo "<table id='bookings'>";

                                foreach ($appts as $appt) { //gets the staff type in the db and makes it into a presentable format
                                    if ($appt['staff_type'] = "doc") {
                                        $role = "Doctor";
                                    } else if ($appt['staff_type'] = "nur") {
                                        $role = "Nurse";
                                    }

                                    echo "<form action='' method='post'>"; //creating a form per each entry into the table

                                        echo "<tr>";
                                        echo "<td> Date: " . date('M d, Y @ h:i A', $appt['appointmentdate']) . "</td>";
                                        echo "<td> Made on: " . date('M d, Y @ h:i A', $appt['bookedon']) . "</td>";
                                        echo "<td> With: " . $role . " " . $appt['fname'] . " " . $appt['sname'] . "</td>";
                                        echo "<td> in: " . $appt['room'] . "</td>";
                                        echo "<td><input type='hidden' name='apptid' value=".$appt['pat_app_id']."> 
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
