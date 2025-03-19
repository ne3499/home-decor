<?php
include 'db_connect.php';
include 'sidebar.php';
session_start();

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
    header("Location: products.php");
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
    <link rel="stylesheet" href="style.css"> <!-- External CSS -->
</head>
<body>
    <div class="wrapper">
        
    <?php include("sidebar.php");?>
        <!-- Page Content -->
        <div id="content">
            <div class="container mt-4">
                <h2 class="text-center">Manage Products</h2>
                <a href="add_product.php" class="btn btn-primary mb-3">Add New Product</a>
                
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            
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
                                
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo !empty($row['description']) ? substr($row['description'], 0, 50) . '...' : 'No description'; ?></td>
                                <td>₹<?php echo number_format($row['price'], 2); ?></td>
                                <td><?php echo htmlspecialchars($row['category']); ?></td>
                                <td>
                                    <?php if (!empty($row['image']) && file_exists($row['image'])): ?>
                                        <img src="<?php echo htmlspecialchars($row['image']); ?>" width="60" height="60" alt="Product Image">
                                    <?php else: ?>
                                        <span>No Image</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td>
                                    <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="products.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
        }
        
        /* Sidebar */
        #sidebar {
            width: 250px;
            height: 100vh;
            background: linear-gradient(135deg, rgb(157, 157, 159), rgb(51, 70, 116));
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

        /* Content Area */
        #content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        /* Responsive */
        @media (max-width: 768px) {
            #sidebar {
                width: 200px;
            }
            #content {
                margin-left: 200px;
            }
        }
    </style>
</body>
</html>
