<?php
include 'db_connect.php';

$message = ""; // To store success or error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields exist in the form submission
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    $category = $_POST['category'] ?? '';
    $created_at = date("Y-m-d H:i:s");

    // Ensure required fields are not empty
    if (empty($name) || empty($description) || empty($price) || empty($category)) {
        $message = "Please fill in all required fields.";
    } else {
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

        // Insert into database only if image is uploaded successfully
        if (!empty($image)) {
            $stmt = $conn->prepare("INSERT INTO products (name, description, price, category, image, created_at) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdsss", $name, $description, $price, $category, $image, $created_at);

            if ($stmt->execute()) {
                $message = "Product added successfully!";
            } else {
                $message = "Error adding product: " . $stmt->error;
            }
        } else {
            $message = "Image upload failed. Product not added.";
        }
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
    <link rel="stylesheet" href="add_product.css">
</head>

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
    <label for="price" class="form-label">Price </label>
    <div class="input-group">
        <span class="input-group-text">₹</span>
        <input type="number" name="price" id="price" class="form-control" step="0.01" required>
    </div>
</div>


            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="">Select Category</option>
                    <option value="Living Room">Living Room</option>
                    <option value="Bedroom">Bedroom</option>
                    <option value="office">office</option>
                    <option value="Kitchen">Kitchen</option>
                </select>
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
