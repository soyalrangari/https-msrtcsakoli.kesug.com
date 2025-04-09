<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Service Feedback Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom right, #29323c, #485563); /* Modern background gradient */
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Ensure full viewport height */
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Softer, more prominent shadow */
            max-width: 500px;
            width: 90%; /* Responsive width */
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555; /* Slightly darker label color */
        }

        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box; /* Include padding in width */
            font-size: 16px; /* Increased font size */
        }

        textarea {
            height: 120px;
        }

        select {
            appearance: none; /* Customize select arrow */
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url("data:image/svg+xml;utf8,<svg fill='black' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24h-24z' fill='none'/></svg>") no-repeat right 10px center; /* SVG arrow */
            padding-right: 30px; /* Add space for arrow */
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 18px; /* Increased font size */
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        button:hover {
            background-color: #0056b3;
        }


        /* Responsive adjustments */
        @media (max-width: 400px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 1.8em;
            }

            label {
                font-size: 1em;
            }

            input[type="email"],
            textarea,
            select,
            button {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Bus Service Feedback Form</h2>
    <form action="feedbackcon.php" method="post">


        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>


        <label for="rating">Rate Your Experience:</label>
        <select id="rating" name="rating" required>
            <option value="">Select Rating</option>
            <option value="Excellent">Excellent</option>
            <option value="Good">Good</option>
            <option value="Average">Average</option>
            <option value="Poor">Poor</option>
        </select>

        <label for="comments">Additional Comments:</label>
        <textarea id="comments" name="comments" placeholder="Write your feedback here..."></textarea>

        <button type="submit">Submit Feedback</button>
    </form>
</div>

</body>
</html>