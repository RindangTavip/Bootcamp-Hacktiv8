<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$userID = (int)$_GET['id'];

$deleteQuery = "DELETE FROM users WHERE userID = $userID";

if ($conn->query($deleteQuery) === TRUE) {
    header("Location: admin_dashboard.php");
} else {
    echo "Error: " . $deleteQuery . "<br>" . $conn->error;
}

$conn->close();