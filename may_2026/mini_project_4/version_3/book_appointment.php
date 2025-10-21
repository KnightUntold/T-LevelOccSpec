<?php
    session_start();

    require_once "assets/dbconn.php"; //calls in the connection to the database and common.php where a lot of subroutines are
    require_once "assets/common.php"; //this improves the reuseability of code and lessens processing time

    if (!isset($_SESSION['user'])){ //this redirects you to the login page if you aren't logged in so that a unlogged in user can't input into the database
        $_SESSION['usermessage'] = "ERROR: You need to be logged in!"; //this improves the security of the system because someone
        header("Location: log_in.php"); //trying to break into the system can't input anything into the database without a login
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST"){

        $tmp = $_POST["app_date"]. ' ' .$_POST["app_time"]; //turn app_date and time into epoch time
        $epoch_time = strtotime($tmp);

        echo $epoch_time;
        echo time();

        try {
            new_app(dbconnect_insert(), $_POST); //calling a subroutine and passing another subroutine through it because if the connection is successful, it sends $conn
            $_SESSION['usermessage'] = "SUCCESS: Appointment booked!";
           audtitor(dbconnect_insert(), $_SESSION['patient_id'], "log", "User has successfully booked an appointment");
        } catch (PDOException $e) {
            $_SESSION['usermessage'] = $e->getMessage();
        }
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

                echo "<br><label for='app_kind'>Kind of Appointment:</label><br>";
                echo "<select name='app_kind' id='app_kind' required='true'>";
                echo "<option value='' disabled selected>Please Enter the kind of appointment you need:</option>";
                echo "<option value='gp'>Gp Appointment</option>";
                echo "<option value='vaccine'>Vaccination</option>";
                echo "</select>";

                echo "<br><label for='pref_con'>Preferred Contact Method:</label><br>";
                echo "<select name='pref_con' id='pref_con' required='true'>";
                echo "<option value='' disabled selected>Please pick a Prefered Contact Method:</option>";
                echo "<option value='email'>Email</option>";
                echo "<option value='phone'>Phone</option>";
                echo "</select>";

                echo "<br><label for='app_date'>Appointment Date:</label><br>";
                echo "<input type='date' name='app_date' id='app_date'>";

                echo "<br><label for='app_time'>Appointment Time:</label><br>";
                echo "<select name='app_time' id='app_time' required='true'>";
                echo "<option value='' disabled selected>Please pick a timeslot: </option>";
                echo "<option value='09:00'>09:00</option>";
                echo "</select>";



                echo "<select name='staff'>";

                foreach ($staff as $staf) {
                    if ($staf['role'] = "doc"){
                        $role = "Doctor";
                    } else if ($staf['role'] = "nur"){
                        $role = "Nurse";
                    }
                    echo "<option value =" .$staf['staffid']. ">" .$role. " ". $staf['sname']. " ". $staf['fname']. "Room".$staf['room']. "</option>";

                    echo "</select>";
                }


                echo "<br><label for='app_reason'>Reason for Appointment:</label><br>";
                echo " <textarea cols='46' rows='8' name='app_reason' id='app_reason' required='true' placeholder='Please Enter the reason for appointment:' maxlength= '500'></textarea>";



                echo "<br><label for='accom'>Accommodations:</label><br>";
                echo " <textarea cols='46' rows='8' name='accom' id='accom' placeholder = 'Please let us know about any accomidations you may need:' maxlength= '500'></textarea>";

                echo "<br><input type='submit' name='submit' id='submit' value='Book Appointment'>";

            echo "</form>";

            echo "<br>";
            echo user_message();
            echo "<br>";

            require "footer.php";

        echo "</body>";

    echo "</html>";