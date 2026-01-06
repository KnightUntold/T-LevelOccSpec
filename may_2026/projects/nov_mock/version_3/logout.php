<?php
    session_start(); //starts the session

    //includes database connection
    require_once "assets/dbconn.php";
    require_once "assets/common.php"; //includes connection to common which is needed for the auditor

    audtitor(dbconn_insert(), $_SESSION['user_id'], "log", "User has successfully logged out");

    session_destroy(); //ends the sesssion, which logs out the user

    header("location:index.php?message=You have been logged out!"); //displays a message to the user saying they have been logged out on the index page