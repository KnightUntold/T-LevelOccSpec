<?php

use mini_project_4\version_2\Calendar;

include 'Calendar.php';
$calendar = new Calendar(date("Y-m-d"));
$calendar->add_event('Birthday', '2025-10-22', 1, 'green');
$calendar->add_event('Doctors', '2024-05-04', 1, 'red');
$calendar->add_event('Holiday', '2024-05-16', 7);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Event Calendar</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="calendar.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navtop">
    <div>
        <h1>Event Calendar</h1>
    </div>
</nav>
<div class="content home">
    <?=$calendar?>
</div>
</body>
</html>