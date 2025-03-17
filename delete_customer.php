<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['customer_id'])) {
    $customer_id = intval($_POST['customer_id']);
    $query = "DELETE FROM customers WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $customer_id);
    
    if ($stmt->execute()) {
        header("Location: customers.php"); // Redirect to customers list after deletion
    } else {
        echo "Error deleting customer: " . $conn->error;
    }
}
?>
