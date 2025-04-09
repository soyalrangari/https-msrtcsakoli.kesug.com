<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli("sityfree.coql310.infinm", "if0_38647897", "3Rqbm8TsQQllS", "if0_38647897_bus");

// Fetch booking details
$booking_id = $conn->real_escape_string($_GET['id']);
$booking = $conn->query("SELECT * FROM bookings WHERE booking_id = '$booking_id'")->fetch_assoc();

if (!$booking) {
    header("Location: manage_bookings.php");
    exit();
}

// Fetch available buses for dropdown
$buses = $conn->query("SELECT * FROM buses");

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passenger_name = $conn->real_escape_string($_POST['passenger_name']);
    $bus_id = $conn->real_escape_string($_POST['bus_id']);
    $departure_date = $conn->real_escape_string($_POST['departure_date']);
    $seat_numbers = $conn->real_escape_string($_POST['seat_numbers']);
    $total_price = $conn->real_escape_string($_POST['total_price']);
    $payment_status = $conn->real_escape_string($_POST['payment_status']);
    
    // Get bus details
    $bus = $conn->query("SELECT * FROM buses WHERE bus_id = '$bus_id'")->fetch_assoc();
    
    $update_query = "UPDATE bookings SET 
                    passenger_name = '$passenger_name',
                    bus_id = '$bus_id',
                    bus_name = '{$bus['bus_name']}',
                    source = '{$bus['source']}',
                    destination = '{$bus['destination']}',
                    departure_date = '$departure_date',
                    seat_numbers = '$seat_numbers',
                    total_price = '$total_price',
                    payment_status = '$payment_status'
                    WHERE booking_id = '$booking_id'";
    
    if ($conn->query($update_query)) {
        $success = "Booking updated successfully!";
        // Refresh booking data
        $booking = $conn->query("SELECT * FROM bookings WHERE booking_id = '$booking_id'")->fetch_assoc();
    } else {
        $error = "Error updating booking: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="admin_styles.css">
</head>
<style>
    :root {
        --primary-color: #6a11cb;
        --secondary-color: #2575fc;
        --danger-color: #ff4d4d;
        --success-color: #4CAF50;
        --warning-color: #ff9800;
        --dark-color: #333;
        --light-color: #f9f9f9;
        --gray-color: #ddd;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #f5f5f5;
        color: var(--dark-color);
    }

    .dashboard {
        display: flex;
        min-height: 100vh;
    }

    /* Sidebar Styles */
    .sidebar {
        width: 250px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 20px 0;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        position: fixed;
        height: 100%;
    }

    .sidebar-header {
        padding: 0 20px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar-header h2 {
        font-size: 20px;
        margin-bottom: 5px;
    }

    .sidebar-header p {
        font-size: 14px;
        opacity: 0.8;
    }

    .sidebar-menu {
        padding: 20px 0;
    }

    .menu-item {
        padding: 12px 20px;
        display: flex;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s;
    }

    .menu-item:hover, .menu-item.active {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .menu-item i {
        margin-right: 10px;
        font-size: 18px;
    }

    .menu-item a {
        color: white;
        text-decoration: none;
        display: block;
        width: 100%;
    }

    /* Main Content Styles */
    .main-content {
        flex: 1;
        margin-left: 250px;
        padding: 20px;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .logout-btn {
        background-color: var(--danger-color);
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .logout-btn:hover {
        background-color: #e03e3e;
    }

    /* Common Card Styles */
    .card {
        background-color: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 18px;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--gray-color);
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #555;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="number"],
    .form-group input[type="date"],
    .form-group input[type="password"],
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .form-group input[type="checkbox"] {
        margin-right: 10px;
    }

    .btn {
        padding: 10px 20px;
        background-color: var(--secondary-color);
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        transition: background-color 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn:hover {
        background-color: #1a68e0;
    }

    .btn-secondary {
        background-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .success-message {
        background-color: #d4edda;
        color: #155724;
        padding: 12px;
        border-radius: 4px;
        margin-bottom: 20px;
        border: 1px solid #c3e6cb;
    }

    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        padding: 12px;
        border-radius: 4px;
        margin-bottom: 20px;
        border: 1px solid #f5c6cb;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .dashboard {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .main-content {
            margin-left: 0;
            padding: 15px;
        }
    }
</style>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Bus Booking System</h2>
                <p>Admin Panel</p>
            </div>
            <div class="sidebar-menu">
                <div class="menu-item">
                    <i class="fas fa-tachometer-alt"></i>
                    <a href="admin_dashboard.php">Dashboard</a>
                </div>
                <div class="menu-item">
                    <i class="fas fa-calendar-alt"></i>
                    <a href="manage_bookings.php">Bookings</a>
                </div>
                <div class="menu-item">
                    <i class="fas fa-money-bill-wave"></i>
                    <a href="manage_payments.php">Manage Payments</a>
                </div>
                <div class="menu-item">
                    <i class="fas fa-cog"></i>
                    <a href="settings.php">Settings</a>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="header">
                <h2>Edit Booking</h2>
                <div class="user-info">
                    <img src="admin.png" alt="Admin">
                    <span><?php echo $_SESSION['admin_username']; ?></span>
                    <a href="logout.php" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
            
            <div class="card">
                <h3 class="section-title">Edit Booking #<?php echo $booking['booking_id']; ?></h3>
                
                <?php if (isset($success)): ?>
                    <div class="success-message"><?php echo $success; ?></div>
                <?php endif; ?>
                
                <?php if (isset($error)): ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="passenger_name">Passenger Name</label>
                        <input type="text" id="passenger_name" name="passenger_name" value="<?php echo htmlspecialchars($booking['passenger_name']); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="bus_id">Bus</label>
                        <select id="bus_id" name="bus_id" required>
                            <?php while($bus = $buses->fetch_assoc()): ?>
                                <option value="<?php echo $bus['bus_id']; ?>" <?php echo $bus['bus_id'] == $booking['bus_id'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($bus['bus_name']); ?> (<?php echo htmlspecialchars($bus['source']); ?> to <?php echo htmlspecialchars($bus['destination']); ?>)
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="departure_date">Departure Date</label>
                        <input type="date" id="departure_date" name="departure_date" value="<?php echo $booking['departure_date']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="seat_numbers">Seat Numbers (comma separated)</label>
                        <input type="text" id="seat_numbers" name="seat_numbers" value="<?php echo htmlspecialchars($booking['seat_numbers']); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="total_price">Total Price (₹)</label>
                        <input type="number" step="0.01" id="total_price" name="total_price" value="<?php echo $booking['total_price']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="payment_status">Payment Status</label>
                        <select id="payment_status" name="payment_status" required>
                            <option value="paid" <?php echo $booking['payment_status'] == 'paid' ? 'selected' : ''; ?>>Paid</option>
                            <option value="pending" <?php echo $booking['payment_status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn">Update Booking</button>
                        <a href="manage_bookings.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>