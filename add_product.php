<?php
include 'db_connect.php';

$message = ""; // To store success or error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $created_at = date("Y-m-d H:i:s");

    // Ensure the uploads directory exists
    $imagePath = "uploads/";
    if (!is_dir($imagePath)) {
        mkdir($imagePath, 0777, true); // Create the directory if it does not exist
    }

    $image = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageName = time() . "_" . basename($_FILES['image']['name']);
        $imageFullPath = $imagePath . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $imageFullPath)) {
            $image = $imageFullPath;
        } else {
            $message = "Failed to upload image.";
        }
    }


    // Insert into database
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, category, image, created_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsss", $name, $description, $price, $category, $image, $created_at);

    if ($stmt->execute()) {
        $message = "Product added successfully!";
    } else {
        $message = "Error adding product: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="add_product.css"> <!-- External CSS -->
</head>
<style>
    /* General Page Styling */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    /* Container */
    .container {
        max-width: 600px;
        margin: 50px auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Form Inputs */
    .form-control {
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #ccc;
    }

    /* Buttons */
    .btn {
        padding: 10px;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .btn:hover {
        opacity: 0.9;
    }
</style>

<body>
    <div class="container">
        <h2 class="text-center">Add New Product</h2>

        <?php if (!empty($message)): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price ($)</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" name="category" id="category" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
            <a href="manage_products.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>

</html>