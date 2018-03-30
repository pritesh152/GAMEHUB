<?php
//DB details
$dbHost = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbName = 'mypro';

//Create connection and select DB
$db = new mysqli($dbHost, $dbusername, $dbpassword, $dbName);

if (mysqli_connect_errno()) {
    printf("connect failed", mysqli_connect_error());exit();
}