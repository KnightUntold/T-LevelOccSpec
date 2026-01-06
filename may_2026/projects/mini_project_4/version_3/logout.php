<?php
    session_start();

    require_once "assets/dbconn.php";
    require_once "assets/common.php";

    audtitor(dbconnect_insert(), $_SESSION['patid'], "log", "User has successfully logged out");

    session_destroy();

    header("location:index.php?message=You have been logged out!");
