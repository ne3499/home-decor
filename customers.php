<?php
include 'db_connect.php';

// Fetch customers from the database
$query = "SELECT id, name, email, phone, address, created_at FROM customers ORDER BY created_at DESC";
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
    <title>Manage Customers</title>
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
        .btn-delete {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Manage Customers</h2>
    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Registered Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['address']); ?></td>
                        <td><?php echo date('d-m-Y H:i', strtotime($row['created_at'])); ?></td>
                        <td>
                            <form action="delete_customer.php" method="POST" style="display:inline;">
                                <input type="hidden" name="customer_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
