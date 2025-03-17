<?php
include 'db_connect.php';

// Fetch products from the database
$query = "SELECT * FROM products";
$result = $conn->query($query);

// Handle product deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    // Fetch and delete product image
    $imageQuery = $conn->query("SELECT image FROM products WHERE id = $id");
    $imageData = $imageQuery->fetch_assoc();
    if ($imageData && file_exists($imageData['image'])) {
        unlink($imageData['image']); // Delete image file
    }

    $conn->query("DELETE FROM products WHERE id = $id");
    header("Location: manage_products.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="manage_products.css"> <!-- External CSS -->
</head>
<style>
    /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

/* Container */
.container {
    background: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

/* Table Styling */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    text-align: center;
    padding: 10px;
    vertical-align: middle;
}

.table-hover tbody tr:hover {
    background-color: #f1f1f1;
}

/* Image Styling */
img {
    border-radius: 5px;
    object-fit: cover;
}

/* Buttons */
.btn {
    padding: 6px 12px;
    border-radius: 5px;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
}

.btn:hover {
    opacity: 0.8;
}

</style>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Manage Products</h2>
        <a href="add_product.php" class="btn btn-primary mb-3">Add New Product</a>
        
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo substr($row['description'], 0, 50) . '...'; ?></td>
                        <td>$<?php echo number_format($row['price'], 2); ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><img src="<?php echo $row['image']; ?>" width="60" height="60" alt="Product Image"></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="manage_products.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
