<?php
session_start();
$servername = "sql310.infinityfree.com";
$username = "if0_38647897"; // Default username for XAMPP
$password = "3Rqbm8TsQQllS"; // Default password is empty in XAMPP
$database = "if0_38647897_bus";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>