<?php
include 'db_connect.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id = $id");
$product = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $updateQuery = "UPDATE products SET 
                    name='$name', 
                    description='$description', 
                    price='$price', 
                    category='$category' 
                    WHERE id=$id";

    if ($conn->query($updateQuery)) {
        header("Location: admin.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form method="POST">
        <input type="text" name="name" value="<?= $product['name'] ?>" required><br>
        <textarea name="description"><?= $product['description'] ?></textarea><br>
        <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br>
        <input type="text" name="category" value="<?= $product['category'] ?>" required><br>
        <button type="submit">Update Product</button>
    </form>
</body>
</html>
