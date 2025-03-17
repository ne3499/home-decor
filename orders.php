<?php
include 'db_connect.php';

// Fetch orders from the database
$query = "SELECT orders.id, 
                 customers.name AS customer_name, 
                 products.name AS product_name, 
                 orders.quantity, 
                 orders.total_price, 
                 orders.status, 
                 orders.created_at 
          FROM orders
          LEFT JOIN customers ON orders.user_id = customers.id
          LEFT JOIN products ON orders.id = products.id
          ORDER BY orders.created_at DESC";

$result = $conn->query($query);

if (!$result) {
    die("Query Failed: " . $conn->error); // Debugging error message
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 40px;
        }
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .status-pending {
            color: orange;
            font-weight: bold;
        }
        .status-shipped {
            color: blue;
            font-weight: bold;
        }
        .status-delivered {
            color: green;
            font-weight: bold;
        }
        .status-cancelled {
            color: red;
            font-weight: bold;
        }
        .btn-update {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-update:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Manage Orders</h2>
    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
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
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['customer_name'] ?? 'Unknown'); ?></td>
                        <td><?php echo htmlspecialchars($row['product_name'] ?? 'Unknown'); ?></td>
                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                        <td>$<?php echo number_format((float)($row['total_price'] ?? 0), 2); ?></td>
                        <td class="<?php echo 'status-' . strtolower($row['status']); ?>">
                            <?php echo ucfirst(htmlspecialchars($row['status'])); ?>
                        </td>
                        <td><?php echo date('d-m-Y H:i', strtotime($row['created_at'])); ?></td>
                        <td>
                            <a href="update_order.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn-update">Update</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
