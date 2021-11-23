<?php

    //Create Constants to Store Non Repeating Values
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'ff');

    $dbc = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error()); //Database Connection
    //$dbc = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database


?>
