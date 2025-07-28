<?php
$host = 'localhost';
$user = 'root'; // or your DB user
$pass = '';     // your DB password
$dbname = 'todo_db';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
