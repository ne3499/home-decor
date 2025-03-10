<?php
session_start();
include('db_connect.php'); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); // Direct comparison

    // Fetch user from the database
    $sql = "SELECT * FROM users WHERE LOWER(email) = LOWER('$email')";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($password === $user['password']) { // Direct password comparison
            // Store user info in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            echo "<script>alert('Login successful!'); window.location.href='index.php';</script>";
            exit();
        } else {
            echo "<script>alert('Incorrect password! Try again.'); window.location.href='login.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Email not found! Please sign up first.'); window.location.href='signup.php';</script>";
        exit();
    }
}
?>
