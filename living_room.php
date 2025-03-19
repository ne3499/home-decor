<?php
session_start();
include 'db_connect.php';

// Fetch products for Living Room category
$query = "SELECT * FROM products WHERE category = 'Living Room'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Living Room Collection | Home Decor</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
       
        /* Store Container */
        /* Add margin to prevent overlapping with navbar */
.store-container {
    width: 90%;
    margin: 120px auto 50px auto; /* Increased top margin */
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
    justify-items: center;
}

/* Fix navbar if it's positioned absolutely */



        /* Product Card */
        .product-card {
            width: 320px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            text-align: center;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            width: 100%;
            height: 220px;
            border-radius: 10px;
            object-fit: cover;
            transition: 0.3s;
        }

        .product-card img:hover {
            opacity: 0.9;
        }

        .product-info {
            padding: 15px;
        }

        .product-info h3 {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin: 10px 0;
        }

        .product-info .price {
            font-size: 18px;
            font-weight: 600;
            color: #27ae60;
            margin: 5px 0;
        }

        /* Buttons */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 15px;
        }

        .btn {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-radius: 5px;
            transition: 0.3s;
            border: none;
            cursor: pointer;
            display: inline-block;
        }

        .cart-btn {
            background: #ff6600;
            color: white;
        }

        .cart-btn:hover {
            background: #e65c00;
        }

        .buy-btn {
            background: #27ae60;
            color: white;
        }

        .buy-btn:hover {
            background: #219150;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .store-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="logo">Home Decor</div>
    <?php include 'navbar.php'; ?>
</header>

<section class="store-container">
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="product-card">
                <img src="<?= $row['image']; ?>" alt="<?= $row['name']; ?>">
                <div class="product-info">
                    <h3><?= $row['name']; ?></h3>
                    <p class="price">₹<?= number_format($row['price'], 2); ?></p>
                    <div class="action-buttons">
                        <a href="cart.php?add=<?= $row['id']; ?>" class="btn cart-btn">Add to Cart</a>
                        <a href="checkout.php?buy=<?= $row['id']; ?>" class="btn buy-btn">Buy Now</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p style="text-align: center; font-size: 18px;">No products available for Living Room.</p>
    <?php endif; ?>
</section>

</body>
</html>
