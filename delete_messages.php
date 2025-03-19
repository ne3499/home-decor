<?php
session_start();
include 'db_connect.php';

// Check if admin is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Unauthorized access!'); window.location='login.php';</script>";
    exit();
}

// Check if message_id is provided
if (isset($_POST['message_id'])) {
    $message_id = intval($_POST['message_id']);

    // Delete query
    $deleteQuery = "DELETE FROM messages WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $message_id);

    if ($stmt->execute()) {
        echo "<script>alert('Message deleted successfully!'); window.location='messages.php';</script>";
    } else {
        echo "<script>alert('Error deleting message!'); window.location='messages.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid request!'); window.location='messages.php';</script>";
}
?>
