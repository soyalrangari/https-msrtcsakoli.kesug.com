<?php
$servername = "sql310.infinityfree.com"; // Change if needed
$username = "if0_38647897"; // Replace with your DB username
$password = "3Rqbm8TsQQllS"; // Replace with your DB password
$dbname = "if0_38647897_bus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $rating = isset($_POST['rating']) ? trim($_POST['rating']) : null;
    $comments = isset($_POST['comments']) ? trim($_POST['comments']) : null;

    // Check if fields are empty
    if (!empty($email) && !empty($rating) && !empty($comments)) {
        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO feedback (email, rating, comments) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $rating, $comments);

        // Execute the query
        if ($stmt->execute()) {
            header("Location: ../index.php?feedback_submitted=true");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: All fields are required!";
    }
}

?>
