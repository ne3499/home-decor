<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Fetch the order details
    $query = "SELECT * FROM orders WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

    if (!$order) {
        die("Order not found.");
    }
}

// Handle form submission for updating the order status
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_status = $_POST['status'];

    $update_query = "UPDATE orders SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("si", $new_status, $order_id);

    if ($stmt->execute()) {
        echo "<script>alert('Order status updated successfully!'); window.location.href='orders.php';</script>";
    } else {
        echo "<script>alert('Failed to update order status.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-update {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-update:hover {
            background-color: #0056b3;
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Update Order Status</h2>
    <form method="post">
        <div class="form-group mb-3">
            <label>Order ID:</label>
            <input type="text" class="form-control" value="<?php echo $order['id']; ?>" disabled>
        </div>
        <div class="form-group mb-3">
            <label>Current Status:</label>
            <input type="text" class="form-control" value="<?php echo ucfirst($order['status']); ?>" disabled>
        </div>
        <div class="form-group mb-3">
            <label>New Status:</label>
            <select name="status" class="form-control" required>
                <option value="Pending" <?php if ($order['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                <option value="Completed" <?php if ($order['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                <option value="Cancelled" <?php if ($order['status'] == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn-update">Update Order</button>
        </div>
    </form>
</div>

</body>
</html>
