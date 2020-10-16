<?php

$dbUser="root";
$dbPass="";
$dbDatabase="waiter";
$dbHost="localhost";
$dbPort="3306";

$dbConn= mysqli_connect($dbHost, $dbUser, $dbPass, $dbDatabase);
   
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error()); 
        print 'error';
    }   
?>