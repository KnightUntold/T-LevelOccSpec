<?php
    session_start();

    audtitor(dbconnect(), $_SESSION['userid'], "log", "User has successfully logged out");

    session_destroy();

    header("location:index.php?message=You have been logged out!");
