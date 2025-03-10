<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Decor | Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Navigation Bar -->
    <header>
        <div class="logo">Home Decor</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About </a></li>
                <li><a href="#">Contact</a></li><form action="search.php" method="GET" class="search-form">
            <input type="text" name="query" placeholder=" " required>
            <button type="submit">🔍</button>
        </form>
                <li><a href="#" class="cart">🛒 Cart</a></li>


        
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