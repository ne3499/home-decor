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

    <br><br><br>

    <!-- Store Section -->
    <section class="store">
        <h1>Explore Our Exclusive Collection</h1>

        <!-- Product Grid -->
        <div class="store-container">
            <?php
            $query = "SELECT * FROM products";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product">';
                echo '<img src="images/' . $row['image'] . '" alt="' . $row['name'] . '">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p>$' . $row['price'] . '</p>';
                echo '<a href="cart.php?id=' . $row['id'] . '" class="buy-btn">Add to Cart</a>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Home Decor. All rights reserved.</p>
    </footer>

</body>

</html>
