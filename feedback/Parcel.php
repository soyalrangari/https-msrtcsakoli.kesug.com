<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Parcel Service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 500px;
            background: #fff;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 15px;
            transition: 0.3s;
        }
        button:hover {
            background: #218838;
        }
        .link-btn {
            display: block;
            text-align: center;
            padding: 12px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            margin-top: 10px;
            transition: 0.3s;
        }
        .link-btn:hover {
            background: #0056b3;
        }
        .message {
            text-align: center;
            font-size: 16px;
            margin-top: 10px;
            color: green;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Bus Parcel Service</h2>
    <form id="parcelForm">
        <label for="From">From:</label>
        <input type="text" id="From" name="From" required>
        
        <label for="To">To:</label>
        <input type="text" id="To" name="To" required>

        <label for="sender_name">Sender Name:</label>
        <input type="text" id="sender_name" name="sender_name" required>

        <label for="sender_phone">Sender Phone:</label>
        <input type="tel" id="sender_phone" name="sender_phone" required pattern="[0-9]{10}">

        <label for="receiver_name">Receiver Name:</label>
        <input type="text" id="receiver_name" name="receiver_name" required>

        <label for="receiver_phone">Receiver Phone:</label>
        <input type="tel" id="receiver_phone" name="receiver_phone" required pattern="[0-9]{10}">

        <label for="Bus_Driver_number">Bus Driver Number:</label>
        <input type="text" id="Bus_Driver_number" name="Bus_Driver_number" required>

        <label for="Bus_number">Bus Number:</label>
        <input type="text" id="Bus_number" name="Bus_number" required>

        <label for="parcel_weight">Parcel Weight (kg):</label>
        <input type="number" id="parcel_weight" name="parcel_weight" min="0.1" step="0.1" required>

        <button type="submit">Submit</button>
        <p class="message" id="message"></p>
        <a href="parcel_list.php" class="link-btn">View Parcel List</a>
    </form>
</div>

<script>
    document.getElementById("parcelForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form from refreshing the page

        let formData = new FormData(this);

        fetch("parceldatabase.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text()) 
        .then(data => {
            document.getElementById("message").textContent = "Parcel submitted successfully!";
            setTimeout(() => {
                window.location.href = "../feedback/parcel_list.php"; // Redirect after submission
            }, 2000); // 2-second delay before redirection
        })
        .catch(error => console.error("Error:", error));
    });
</script>

</body>
</html>
