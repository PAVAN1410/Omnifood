<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
$hostname = 'localhost:3307';
$username_db = 'root';
$password = '';
$database = 'omnifood';
$db = mysqli_connect("$hostname", "$username_db", "$password", "$database");
date_default_timezone_set('Asia/Kolkata');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
