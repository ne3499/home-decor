<?php
include 'db_connect.php'; // Include database connection
include 'sidebar.php';

// Fetch current settings
$query = "SELECT * FROM settings LIMIT 1";
$result = $conn->query($query);
$settings = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $site_name = $_POST['site_name'];
    $admin_email = $_POST['admin_email'];
    $contact_number = $_POST['contact_number'];

    // Update settings in the database
    $update_query = "UPDATE settings SET site_name=?, admin_email=?, contact_number=? WHERE id=1";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sss", $site_name, $admin_email, $contact_number);
    
    if ($stmt->execute()) {
        $success = "Settings updated successfully!";
    } else {
        $error = "Failed to update settings.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Settings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .main-content {
            margin-left: 270px;
            padding: 40px;
        }

        .settings-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-control {
            font-size: 14px;
        }

        .btn-save {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            padding: 10px 15px;
            border: none;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 120px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="main-content">
    <h2 class="text-center mb-4">Website Settings</h2>

    <div class="settings-container">
        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php elseif (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="site_name" class="form-label">Site Name</label>
                <input type="text" class="form-control" id="site_name" name="site_name" 
                       value="<?php echo htmlspecialchars($settings['site_name'] ?? ''); ?>" required>
            </div>

            <div class="mb-3">
                <label for="admin_email" class="form-label">Admin Email</label>
                <input type="email" class="form-control" id="admin_email" name="admin_email" 
                       value="<?php echo htmlspecialchars($settings['admin_email'] ?? ''); ?>" required>
            </div>

            <div class="mb-3">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" 
                       value="<?php echo htmlspecialchars($settings['contact_number'] ?? ''); ?>" required>
            </div>

            
        </form>
    </div>
</div>

</body>
</html>
