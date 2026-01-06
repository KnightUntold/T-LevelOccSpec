<?php

session_start();

require_once "../assets/dbconn.php";
require_once "../assets/common.php";

if (!isset($_SESSION['patid'])) {  # If they have managed to get to this page without logging in
    $_SESSION['usermessage'] = "ERROR: You are not logged in!";
    header("Location: login.php");
    exit;
} //elseif($_SERVER["REQUEST_METHOD"] === "POST") {

//}

echo "<!DOCTYPE html>";

echo "<html lang='en'>";

echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<link rel='stylesheet' type='text/css' href='../../../../reuseable_code/ezstyles.css'>";
echo "<title>Bookings</title>";
echo "</head>";

echo "<body>";

require "../assets/header.php";

echo "<h2> Primary Oaks Surgery - Your Bookings</h2>";

echo "<p> Below is your audit history: </p>";
$auds = aud_getter(dbconnect_select());
if (!$auds) {
    echo "<p>There are no audits found.</p>";
} else {
    echo "<table id='audits'>";

    foreach ($auds as $aud) { //gets the staff type in the db and makes it into a presentable format

        echo "<form action='' method='post'>"; //creating a form per each entry into the table

        echo "<tr>";
        echo "<td> in: " . $aud['date'] . "</td>";
        echo "<td> in: " . $aud['code'] . "</td>";
        echo "<td> in: " . $aud['longdesc'] . "</td>";
        echo "<td><input type='hidden' name='audid' value=".$aud['audit_id']."></td>";

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

require "../assets/footer.php";

echo "</body>";

echo "</html>";
