<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | Home Decor</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .cart-container {
            width: 80%;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            font-size: 28px;
            font-weight: 600;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

        th {
            background: #ff6600;
            color: white;
            font-size: 18px;
        }

        td img {
            width: 60px;
            border-radius: 5px;
        }

        /* Remove Button */
        .remove-btn {
            background: #ff4d4d;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .remove-btn:hover {
            background: #cc0000;
        }

        /* Checkout Button */
        .checkout-button {
            display: inline-block;
            margin-top: 20px;
            padding: 15px 25px;
            background: #27ae60;
            color: white;
            font-size: 18px;
            font-weight: 500;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }

        .checkout-button:hover {
            background: #219150;
            transform: scale(1.05);
        }

        /* Empty Cart Message */
        .empty-cart {
            font-size: 20px;
            color: #777;
            margin-top: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .cart-container {
                width: 95%;
                padding: 20px;
            }

            th,
            td {
                padding: 10px;
            }

            .checkout-button {
                padding: 12px 20px;
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">Home Decor</div>
        <?php include 'navbar.php'; ?>
    </header>

    <section class="cart-container">
        <h2>Your Cart</h2>

        <?php if (empty($_SESSION['cart'])): ?>
            <p class="empty-cart">🛒 Your cart is empty.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <?php
                $total_price = 0;
                foreach ($_SESSION['cart'] as $id => $item) :
                    $total_price += $item['price'] * $item['quantity'];
                ?>
                    <tr>
                        <td><img src="<?= $item['image']; ?>" alt="<?= $item['name']; ?>"></td>
                        <td><?= $item['name']; ?></td>
                        <td>₹<?= number_format($item['price'], 2); ?></td>
                        <td><?= $item['quantity']; ?></td>
                        <td>₹<?= number_format($item['price'] * $item['quantity'], 2); ?></td>
                        <td>
                            <a href="remove_cart.php?remove=<?= $id; ?>" class="remove-btn">Remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <h3>Total: <span style="color: #27ae60;">₹<?= number_format($total_price, 2); ?></span></h3>
            <a href="checkout.php" class="checkout-button">Proceed to Checkout</a>
        <?php endif; ?>
    </section>

</body>

</html>