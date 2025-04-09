<?php
header('Content-Type: application/json'); // Ensure JSON response

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback"; // Make sure this is your correct database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Database Connection Failed"]);
    exit();
}

$sql = "SELECT email, rating, comments FROM feedback ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);

$feedbacks = [];

while ($row = $result->fetch_assoc()) {
    $feedbacks[] = [
        'email' => htmlspecialchars($row['email']),
        'rating' => htmlspecialchars($row['rating']),
        'comments' => htmlspecialchars($row['comments'])
    ];
}

echo json_encode($feedbacks, JSON_PRETTY_PRINT);
$conn->close();
?>
<?php
header('Content-Type: application/json'); // Ensure JSON response

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback"; // Make sure this is your correct database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Database Connection Failed"]);
    exit();
}

$sql = "SELECT email, rating, comments FROM feedback ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);

$feedbacks = [];

while ($row = $result->fetch_assoc()) {
    $feedbacks[] = [
        'email' => htmlspecialchars($row['email']),
        'rating' => htmlspecialchars($row['rating']),
        'comments' => htmlspecialchars($row['comments'])
    ];
}

echo json_encode($feedbacks, JSON_PRETTY_PRINT);
$conn->close();
?>
