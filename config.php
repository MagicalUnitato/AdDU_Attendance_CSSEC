<?php

    $dbhost="localhost";
    $dbuser="root";
    $dbpass="usbw";
    $dbname="testdb";
    $adduAPIKey = "test";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
    mysqli_select_db( $conn, $dbname);
 
    if( !$conn )
       die( 'Could not connect to MySQL: ' . mysqli_error());
    