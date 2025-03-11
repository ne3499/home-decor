<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Decor | Home</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            /* Light Gray Background */
        }

        /* Navigation Bar */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 15px 50px;
        }

        .logo {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            display: flex;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            transition: 0.3s;
        }

        nav ul li a:hover {
            color: #ffcc00;
        }

        /* Hero Section */
        .hero {
            background-color: rgb(94, 157, 164);
            /* Deep Blue Background */
            color: white;
            text-align: center;
            padding: 100px 20px;
        }

        .hero-content h1 {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .hero-content p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .shop-btn {
            background: #ffcc00;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            text-decoration: none;
            color: black;
            border-radius: 5px;
        }

        .shop-btn:hover {
            background: #e6b800;
        }

        /* Featured Categories */
        .categories {
            text-align: center;
            padding: 50px;
        }

        .category-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .category {
            background: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .category img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .category h3 {
            margin-top: 10px;
            font-size: 20px;
        }

        /* Footer */
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 20px;
        }
    </style>

    <!-- Navigation Bar -->
    <header>
        <div class="logo">Home Decor</div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About </a></li>
                <li><a href="store.php">Store</a></li>
                <li><a href="cart.php" class="cart">🛒 Cart</a></li>
                <li><a href="service.php">Service</a></li>
                <li><a href="contact.php">Contact</a></li>
                
                <form action="search.php" method="GET" class="search-form">
                    <input type="text" name="query" placeholder="search bar" required>
                    <button type="submit">🔍</button>
                </form>




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
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Transform Your Home with Elegant Furniture</h1>
            <p>Discover premium quality furniture for every room.</p>
            <a href="#" class="shop-btn">Shop Now</a>
        </div>
    </section>

    <!-- Featured Categories -->
    <section class="categories">
        <h2>Explore Our Collections</h2>
        <div class="category-container">
            <div class="category">
                <img src="living-room.jpg" alt="Living Room">
                <h3>Living Room</h3>
            </div>
            <div class="category">
                <img src="bedroom.jpg" alt="Bedroom">
                <h3>Bedroom</h3>
            </div>
            <div class="category">
                <img src="office.jpg" alt="Office">
                <h3>Office</h3>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Furniture Haven. All rights reserved.</p>
    </footer>

</body>

</html>