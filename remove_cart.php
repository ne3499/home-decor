<?php
session_start();

if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    unset($_SESSION['cart'][$product_id]);
}

header("Location: view_cart.php");
exit();
?>
