<?php
session_start();
include 'db_connect.php'; // Include database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login to send a message!'); window.location='login.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id']; // Logged-in user ID
$admin_id = 1; // Assuming admin has user_id = 1

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['message'])) {
        $message = trim($_POST['message']); // Get the message content

        // Insert message into the database
        $stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, message, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iis", $user_id, $admin_id, $message);

        if ($stmt->execute()) {
            echo "<script>alert('Message sent successfully!'); window.location='contact.php';</script>";
        } else {
            echo "<script>alert('Error sending message!');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please enter a message!');</script>";
    }
}

$conn->close();
?>