<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Decor | Cart</title>
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

/* Cart Section */
.cart-container {
    max-width: 900px;
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

/* Cart Table */
.cart-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.cart-table th, .cart-table td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

.cart-table th {
    background-color: #333;
    color: white;
}

.cart-table td {
    font-size: 18px;
    color: #555;
}

/* Empty Cart Message */
.empty-cart {
    text-align: center;
    font-size: 18px;
    color: #888;
    padding: 20px;
}

/* Cart Summary */
.cart-summary {
    margin-top: 20px;
    font-size: 20px;
    font-weight: bold;
}

.checkout-btn {
    background: #ffcc00;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    text-decoration: none;
    color: black;
    border-radius: 5px;
    display: inline-block;
    margin-top: 10px;
}

.checkout-btn:hover {
    background: #e6b800;
}

/* Remove Button */
.remove-btn {
    background: #ff4d4d;
    color: white;
    padding: 8px 15px;
    text-decoration: none;
    border-radius: 5px;
}

.remove-btn:hover {
    background: #cc0000;
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
    <!-- Cart Section -->
    <section class="cart-container">
        <h1>Your Shopping Cart</h1>

        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                include 'db_connect.php';

                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                $cart = $_SESSION['cart'];
                $total_price = 0;

                if (!empty($cart)) {
                    foreach ($cart as $product_id => $details) {
                        $subtotal = $details['price'] * $details['quantity'];
                        $total_price += $subtotal;
                        echo "<tr>
                                <td>{$details['name']}</td>
                                <td>\${$details['price']}</td>
                                <td>{$details['quantity']}</td>
                                <td>\${$subtotal}</td>
                                <td><a href='remove_from_cart.php?id={$product_id}' class='remove-btn'>Remove</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='empty-cart'>Your cart is empty.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="cart-summary">
            <h3>Total: $<?php echo number_format($total_price, 2); ?></h3>
            <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Home Decor. All rights reserved.</p>
    </footer>

</body>
</html>
