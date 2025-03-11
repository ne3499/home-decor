<?php
session_start();
include 'db_connect.php';

// Check if Admin is Logged In
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php"); 
    exit();
}

// Handle Product Deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $conn->query("DELETE FROM products WHERE id = $delete_id");
    header("Location: admin.php");
    exit();
}

// Fetch Products
$result = $conn->query("SELECT * FROM products");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background: #f4f4f4;
}

h1, h2 {
    text-align: center;
}

.add-btn {
    display: block;
    margin: 10px auto;
    width: 200px;
    text-align: center;
    padding: 10px;
    background: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

th {
    background: #333;
    color: white;
}

.logout-btn {
    position: absolute;
    right: 20px;
    top: 20px;
    background: red;
    color: white;
    padding: 5px 10px;
    text-decoration: none;
}

</style>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </header>

    <h2>Manage Products</h2>
    <a href="add_product.php" class="add-btn">➕ Add New Product</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['description'] ?></td>
                <td>$<?= number_format($row['price'], 2) ?></td>
                <td><?= $row['category'] ?></td>
                <td><img src="uploads/<?= $row['image'] ?>" width="80"></td>
                <td>
                    <a href="edit_product.php?id=<?= $row['id'] ?>">✏ Edit</a> | 
                    <a href="admin.php?delete_id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">🗑 Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
