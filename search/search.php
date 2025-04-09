<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $source = $_POST['source'];
    $destination = $_POST['destination'];

    // Process the search (e.g., query a database)
    // For now, just echo the inputs
    echo "Searching from: " . htmlspecialchars($source) . " to " . htmlspecialchars($destination);
}
?>