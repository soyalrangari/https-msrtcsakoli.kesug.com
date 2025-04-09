<?php
// Database configuration
$servername = "sityfree.coql310.infinm";
$username = "if0_38647897";
$password = "3Rqbm8TsQQllS";
$dbname = "if0_38647897_bus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search parameters
$source = $_GET['source'];
$destination = $_GET['destination'];
$departure = $_GET['departure'];

// Query buses
$sql = "SELECT * FROM buses WHERE source='$