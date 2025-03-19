<?php
 include 'db_connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success | Home Decor</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            padding: 50px;
        }
        .success-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: auto;
        }
        h2 {
            color: #27ae60;
            font-size: 28px;
        }
        p {
            font-size: 18px;
            color: #555;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #ff6600;
            color: white;
            font-size: 18px;
            font-weight: 500;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn:hover {
            background: #cc5500;
        }
    </style>
</head>
<body>

    <div class="success-container">
        <h2>🎉 Order Placed Successfully!</h2>
        <p>Thank you for shopping with Home Decor. Your order is being processed.</p>
        <a href="index.php" class="btn">Continue Shopping</a>
    </div>

</body>
</html>
