<?php
$servername = "sql310.infinityfree.com";
$username = "if0_38647897"; // Default XAMPP username
$password = "3Rqbm8TsQQllS"; // Default XAMPP has no password
$dbname = "if0_38647897_bus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
