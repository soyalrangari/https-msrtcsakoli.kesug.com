<?php
include '../schedule/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from_stop = $_POST['from_stop'];
    $to_stop = $_POST['to_stop'];
    $origin_stop_time = $_POST['origin_stop_time'];

    $sql = "INSERT INTO schedule (from_stop, to_stop, origin_stop_time)
            VALUES ('$from_stop', '$to_stop', '$origin_stop_time')";

    if ($conn->query($sql) === TRUE) {
        echo "New record added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Bus Data</title>
</head>
<body>
    <h2>Upload Bus Data</h2>
    <form method="POST">
        From Stop: <input type="text" name="from_stop" required><br><br>
        To Stop: <input type="text" name="to_stop" required><br><br>
        Origin Stop Time: <input type="time" name="origin_stop_time" required><br><br>
        <input type="submit" value="Upload Data">
    </form>
</body>
</html>
