<?php
session_start();
if (empty($_SESSION['cart'])) {
    header("Location: cart.php"); // Redirect to cart if empty
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Home Decor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-weight: 600;
        }

        .checkout-btn {
            background: #28a745;
            color: white;
            font-weight: bold;
            border: none;
            padding: 12px;
            border-radius: 5px;
            width: 100%;
            transition: 0.3s;
        }

        .checkout-btn:hover {
            background: #218838;
        }

        .payment-method {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }

        .payment-method div {
            width: 48%;
            text-align: center;
            padding: 10px;
            border: 2px solid #ddd;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }

        .payment-method div:hover {
            border-color: #28a745;
        }

        .payment-method input {
            display: none;
        }

        .selected {
            border-color: #28a745 !important;
            background: rgba(40, 167, 69, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .payment-method {
                flex-direction: column;
            }

            .payment-method div {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Checkout</h2>

        <!-- Order Summary -->
        <h4>Order Summary</h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between">
                <strong>Product</strong> <span>Price</span>
            </li>
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $item) :
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
                <li class='list-group-item d-flex justify-content-between'>
                    <?= $item['name']; ?> (x<?= $item['quantity']; ?>)
                    <span>₹<?= number_format($subtotal, 2); ?></span>
                </li>
            <?php endforeach; ?>
            <li class="list-group-item d-flex justify-content-between">
                <strong>Total</strong> <span>₹<?= number_format($total, 2); ?></span>
            </li>
        </ul>

        <!-- Billing & Shipping -->
        <h4>Billing & Shipping Details</h4>
        <form action="process_order.php" method="POST">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Shipping Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>

            <!-- Payment Method -->
            <h4>Payment Method</h4>
            <div class="payment-method">
                <div class="method" onclick="selectMethod('card')">
                    <input type="radio" name="payment" value="card" id="card" required>
                    <label for="card">💳 Credit/Debit Card</label>
                </div>
                <div class="method" onclick="selectMethod('cod')">
                    <input type="radio" name="payment" value="cod" id="cod" required>
                    <label for="cod">💵 Cash on Delivery</label>
                </div>
            </div>

            <!-- Proceed Button -->
            <button type="submit" class="checkout-btn">Proceed to Pay</button>
        </form>
    </div>

    <script>
        function selectMethod(method) {
            document.querySelectorAll('.method').forEach(item => {
                item.classList.remove('selected');
            });
            document.getElementById(method).checked = true;
            event.target.closest('.method').classList.add('selected');
        }
    </script>

</body>

</html>
