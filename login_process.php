<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user details from the database
    $query = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role']; // Store user role in session

        // Redirect based on role
        if ($user['role'] === 'admin') {
            $_SESSION['admin_logged_in'] = true;
            header("Location: dashboard.php"); // Redirect to admin dashboard
        } else {
            header("Location: home.php"); // Redirect to user dashboard
        }
        exit();
    } else {
        echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
    }
}
?>
