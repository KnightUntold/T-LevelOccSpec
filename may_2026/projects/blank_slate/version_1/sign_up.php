<?php
    session_start();

    require_once "assets/dbconn.php";
    require_once "assets/common.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if ($_POST['password'] === $_POST['password2']) {
            $_SESSION['usermessage'] = "ERROR: Passwords do not match!";
            header("Location: sign_up.php");
            exit;
        } else {
            try {
                if(!email_ver(dbconn_select(), $_POST['email'])) {
                    if (reg_user(dbconn_insert(), $_POST)) {
                        $_SESSION['usermessage'] = "USER CREATED SUCCESSFULLY";
                        header('Location: login_index.php');
                        exit;


                    } else {
                        $_SESSION['usermessage'] = "ERROR: USER REGISTRATION FAILED";
                    }
                } else {
                    $_SESSION['usermessage'] = "ERROR: USERNAME NOT AVAILABLE";
                }

            } catch (PDOException $e) {
            $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
            header('Location: sign_up.php');
            exit;
            } catch (Exception $e) {
                $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
            }
        }


        }


    echo "<!DOCTYPE html>";

    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<link rel='stylesheet' type='text/css' href='assets/styles.css'>";
    echo "<title>Sign Up</title>";
    echo "</head>";

    echo "<body>";

    require "assets/header.php";

    echo "<h1 class='center'>Sign Up</h1>";

    echo "<label for='email'>Email:</label><br>";
    echo "<input type='email' name='email' id='email'><br>";

    echo "<label for='password'>Password:</label><br>";
    echo "<input type='password' name='password' id='password'><br>";

    echo "<label for='password2'>Confirm Password:</label><br>";
    echo "<input type='password' name='password2' id='password2'><br>";

    echo "<br><input type='submit' name='submit' id='submit' value='Sign Up'>";
    echo "</form>";

    echo "<br>";
    echo user_message();
    echo "<br>";

    require "assets/footer.php";

    echo "</body>";

    echo "</html>";