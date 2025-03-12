<?php
include 'db_connect.php';

// Fetch all products
$products = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Home Decor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<style>
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
    position: fixed;
    height: 100vh;
    background: #343a40;
    color: white;
    padding-top: 20px;
}

.sidebar-header h3 {
    text-align: center;
    color: #ffcc00;
}

#sidebar ul {
    list-style: none;
    padding: 0;
}

#sidebar ul li {
    padding: 15px;
    text-align: center;
}

#sidebar ul li a {
    text-decoration: none;
    color: white;
    display: block;
    transition: 0.3s;
}

#sidebar ul li a:hover {
    background: #ffcc00;
    color: black;
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
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>🏠 Home Decor Admin</h3>
            </div>
            <ul class="list-unstyled components">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Manage Products</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Customers</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <div class="container mt-4">
                <h2 class="text-center mb-4">Admin Panel - Manage Products</h2>
                
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">+ Add Product</button>

                <div class="row">
                    <?php while ($product = $products->fetch_assoc()) { ?>
                        <div class="col-md-4">
                            <div class="card product-card">
                                <img src="<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?= $product['name'] ?></h5>
                                    <p class="card-text price">$<?= $product['price'] ?></p>
                                    <a href="edit_product.php?id=<?= $product['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete_product.php?id=<?= $product['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Add Product Modal -->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add a New Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="add_product.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" step="0.01" class="form-control" name="price" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>
                                <button type="submit" class="btn btn-success">Add Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>