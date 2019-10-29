<?php

    $dbhost="localhost";
    $dbuser="root";
    $dbpass="usbw";
    $dbname="testdb";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass) or die( $conn->error );
    mysqli_select_db( $conn, $dbname);
    
    if( isset($_GET['eventcode'])){
        session_start();
        $_SESSION['eventcode'] = filter_input( INPUT_GET, 'eventcode', FILTER_SANITIZE_SPECIAL_CHARS);
        header("Location: events.php");
        
    }