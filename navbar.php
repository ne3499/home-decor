<header>
    <div class="logo">Home Decor</div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="store.php">Store</a></li>
            <li><a href="service.php">Service</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="view_cart.php">Cart (<?= count($_SESSION['cart'] ?? []); ?>)</a></li>

            <form action="search.php" method="GET" class="search-form">
                <input type="text" name="query" placeholder="Search..." required>
                <button type="submit">🔍</button>
            </form>

            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="logout.php" class="logout-btn">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php" class="login-btn">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<style>
    header{
        position: fixed;
        z-index: 50;
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

    .logout-btn,
    .login-btn {
        background: red;
        color: white;
        padding: 8px 15px;
        border-radius: 5px;
        text-decoration: none;
    }

    .logout-btn:hover {
        background: darkred;
    }
</style>