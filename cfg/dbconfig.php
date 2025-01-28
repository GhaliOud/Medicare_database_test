<?php
$servername = "localhost";  // Use localhost for local MySQL server
$username = "root";  // Default MySQL username for XAMPP is 'root'
$password = "";  // Default password for MySQL in XAMPP is empty
$dbname = "akc353_4";  // Your database name
$port = "3306";  // Default MySQL port

$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
