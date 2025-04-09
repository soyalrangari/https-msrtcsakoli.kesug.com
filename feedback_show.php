<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Service Feedback</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom right, #29323c, #485563);
            color: #fff;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: #333;
        }

        .feedback-box {
            background: #ffffff;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .feedback-email {
            font-weight: bold;
            color: #007bff;
        }

        .feedback-rating {
            font-weight: bold;
            color: #28a745;
        }

        .feedback-comment {
            font-style: italic;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Recent Customer Reviews</h2>
    <div id="feedback-container">
        <p>Loading feedback...</p>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    function fetchFeedback() {
        fetch('feedback/fetch_feedback.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not OK");
                }
                return response.json();
            })
            .then(data => {
                const feedbackContainer = document.getElementById("feedback-container");
                feedbackContainer.innerHTML = "";

                if (data.error) {
                    feedbackContainer.innerHTML = `<p style="color: red;">Error: ${data.error}</p>`;
                    return;
                }

                if (data.length === 0) {
                    feedbackContainer.innerHTML = "<p>No feedback available.</p>";
                } else {
                    data.forEach(feedback => {
                        const feedbackBox = document.createElement("div");
                        feedbackBox.classList.add("feedback-box");
                        feedbackBox.innerHTML = `
                            <p class="feedback-email">${feedback.email}</p>
                            <p class="feedback-rating">Rated: <b>${feedback.rating}</b></p>
                            <p class="feedback-comment">${feedback.comments}</p>
                        `;
                        feedbackContainer.appendChild(feedbackBox);
                    });
                }
            })
            .catch(error => {
                console.error('Error fetching feedback:', error);
                document.getElementById("feedback-container").innerHTML = "<p style='color: red;'>Failed to load feedback.</p>";
            });
    }

    fetchFeedback();
    setInterval(fetchFeedback, 10000); // Auto-refresh every 10 seconds
});

</script>

</body>
</html>
