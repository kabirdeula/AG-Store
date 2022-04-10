<?php

$host = 'localhost';
$username = 'kabirdeula';
$password = 'lunala';
$database = 'agstore';

$conn = new mysqli($host, $username, $password, $database);

if(!$conn){
    die('Could not Connect MySql Server:' .mysqli_connect_error());
}
?>