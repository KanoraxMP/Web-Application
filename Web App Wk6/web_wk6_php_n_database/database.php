<?php
$server = 'localhost';
$username = 'bikeshop_01';
$password = '!Rathave101';
$dbname = 'bikeshop';
// Connect to Database
$conn = new mysqli($server, $username, $password, $dbname);
$conn->set_charset('utf8');

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}
// echo "Connection Successful !";
?>