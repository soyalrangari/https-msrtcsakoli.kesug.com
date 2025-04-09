<?php
include '..\Signin\db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pickup_location = $_POST["From"];
    $delivery_location = $_POST["To"];
    $sender_name = $_POST["sender_name"];
    $sender_phone = $_POST["sender_phone"];
    $receiver_name = $_POST["receiver_name"];
    $receiver_phone = $_POST["receiver_phone"];
    $bus_driver_number = $_POST["Bus_Driver_number"];
    $bus_number = $_POST["Bus_number"];
    $parcel_weight = $_POST["parcel_weight"];

    $sql = "INSERT INTO parcels (pickup_location, delivery_location, sender_name, sender_phone, receiver_name, receiver_phone, bus_driver_number, bus_number, parcel_weight) 
            VALUES ('$pickup_location', '$delivery_location', '$sender_name', '$sender_phone', '$receiver_name', '$receiver_phone', '$bus_driver_number', '$bus_number', '$parcel_weight')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Parcel details stored successfully!'); window.location.href='../feedback/parcel_list.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
