<?php
    session_start(); //starts the session

    //includes database connection
    require_once "assets/dbconn.php";

    session_destroy(); //ends the sesssion, which logs out the user

    header("location:index.php?message=You have been logged out!"); //displays a message to the user saying they have been logged out on the index page