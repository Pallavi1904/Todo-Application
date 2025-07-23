<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // use your password if any
$db   = 'todo';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
