<?php
session_start();
include 'db_connect.php'; // Include database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login to place an order!'); window.location='login.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id']; // Ensure user ID is set
$fullname = $_POST['fullname'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$payment_method = $_POST['payment'];

// Ensure cart is not empty before processing
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<script>alert('Your cart is empty!'); window.location='cart.php';</script>";
    exit();
}

// Calculate total price from cart
$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_price += $item['price'] * $item['quantity'];
}

// Insert order into 'orders' table
$stmt = $conn->prepare("INSERT INTO orders (user_id, fullname, address, phone, payment_method, total_price) 
                        VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssd", $user_id, $fullname, $address, $phone, $payment_method, $total_price);

if ($stmt->execute()) {
    $order_id = $conn->insert_id; // Get last inserted order ID

    // Prepare insert statement for order details
    $stmt_details = $conn->prepare("INSERT INTO order_details (order_id, product_name, quantity, price, total_price) 
                                    VALUES (?, ?, ?, ?, ?)");

    foreach ($_SESSION['cart'] as $id => $item) {
        $product_name = $item['name'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        $item_total_price = $price * $quantity;

        $stmt_details->bind_param("isidd", $order_id, $product_name, $quantity, $price, $item_total_price);
        $stmt_details->execute(); // **Execute the query inside the loop**
    }

    // Clear cart after successful order
    unset($_SESSION['cart']);

    echo "<script>alert('Order placed successfully!'); window.location='order_success.php';</script>";
} else {
    echo "<script>alert('Error processing your order!'); window.location='checkout.php';</script>";
}

// Close statements and connection
$stmt->close();
$stmt_details->close();
$conn->close();
?>