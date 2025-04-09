<?php
include '../schedule/db_connect.php';

// Initialize search terms
$search_stop = isset($_GET['search_stop']) ? strtolower(trim($_GET['search_stop'])) : '';

// Fetch all unique stop names for suggestions
$all_stops_query = "SELECT DISTINCT from_stop FROM schedule UNION SELECT DISTINCT to_stop FROM schedule";
for ($i = 1; $i <= 30; $i++) {
    $stop_column = 'Stop' . $i;
    $all_stops_query .= " UNION SELECT DISTINCT $stop_column FROM schedule WHERE $stop_column IS NOT NULL AND $stop_column != ''";
}
$all_stops_result = $conn->query($all_stops_query);
$all_stops = [];
if ($all_stops_result && $all_stops_result->num_rows > 0) {
    while ($row = $all_stops_result->fetch_assoc()) {
        foreach ($row as $stop) {
            if (!empty($stop) && !in_array(strtolower(trim($stop)), $all_stops)) {
                $all_stops[] = strtolower(trim($stop));
            }
        }
    }
    sort($all_stops);
}

// Build the SQL query based on search terms
$sql = "SELECT from_stop, to_stop, origin_stop_time FROM schedule WHERE 1=1";
$search_active = false;

if (!empty($search_stop)) {
    $sql .= " AND (LOWER(from_stop) LIKE '%$search_stop%' OR LOWER(to_stop) LIKE '%$search_stop%'";
    for ($i = 1; $i <= 30; $i++) {
        $stop_column = 'Stop' . $i;
        $sql .= " OR LOWER($stop_column) LIKE '%$search_stop%'";
    }
    $sql .= ")";
    $search_active = true;
}

$result = $conn->query($sql);

// Fetch data for display
$display_data = array();
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $display_data[] = $row;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylish Bus Schedule Search</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 800px;
        }

        .main-title {
            text-align: center;
            color: #007bff;
            margin-bottom: 25px;
        }

        .search-container {
            margin-bottom: 25px;
            position: relative;
        }

        .input-group {
            display: flex;
            gap: 10px;
        }

        .search-input {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            flex-grow: 1;
            transition: border-color 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #007bff;
        }

        .search-button {
            padding: 12px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-button:hover {
            background-color: #0056b3;
        }

        .suggestions {
            position: absolute;
            top: calc(100% + 5px);
            left: 0;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
            border-radius: 0 0 6px 6px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 10;
            display: none;
        }

        .suggestion-item {
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.2s ease;
        }

        .suggestion-item:hover {
            background-color: #f0f0f0;
        }

        .suggestion-highlight {
            font-weight: bold;
            color: #007bff;
        }

        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            border-radius: 6px;
            overflow: hidden;
        }

        .schedule-table thead th {
            background-color: #007bff;
            color: white;
            padding: 12px 15px;
            text-align: left;
            font-weight: bold;
            text-transform: uppercase;
        }

        .schedule-table tbody td {
            padding: 10px 15px;
            border-bottom: 1px solid #eee;
        }

        .schedule-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .schedule-table tbody tr:hover {
            background-color: #e9ecef;
        }

        .no-results, .info-message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #777;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            .input-group {
                flex-direction: column;
            }
            .search-button {
                width: 100%;
            }
            .schedule-table {
                font-size: 14px;
            }
            .schedule-table thead th {
                padding: 10px;
            }
            .schedule-table tbody td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="main-title">Bus Schedule Search</h2>

        <div class="search-container">
            <form method="GET" id="searchForm">
                <div class="input-group">
                    <input type="text" class="search-input" id="search_stop" name="search_stop" placeholder="Enter bus stop" value="<?= htmlspecialchars($search_stop) ?>" onkeyup="showSuggestions(this.value)">
                    <button type="submit" class="search-button">Search</button>
                </div>
                <div id="suggestions" class="suggestions"></div>
            </form>
        </div>

        <div class="results-container">
            <?php if (!empty($display_data)): ?>
                <table class="schedule-table">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>From Stop</th>
                            <th>To Stop</th>
                            <th>Origin Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sr = 1;
                        foreach ($display_data as $row): ?>
                            <tr>
                                <td><?= $sr++; ?></td>
                                <td><?= htmlspecialchars($row['from_stop']); ?></td>
                                <td><?= htmlspecialchars($row['to_stop']); ?></td>
                                <td><?= htmlspecialchars($row['origin_stop_time']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php elseif ($search_active): ?>
                <p class="no-results">No schedules found for "<?= htmlspecialchars($_GET['search_stop']) ?>".</p>
            <?php else: ?>
                <p class="info-message">Enter a bus stop to find schedule information.</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        const allStops = <?php echo json_encode($all_stops); ?>;
        const searchInput = document.getElementById('search_stop');
        const suggestionsDiv = document.getElementById('suggestions');
        const searchForm = document.getElementById('searchForm');

        function showSuggestions(inputValue) {
            suggestionsDiv.innerHTML = '';
            suggestionsDiv.style.display = 'none';

            if (inputValue.length > 0) {
                const matchingStops = allStops.filter(stop =>
                    stop.includes(inputValue.toLowerCase())
                );

                if (matchingStops.length > 0) {
                    matchingStops.forEach(stop => {
                        const suggestionItem = document.createElement('div');
                        suggestionItem.classList.add('suggestion-item');
                        suggestionItem.innerHTML = highlightMatch(stop, inputValue); // Use innerHTML for styled match
                        suggestionItem.addEventListener('click', function() {
                            searchInput.value = stop;
                            suggestionsDiv.style.display = 'none';
                        });
                        suggestionsDiv.appendChild(suggestionItem);
                    });
                    suggestionsDiv.style.display = 'block';
                }
            }
        }

        function highlightMatch(text, query) {
            const index = text.toLowerCase().indexOf(query.toLowerCase());
            if (index !== -1) {
                const before = text.substring(0, index);
                const match = text.substring(index, index + query.length);
                const after = text.substring(index + query.length);
                return `${before}<span class="suggestion-highlight">${match}</span>${after}`;
            }
            return text;
        }

        document.addEventListener('click', function(event) {
            if (!event.target.matches('#search_stop') && !event.target.matches('.suggestion-item')) {
                suggestionsDiv.style.display = 'none';
            }
        });

        searchInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter' && suggestionsDiv.style.display === 'block') {
                event.preventDefault();
                const firstSuggestion = suggestionsDiv.querySelector('.suggestion-item');
                if (firstSuggestion) {
                    searchInput.value = firstSuggestion.textContent;
                    suggestionsDiv.style.display = 'none';
                } else {
                    searchForm.submit();
                }
            }
        });
    </script>
</body>
</html>