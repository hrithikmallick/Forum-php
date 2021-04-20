<?php
    session_start();        //In every page where u use session

    session_unset();        //Delete session values
 
    session_destroy();     //Delete session variable

    header('location:login.php');
