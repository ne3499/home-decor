<?php
include 'db_connect.php';
include 'sidebar.php';

// Fetch orders from the database, linking users instead of customers
$query = "SELECT orders.id AS order_id,
                 COALESCE(users.name, 'Unknown Customer') AS customer_name,
                 COALESCE(products.name, 'Unknown Product') AS product_name,
                 orders.quantity, 
                 orders.total_price, 
                 orders.status, 
                 orders.created_at
          FROM orders
          LEFT JOIN users ON orders.user_id = users.id
          LEFT JOIN products ON orders.product_id = products.id
          ORDER BY orders.created_at DESC";


$result = $conn->query($query);

if (!$result) {
    die("Query Failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css"> <!-- Custom CSS -->
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    .container {
        margin-left: 250px;
        /* Adjust this based on your sidebar width */
        padding: 20px;
        transition: margin-left 0.3s ease-in-out;
    }

    .table-container {
        background: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .table {
        width: 100%;
        white-space: nowrap;
        /* Prevents text wrapping */
    }

    .table th {
        background-color: #007bff;
        color: white;
        text-align: center;
        font-size: 14px;
        padding: 8px;
    }

    .table td {
        text-align: center;
        vertical-align: middle;
        font-size: 13px;
        padding: 6px;
        word-wrap: break-word;
        max-width: 150px;
        /* Prevents extra-long text from breaking layout */
    }

    .badge {
        font-size: 12px;
        padding: 4px 8px;
    }

    .btn-sm {
        padding: 4px 8px;
        font-size: 12px;
    }

    @media (max-width: 768px) {
        .table {
            font-size: 12px;
        }

        .btn-sm {
            padding: 3px 6px;
            font-size: 11px;
        }

        .badge {
            font-size: 10px;
            padding: 3px 6px;
        }
    }
</style>

<body>

    <div class="container">
        <h2 class="text-center mb-4">Manage Orders</h2>
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-primary">
                        <tr>
                            
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                
                                <td><?= isset($row['customer_name']) ? htmlspecialchars($row['customer_name'], ENT_QUOTES, 'UTF-8') : '' ?></td>
                                <td><?= isset($row['product_name']) ? htmlspecialchars($row['product_name'], ENT_QUOTES, 'UTF-8') : '' ?></td>


                                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                                <td>₹<?php echo number_format((float)($row['total_price'] ?? 0), 2); ?></td>
                                <td>
                                    <span class="badge <?php echo getStatusClass($row['status']); ?>">
                                        <?php echo ucfirst(htmlspecialchars($row['status'])); ?>
                                    </span>
                                </td>
                                <td><?php echo date('d-m-Y H:i', strtotime($row['created_at'])); ?></td>
                                <td>
                                    <a href="update_order.php?id=<?php echo htmlspecialchars($row['order_id']); ?>" class="btn btn-success btn-sm">Update</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>

<?php
// Function to return Bootstrap badge classes for statuses
function getStatusClass($status)
{
    switch (strtolower($status)) {
        case 'pending':
            return 'bg-warning text-dark';
        case 'shipped':
            return 'bg-info';
        case 'delivered':
            return 'bg-success';
        case 'cancelled':
            return 'bg-danger';
        default:
            return 'bg-secondary';
    }
}
?>