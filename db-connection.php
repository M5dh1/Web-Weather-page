<?php
    //Step 1: Creating and initializing Database variables.
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "news";

    //Step 2: Connecting to datasbase server.
    $con = mysqli_connect($host, $username, $password, $db);
    
    //Step 3: Check for errors.
    if(mysqli_connect_errno()){
        echo mysqli_connect_error();
    } else {
        echo "Connection succeed";
    }
?>