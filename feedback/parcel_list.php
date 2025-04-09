<?php
include '..\Signin\db.php';

$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM parcels LIMIT $start, $limit";
$result = $conn->query($sql);

$total_records_query = "SELECT COUNT(*) FROM parcels";
$total_records_result = $conn->query($total_records_query);
$total_records = $total_records_result->fetch_row()[0];

$total_pages = ceil($total_records / $limit);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Parcel List</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #28a745;
            color: white;
        }
        .pagination {
            text-align: center;
            margin: 20px;
        }
        .pagination a {
            margin: 0 5px;
            padding: 8px 12px;
            text-decoration: none;
            border: 1px solid #ddd;
            color: #000;
        }
        .pagination a.active {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Parcel List</h2>
    <table align="center">
        <tr>
            <th>Sr.No</th>
            <th>From</th>
            <th>To</th>
            <th>Sender Name</th>
            <th>Sender Phone</th>
            <th>Receiver Name</th>
            <th>Receiver Phone</th>
            <th>Bus Number</th>
            <th>Parcel Weight (kg)</th>
        </tr>
        <?php
        $sr = $start + 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$sr}</td>
                    <td>{$row['pickup_location']}</td>
                    <td>{$row['delivery_location']}</td>
                    <td>{$row['sender_name']}</td>
                    <td>{$row['sender_phone']}</td>
                    <td>{$row['receiver_name']}</td>
                    <td>{$row['receiver_phone']}</td>
                    <td>{$row['bus_number']}</td>
                    <td>{$row['parcel_weight']}</td>
                  </tr>";
            $sr++;
        }
        ?>
    </table>

    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=1">First</a>
            <a href="?page=<?= $page - 1 ?>">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?page=<?= $page + 1 ?>">Next</a>
            <a href="?page=<?= $total_pages ?>">Last</a>
        <?php endif; ?>
    </div>
</body>
</html>
