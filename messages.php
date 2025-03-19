<?php
session_start();
include 'db_connect.php';


// Check if admin is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login as admin!'); window.location='login.php';</script>";
    exit();
}

// Fetch messages from users
$query = "SELECT m.id, u.name AS sender, m.message, m.created_at 
          FROM messages m
          JOIN users u ON m.sender_id = u.id
          ORDER BY m.created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Messages</title>
    
</head>
<style>
    /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

/* Container */
.container {
    margin-left: 270px; /* To adjust for sidebar */
    padding: 20px;
}

h2 {
    text-align: center;
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

/* Messages Table */
table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background: #007bff;
    color: white;
    font-size: 16px;
}

td {
    color: #333;
    font-size: 14px;
}

/* Hover effect */
tr:hover {
    background-color: #f1f1f1;
    transition: 0.3s;
}

/* Responsive Table */
@media (max-width: 768px) {
    .container {
        margin-left: 0;
        padding: 10px;
    }
    
    table {
        width: 100%;
    }
    
    th, td {
        font-size: 14px;
        padding: 8px;
    }

}
.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.btn-danger:hover {
    background-color: #c82333;
}


</style>
<body>

<div class="wrapper">
    <?php include("sidebar.php");?>
     <!-- Include Sidebar -->

    <div id="content">
        <div class="container mt-4">
            <h2 class="text-center">📩 User Messages</h2>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                    
                        <th>Sender</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        
                        <td><?= $row['sender']; ?></td>
                        <td><?= $row['message']; ?></td>
                        <td><?= date("d M Y, H:i", strtotime($row['created_at'])); ?></td>
                        <td>
            <form action="delete_messages.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                <input type="hidden" name="message_id" value="<?= $row['id']; ?>">
                <button type="submit" class="btn btn-danger">🗑 Delete</button>
            </form>
        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
