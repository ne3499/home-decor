<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    // Hash the password using bcrypt
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Set default role as 'user'
    $role = 'user';

    // Check if email already exists
    $check_query = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Email already exists! Please use a different email.'); window.location.href='signup.php';</script>";
        exit();
    }
    $stmt->close();

    // Insert new user into the database
    $query = "INSERT INTO users (name, email, phone, address, password, role) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $name, $email, $phone, $address, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "<script>alert('Signup successful! You can now login.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Error: Could not register. Please try again later.'); window.location.href='signup.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
