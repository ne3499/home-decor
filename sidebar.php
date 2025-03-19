<nav id="sidebar">
    <div class="sidebar-header">
        <h3>🏠 Home Decor Admin</h3>
    </div>
    <ul class="list-unstyled components">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="products.php">Manage Products</a></li>
        <li><a href="orders.php">Orders</a></li>
        <li><a href="customers.php">Customers</a></li>
        <li><a href="messages.php"> Messages</a></li> 
        <li><a href="settings.php">Settings</a></li>
        <li><a href="logout.php" class="logout-btn">Logout</a></li>
    </ul>
</nav>
<style>
/* Sidebar */
#sidebar {
    width: 250px;
    height: 100vh;
    background: linear-gradient(135deg, rgb(157, 157, 159), rgb(51, 70, 116));
    color: white;
    padding-top: 20px;
    position: fixed;
    left: 0;
    top: 0;
    transition: all 0.3s;
}

.sidebar-header {
    text-align: center;
    font-size: 22px;
    font-weight: bold;
    padding: 20px;
    border-bottom: 2px solid rgba(255, 255, 255, 0.2);
}

#sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

#sidebar ul li {
    padding: 12px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

#sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
    font-size: 16px;
    padding: 10px;
    transition: all 0.3s;
}

#sidebar ul li a:hover,
.active {
    background: rgba(255, 255, 255, 0.2);
    border-left: 4px solid #ffcc00;
    padding-left: 16px;
}

/* Logout Button */
.logout-btn {
    background: #dc3545;
    text-align: center;
    font-weight: bold;
}

.logout-btn:hover {
    background: #c82333;
}
</style>