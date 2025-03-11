<?php
include 'db_connect.php';
session_start();

$id = $_GET['id'];
$query = "DELETE FROM products WHERE id=$id";
$conn->query($query);
header("Location: admin.php");
?>
