<?php
session_start();
include 'db_connect.php';

$search_query = "";
$results = [];

// If the search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['query'])) {
    $search_query = trim($_GET['query']);

    // SQL Query with Prepared Statements
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ? OR category LIKE ?");
    $search_term = "%" . $search_query . "%";
    $stmt->bind_param("ss", $search_term, $search_term);
    $stmt->execute();
    $results = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Home Decor</title>
    <link rel="stylesheet" href="search.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<style>
    /* General Styles */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 0;
}

/* Search Container */
.search-container {
    text-align: center;
    padding: 40px;
}

/* Search Bar */
.search-bar {
    margin: 20px auto;
    width: 50%;
    display: flex;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.search-bar input {
    flex: 1;
    padding: 12px;
    border: 1px solid #ccc;
    font-size: 16px;
    outline: none;
}

.search-bar button {
    padding: 12px 20px;
    background: #ff6600;
    border: none;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

.search-bar button:hover {
    background: #e65c00;
}

/* Search Results */
.search-results {
    padding: 20px;
    text-align: center;
}

/* Product Grid */
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    justify-content: center;
    padding: 20px;
}

/* Product Card */
.product-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 15px;
    transition: 0.3s;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
}

.product-card img {
    max-width: 100%;
    height: 200px;
    border-radius: 10px;
    object-fit: cover;
}

/* Product Info */
.product-info {
    padding: 10px;
}

.product-info h3 {
    margin: 10px 0;
    font-size: 20px;
    font-weight: 500;
}

.product-info .price {
    font-size: 18px;
    font-weight: 600;
    color: #27ae60;
}

/* Add to Cart Button */
.add-to-cart {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 15px;
    background: #ff6600;
    color: white;
    text-decoration: none;
    font-weight: 500;
    border-radius: 6px;
    transition: 0.3s;
}

.add-to-cart:hover {
    background: #e65c00;
}

/* No Results */
.no-results {
    font-size: 18px;
    color: #777;
    margin-top: 20px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .search-bar {
        width: 80%;
    }

    .product-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }
}

</style>
<body>
    
    <section class="search-container">
        

        <form action="search.php" method="GET" class="search-bar">
            <input type="text" name="query" placeholder="Search for products..." value="<?php echo htmlspecialchars($search_query); ?>" required>
            <button type="submit">Search</button>
        </form>

        <div class="search-results">
            <?php if ($results->num_rows > 0): ?>
                <div class="product-grid">
                    <?php while ($row = $results->fetch_assoc()): ?>
                        <div class="product-card">
                            <img src="<?php echo !empty($row['image']) ? $row['image'] : 'default.jpg'; ?>" alt="<?php echo $row['name']; ?>">
                            <div class="product-info">
                                <h3><?php echo $row['name']; ?></h3>
                                <p class="price">₹<?php echo number_format($row['price'], 2); ?></p>
                                <a href="cart.php?add=<?php echo $row['id']; ?>" class="add-to-cart">Add to Cart</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p class="no-results">No results found for "<?php echo htmlspecialchars($search_query); ?>"</p>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>
