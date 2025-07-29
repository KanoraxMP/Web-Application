<?php
$server = "localhost";
$username = "demo01";
$password = "abc123";
$dbname = "bikeshop";

$conn = new mysqli($server, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully!";
?>