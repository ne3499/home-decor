<?php
session_start();
session_unset();
session_destroy();

// Redirect to login page after logout
header("refresh:3;url=login.php"); // Redirect after 3 seconds
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging Out...</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .logout-container {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
        }

        .logout-container h2 {
            color: #333;
        }

        .logout-container p {
            color: #666;
            font-size: 16px;
        }

        .spinner-border {
            margin-top: 10px;
        }

        .redirect-text {
            font-size: 14px;
            color: #888;
            margin-top: 10px;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

<div class="logout-container">
    <h2>Logging Out...</h2>
    <p>You have been successfully logged out.</p>
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <p class="redirect-text">Redirecting to <a href="login.php">login page</a> in 3 seconds...</p>
</div>

</body>
</html>
