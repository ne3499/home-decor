<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .card:hover {
            transform: scale(1.05);
            transition: 0.3s ease-in-out;
        }
    </style>
</head>
<body>

    <div class="container my-5">
        <h2 class="text-center mb-4">Featured Furniture</h2>
        <div class="row">
            
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card shadow">
                    <img src="chair.jpg" class="card-img-top" alt="Chair">
                    <div class="card-body text-center">
                        <h5 class="card-title">Elegant Chair</h5>
                        <p class="card-text">Comfortable and stylish wooden chair.</p>
                        <p class="fw-bold">$120</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card shadow">
                    <img src="sofa.jpg" class="card-img-top" alt="Sofa">
                    <div class="card-body text-center">
                        <h5 class="card-title">Luxury Sofa</h5>
                        <p class="card-text">Spacious and cozy sofa for your living room.</p>
                        <p class="fw-bold">$550</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card shadow">
                    <img src="table.jpg" class="card-img-top" alt="Table">
                    <div class="card-body text-center">
                        <h5 class="card-title">Modern Table</h5>
                        <p class="card-text">Sleek and durable table for your home.</p>
                        <p class="fw-bold">$200</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
