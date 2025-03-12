<h2 class="text-center">Manage Products</h2>
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">+ Add Product</button>

<div class="row">
    <?php
    $products = $conn->query("SELECT * FROM products");
    while ($product = $products->fetch_assoc()) { ?>
        <div class="col-md-4">
            <div class="card">
                <img src="<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $product['name'] ?></h5>
                    <p class="card-text price">$<?= $product['price'] ?></p>
                    <a href="edit_product.php?id=<?= $product['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_product.php?id=<?= $product['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
