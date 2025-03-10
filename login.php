<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['name'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE name='$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            header("Location: home.php");
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "User not found!";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Home Décor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f0ea;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin-top: 80px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            background-color: #fffaf0;
        }
        .card-header {
            background: linear-gradient(to right, #8B4513, #CD853F);
            color: white;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-custom {
            background-color: #CD853F;
            color: white;
            font-size: 1.1rem;
            border-radius: 8px;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #8B4513;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-header">Login to Home Décor</div>
            <div class="card-body">
                <form action="login_process.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">Login</button>
                    <p class="text-center mt-3">Don't have an account? <a href="signup.php" style="color: #CD853F; font-weight: bold;">Sign up</a></p>
                </form>
            </div>
        </div>
    </div>

</body>
</html>