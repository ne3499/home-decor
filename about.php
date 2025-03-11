<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Decor | About Us</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* Navigation Bar */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
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

/* About Section */
.about-container {
    max-width: 900px;
    margin: 50px auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
}

h1, h2 {
    color: #333;
}

.about-container p {
    font-size: 18px;
    color: #666;
    line-height: 1.6;
}

.about-container ul {
    text-align: left;
    margin-top: 20px;
    padding-left: 20px;
}

.about-container ul li {
    font-size: 16px;
    margin: 10px 0;
}

/* Footer */
footer {
    background: #333;
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
                <li><a href="about.php">About</a></li>
                <li><a href="store.php">Store</a></li>
                <li><a href="cart.php" class="cart">🛒 Cart</a></li>
                <li><a href="service.php">Service</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
<br>
<br>
<br>
<br>
    <!-- About Section -->
    <section class="about-container">
        <div class="about-content">
            <h1>About Us</h1>
            <p>Welcome to Home Decor – your go-to destination for elegant and stylish home furnishings. We are passionate about transforming your living space with high-quality, affordable furniture and decor items.</p>
            
            <h2>Our Mission</h2>
            <p>Our mission is to provide homeowners with the finest selection of furniture, home decor accessories, and unique design inspirations that blend comfort and style effortlessly.</p>

            <h2>Why Choose Us?</h2>
            <ul>
                <li>🛋️ **Premium Quality Furniture** – Crafted with durability and style in mind.</li>
                <li>🌿 **Eco-Friendly Materials** – Sustainability is at the heart of our products.</li>
                <li>🚚 **Fast & Secure Delivery** – Your order reaches you in perfect condition.</li>
                <li>💰 **Affordable Pricing** – Luxurious designs at budget-friendly rates.</li>
                <li>🎨 **Customization Options** – Personalize your furniture to match your aesthetic.</li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Home Decor. All rights reserved.</p>
    </footer>

</body>
</html>
