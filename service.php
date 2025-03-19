<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Decor | Services</title>
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

/* Service Section */
.service-container {
    max-width: 1100px;
    margin: 50px auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
}

h1 {
    font-size: 32px;
    color: #333;
}

.service-container p {
    font-size: 18px;
    color: #666;
    margin-bottom: 30px;
}

/* Service Grid */
.service-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
}

/* Service Box */
.service-box {
    background: white;
    padding: 20px;
    text-align: center;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: 0.3s;
}

.service-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

.service-box img {
    width: 100%;
    height: 200px;
    border-radius: 10px;
    object-fit: cover;
}

.service-box h3 {
    margin-top: 10px;
    font-size: 22px;
    color: #333;
}

.service-box p {
    font-size: 16px;
    color: #666;
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
        <?php include 'navbar.php'; ?>
    </header>

    <br>
    <br>
    <br>

    <!-- Services Section -->
    <section class="service-container">
        <h1>Our Home Decor Services</h1>
        <p>We offer a variety of premium services to transform your home into a beautiful and comfortable space.</p>

        <div class="service-grid">
            <div class="service-box">
                <img src="interior-design.jpg" alt="Interior Design">
                <h3>Interior Design</h3>
                <p>Our experts will help you design the perfect interior for your home.</p>
            </div>

            <div class="service-box">
                <img src="custom-furniture.jpg" alt="Custom Furniture">
                <h3>Custom Furniture</h3>
                <p>Get handcrafted furniture tailored to your needs and preferences.</p>
            </div>

            <div class="service-box">
                <img src="wall-decor.jpg" alt="Wall Decor">
                <h3>Wall Decor</h3>
                <p>We provide stunning wall decor solutions to enhance your space.</p>
            </div>

            <div class="service-box">
                <img src="lighting.jpg" alt="Lighting Setup">
                <h3>Lighting Setup</h3>
                <p>Professional lighting solutions to brighten up your home beautifully.</p>
            </div>

            <div class="service-box">
                <img src="home-staging.jpg" alt="Home Staging">
                <h3>Home Staging</h3>
                <p>We prepare your home for sale with the best decor ideas and styling.</p>
            </div>

            <div class="service-box">
                <img src="consultation.jpg" alt="Consultation">
                <h3>Free Consultation</h3>
                <p>Book a free consultation with our experts for your home decor needs.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Home Decor. All rights reserved.</p>
    </footer>

</body>
</html>
