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
echo "<title>Settings</title>";
echo "</head>";

echo "<body>";

require "assets/header.php";

echo "<p>View Audit</p>";

echo "<p>Change Personal Details</p>";

echo "<input type='submit' name='userpasschange' value='Change Password' />";

echo "<input type='submit' name='userpasschange' value='Change Name' />";

echo "<input type='submit' name='useremailchange' value='Change Email' />";

echo "<input type='submit' name='userphonechange' value='Change Phone Number' />";



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