<?php
session_start();
include('db_connect.php'); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values & sanitize them
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); // No hashing

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format!'); window.location.href='signup.php';</script>";
        exit();
    }

    // Check if email already exists
    $check_query = "SELECT * FROM users WHERE email='$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Email already registered! Try logging in.'); window.location.href='login.php';</script>";
        exit();
    }

    // Insert user into database (Plain text password)
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registration successful! You can now log in.'); window.location.href='login.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='signup.php';</script>";
        exit();
    }
}
?>
