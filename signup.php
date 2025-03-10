



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | Home Décor</title>
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
            <div class="card-header">Create Your Account</div>
            <div class="card-body">
                <form action="signup_process.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">Sign Up</button>
                    <p class="text-center mt-3">Already have an account? <a href="login.php" style="color: #CD853F; font-weight: bold;">Login</a></p>
                </form>
            </div>
        </div>
    </div>

</body>
</html>