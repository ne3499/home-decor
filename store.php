<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store | Home Decor</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <style>
        /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f8f8;
}

/* Navigation Bar */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #222;
    padding: 15px 50px;
}

.logo {
    color: #ffcc00;
    font-size: 24px;
    font-weight: bold;
}

nav ul {
    list-style: none;
    display: flex;
    padding: 0;
    margin: 0;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-size: 18px;
    transition: 0.3s;
}

nav ul li a:hover {
    color: #ffcc00;
}

/* Store Section */
.store {
    text-align: center;
    padding: 50px;
    background: linear-gradient(135deg, #f5f5f5, #ffffff);
}

.store h1 {
    font-size: 36px;
    color: #222;
    margin-bottom: 20px;
}

/* Product Grid */
.store-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

/* Individual Product */
.product {
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
    transition: transform 0.3s;
}

.product:hover {
    transform: scale(1.05);
}

.product img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
}

.product h3 {
    margin: 10px 0;
    font-size: 22px;
    color: #333;
}

.product p {
    font-size: 18px;
    font-weight: bold;
    color: #1e3a8a;
}

/* Add to Cart Button */
.buy-btn {
    display: inline-block;
    background: #ffcc00;
    color: black;
    padding: 10px 15px;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    margin-top: 10px;
    transition: background 0.3s;
}

.buy-btn:hover {
    background: #e6b800;
}

/* Footer */
footer {
    background: #222;
    color: white;
    text-align: center;
    padding: 15px 0;
    margin-top: 20px;
}

    </style>

    <!-- Navigation Bar -->
    <header>
        <div class="logo">Home Decor</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="store.php">Store</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cart.php" class="cart">🛒 Cart</a></li>
            </ul>
        </nav>
    </header>
<br>
<br>
<br>
    <!-- Store Section -->
    <section class="store">
        <h1>Explore Our Exclusive Collection</h1>

        <!-- Product Grid -->
        <div class="store-container">

            <!-- Product 1 -->
            <div class="product">
                <img src="images/sofa.jpg" alt="Luxury Sofa">
                <h3>Luxury Sofa</h3>
                <p>$499.99</p>
                <a href="cart.php" class="buy-btn">Add to Cart</a>
            </div>

            <!-- Product 2 -->
            <div class="product">
                <img src="images/table.jpg" alt="Modern Dining Table">
                <h3>Modern Dining Table</h3>
                <p>$299.99</p>
                <a href="cart.php" class="buy-btn">Add to Cart</a>
            </div>

            <!-- Product 3 -->
            <div class="product">
                <img src="images/bed.jpg" alt="King Size Bed">
                <h3>King Size Bed</h3>
                <p>$699.99</p>
                <a href="cart.php" class="buy-btn">Add to Cart</a>
            </div>

            <!-- Product 4 -->
            <div class="product">
                <img src="images/lamp.jpg" alt="Decorative Lamp">
                <h3>Decorative Lamp</h3>
                <p>$79.99</p>
                <a href="cart.php" class="buy-btn">Add to Cart</a>
            </div>

            <!-- Product 5 -->
            <div class="product">
                <img src="images/chair.jpg" alt="Comfortable Chair">
                <h3>Comfortable Chair</h3>
                <p>$149.99</p>
                <a href="cart.php" class="buy-btn">Add to Cart</a>
            </div>

            <!-- Product 6 -->
            <div class="product">
                <img src="images/rug.jpg" alt="Luxury Rug">
                <h3>Luxury Rug</h3>
                <p>$99.99</p>
                <a href="cart.php" class="buy-btn">Add to Cart</a>
            </div>

            <!-- Product 7 -->
            <div class="product">
                <img src="images/rug.jpg" alt="Luxury Rug">
                <h3>Luxury Rug</h3>
                <p>$99.99</p>
                <a href="cart.php" class="buy-btn">Add to Cart</a>
            </div>

            <!-- Product 8 -->
            <div class="product">
                <img src="images/rug.jpg" alt="Luxury Rug">
                <h3>Luxury Rug</h3>
                <p>$99.99</p>
                <a href="cart.php" class="buy-btn">Add to Cart</a>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Home Decor. All rights reserved.</p>
    </footer>

</body>

</html>
