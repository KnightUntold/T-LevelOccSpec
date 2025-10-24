<?php
    session_start();

    require_once "assets/dbconn.php"; //calls in the connection to the database and common.php where a lot of subroutines are
    require_once "assets/common.php"; //this improves the reuseability of code and lessens processing time

    if (!isset($_SESSION['patid'])){ //this redirects you to the login page if you aren't logged in so that a unlogged in user can't input into the database
        $_SESSION['usermessage'] = "ERROR: You need to be logged in!"; //this improves the security of the system because someone
        header("Location: log_in.php"); //trying to break into the system can't input anything into the database without a login
        exit;
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST"){ //this needs to be at the top because it needs to load first to ensure that the code runs as intended

        try {

            $tmp = $_POST["app_date"]. ' ' .$_POST["app_time"]; //turn app_date and time into epoch time
            $epoch_time = strtotime($tmp);
            if (commit_booking(dbconnect_insert(), $epoch_time)){
                $_SESSION['usermessage'] = "SUCCESS: Booking Successful!";
                audtitor(dbconnect_insert(), $_SESSION['patid'], "apt", "User has booked an appointment");
                header("Location: booked_page.php");
                exit;
            } else {
                $_SESSION['usermessage'] = "ERROR: Booking failed!";
                header("Location: booked_page.php");
            }

        } catch (PDOException $e) {
            $_SESSION['usermessage'] = "ERROR: " . $e->getMessage(); //to catch errors
        } catch (Exception $e) {
            $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
        }

       /* try {
            new_app(dbconnect_insert(), $_POST); //calling a subroutine and passing another subroutine through it because if the connection is successful, it sends $conn
            $_SESSION['usermessage'] = "SUCCESS: Appointment booked!";
           audtitor(dbconnect_insert(), $_SESSION['patient_id'], "log", "User has successfully booked an appointment");
        } catch (PDOException $e) {
            $_SESSION['usermessage'] = $e->getMessage();
        } */
    }

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

                $staff = staff_getter(dbconnect_select());



                echo "<br><label for='app_date'>Appointment Date:</label><br>";
                echo "<input type='date' name='app_date' id='app_date'>";

                echo "<br><label for='app_time'>Appointment Time:</label><br>";
                echo "<input type='time' name='app_time' id='app_time'>";


                echo "<br><label for='staff'>Select a Staff Member:</label>";
                echo "<br><select name='staff' id='staff'>";

                foreach ($staff as $staf) {
                    if ($staf['role'] = "doc"){
                        $role = "Doctor";
                    } else if ($staf['role'] = "nur"){
                        $role = "Nurse";
                    }
                    echo "<option value =" .$staf['staff_id']. ">" .$role. " ". $staf['sname']. " ". $staf['fname']. " Room ".$staf['room']. "</option>";


                }
                 echo "</select>";

                echo "<br><input type='submit' name='submit' id='submit' value='Book Appointment'>";

            echo "</form>";

            echo "<br>";
            echo user_message();
            echo "<br>";

            require "footer.php";

        echo "</body>";

    echo "</html>";