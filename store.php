<?php
session_start();
include 'db_connect.php';

// Fetch products from the database
$query = "SELECT * FROM products"; // Assuming you have a `products` table
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Decor | Store</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="store.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<style>
    /* General Styles */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
    }

    /* Store Layout */
    .store-container {
        display: flex;
        flex-wrap: wrap;
        padding: 40px;
        justify-content: center;
    }

    /* Store Card */
    .store-card {
        width: 90%;
        background: #fff;
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        padding: 30px;
        margin-top: 20px;
    }

    /* Sidebar */
    .store-sidebar {
        width: 25%;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        height: fit-content;
    }

    .store-sidebar h3 {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #333;
    }

    .store-sidebar h4 {
        margin: 15px 0;
        font-weight: 500;
    }

    .filter-category ul {
        list-style: none;
        padding: 0;
    }

    .filter-category ul li {
        margin-bottom: 12px;
    }

    .filter-category ul li a {
        text-decoration: none;
        color: #444;
        font-weight: 400;
        transition: 0.3s;
    }

    .filter-category ul li a:hover {
        color: #ff6600;
        font-weight: 500;
    }

    /* Price Filter */
    .filter-price input {
        width: 100%;
        margin-top: 10px;
    }

    /* Store Products */
    .store-products {
        width: 70%;
        padding: 20px;
    }

    .store-products h2 {
        text-align: center;
        font-size: 28px;
        font-weight: 600;
        color: #333;
        margin-bottom: 30px;
    }

    /* Product Grid */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    /* Product Card */
    .product-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 15px;
        transition: 0.3s;
        position: relative;
        overflow: hidden;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .product-card img {
        max-width: 100%;
        height: 200px;
        border-radius: 10px;
        object-fit: cover;
    }

    /* Product Info */
    .product-info {
        padding: 15px;
    }

    .product-info h3 {
        margin: 10px 0;
        font-size: 22px;
        font-weight: 500;
        color: #333;
    }

    .product-info .price {
        font-size: 20px;
        font-weight: 600;
        color: #27ae60;
    }

    /* Add to Cart Button */
    .add-to-cart {
        display: inline-block;
        margin-top: 10px;
        padding: 12px 20px;
        background: #ff6600;
        color: white;
        text-decoration: none;
        font-weight: 500;
        border-radius: 6px;
        transition: 0.3s;
    }

    .add-to-cart:hover {
        background: #e65c00;
        transform: scale(1.05);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .store-container {
            flex-direction: column;
            padding: 20px;
        }

        .store-sidebar {
            width: 100%;
            margin-bottom: 20px;
        }

        .store-products {
            width: 100%;
        }

        .store-card {
            width: 100%;
        }
    }
</style>

<body>
    <!-- Navigation Bar -->
    <header>
        <div class="logo">Home Decor</div>
        <?php include 'navbar.php'; ?>
    </header>

    <!-- Store Section -->
    <section class="store-container">
        <div class="store-card">
            <div class="store-container">
                <!-- Sidebar Filters -->
                <aside class="store-sidebar">
                    <h3>Filter by</h3>
                    <div class="filter-category">
                        <h4>Category</h4>
                        <ul>
                            <li><a href="living_room.php">Living Room</a></li>
                            <li><a href="bedroom.php">Bedroom</a></li>
                            <li><a href="office.php">Office</a></li>
                            <li><a href="kitchen.php">Kitchen</a></li>
                        </ul>
                    </div>
                    
                </aside>

                <!-- Product Grid -->
                <div class="store-products">
                    <h2>Our Collection</h2>
                    <div class="product-grid">
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <div class="product-card">
                                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                                <div class="product-info">
                                    <h3><?php echo $row['name']; ?></h3>
                                    <p class="price">₹<?php echo number_format($row['price'], 2); ?></p>
                                    <a href="cart.php?add=<?php echo $row['id']; ?>" class="add-to-cart">Add to Cart</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Home Decor. All rights reserved.</p>
    </footer>
</body>

</html>
