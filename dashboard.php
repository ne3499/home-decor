<?php
include 'db_connect.php';

// Fetch total products
$totalProducts = $conn->query("SELECT COUNT(*) AS count FROM products")->fetch_assoc()['count'];

// Fetch total orders
$totalOrders = $conn->query("SELECT COUNT(*) AS count FROM orders")->fetch_assoc()['count'];

// Fetch total customers
// Fetch total customers (excluding admins)
$totalCustomers = $conn->query("SELECT COUNT(*) AS count FROM users WHERE role != 'admin'")->fetch_assoc()['count'];


// Fetch total earnings
$totalEarnings = $conn->query("SELECT SUM(total_price) AS total FROM orders")->fetch_assoc()['total'] ?? 0;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard.css"> <!-- External CSS -->
</head>
<style>
    /* General Styles */
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }

    /* Dashboard Container */
    .dashboard-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px;
        padding: 20px;
    }

    /* Card Styles */
    .card {
        flex: 1;
        min-width: 250px;
        text-align: center;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .card h3 {
        font-size: 20px;
        color: #fff;
    }

    .card p {
        font-size: 24px;
        font-weight: bold;
        color: #fff;
    }

    /* Background Colors for Cards */
    .bg-primary {
        background: #007bff;
    }

    .bg-success {
        background: #28a745;
    }

    .bg-warning {
        background: #ffc107;
    }

    .bg-danger {
        background: #dc3545;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .dashboard-container {
            flex-direction: column;
            align-items: center;
        }

        .card {
            width: 100%;
            max-width: 400px;
        }
    }

    /* General Styles */
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f8f8;
    }

     /* Sidebar */
        #sidebar {
            width: 250px;
            height: 100vh;
            background: linear-gradient(135deg,rgb(157, 157, 159),rgb(51, 70, 116));
            color: white;
            padding-top: 20px;
            position: fixed;
            left: 0;
            top: 0;
            transition: all 0.3s;
        }

        .sidebar-header {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            padding: 20px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        #sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #sidebar ul li {
            padding: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        #sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            font-size: 16px;
            padding: 10px;
            transition: all 0.3s;
        }

        #sidebar ul li a:hover, .active {
            background: rgba(255, 255, 255, 0.2);
            border-left: 4px solid #ffcc00;
            padding-left: 16px;
        }

        .logout-btn {
            background: #dc3545;
            text-align: center;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: #c82333;
        }


    /* Page Content */
    #content {
        margin-left: 250px;
        padding: 20px;
    }

    .container {
        max-width: 1000px;
        margin: auto;
    }

    /* Card Style */
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .card img {
        max-width: 100%;
        height: auto;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        text-align: center;
    }

    .card-title {
        font-size: 20px;
        font-weight: bold;
    }

    .price {
        color: #1e3a8a;
        font-size: 18px;
        font-weight: bold;
    }

    /* Buttons */
    .btn-primary {
        background: #ffcc00;
        border: none;
        color: black;
    }

    .btn-primary:hover {
        background: #e6b800;
    }

    .btn-warning {
        background: #ff8800;
    }

    .btn-danger {
        background: #dc3545;
    }
    
</style>

<body>

    <div class="wrapper">
        <!-- Sidebar -->
       <?php include("sidebar.php");?>

        <!-- Page Content -->
        <div id="content">
            <div class="container mt-4">
                <h2 class="text-center">Admin Dashboard</h2>
                <div class="dashboard-container">
                    <div class="card bg-primary text-white">
                        <h3>Total Products</h3>
                        <p><?php echo $totalProducts; ?></p>
                    </div>
                    <div class="card bg-success text-white">
                        <h3>Total Orders</h3>
                        <p><?php echo $totalOrders; ?></p>
                    </div>
                    <div class="card bg-warning text-white">
                        <h3>Total Customers</h3>
                        <p><?php echo $totalCustomers; ?></p>
                    </div>
                    <div class="card bg-danger text-white">
                        <h3>Total Earnings</h3>
                        <p>₹<?php echo number_format($totalEarnings, 2); ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>