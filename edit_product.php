<?php
session_start();
include 'db_connect.php';

// Check if product ID is set
if (!isset($_GET['id'])) {
    die("Product ID is missing.");
}

$product_id = $_GET['id'];

// Fetch product details
$query = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Product not found.");
}

$product = $result->fetch_assoc();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "uploads/" . $image_name;

        if (move_uploaded_file($image_tmp, $image_path)) {
            // Update with new image
            $update_query = "UPDATE products SET name = ?, description = ?, price = ?, category = ?, image = ? WHERE id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("ssdssi", $name, $description, $price, $category, $image_path, $product_id);
        } else {
            die("Image upload failed.");
        }
    } else {
        // Update without changing image
        $update_query = "UPDATE products SET name = ?, description = ?, price = ?, category = ? WHERE id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ssdsi", $name, $description, $price, $category, $product_id);
    }

    if ($stmt->execute()) {
        header("Location: dashboard.php?msg=Product updated successfully");
        exit();
    } else {
        die("Error updating product.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    color: #333;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    width: 400px;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    color: #ff4757;
}

form {
    display: flex;
    flex-direction: column;
}

input, textarea, select {
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

button {
    padding: 10px;
    background: #ff4757;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background 0.3s;
}

button:hover {
    background: #e84118;
}

img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 15px;
}

</style>
<body>

<div class="container">
    <h2>Edit Product Details</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <img src="<?= htmlspecialchars($product['image']); ?>" alt="Product Image">
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']); ?>" required>
        <textarea name="description" required><?= htmlspecialchars($product['description']); ?></textarea>
        <input type="number" name="price" value="<?= $product['price']; ?>" step="0.01" required>
        <input type="text" name="category" value="<?= htmlspecialchars($product['category']); ?>" required>
        <input type="file" name="image">
        <button type="submit">Update Product</button>
    </form>
</div>

</body>
</html>
