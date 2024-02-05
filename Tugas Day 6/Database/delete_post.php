<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil ID posting dari parameter URL
$postID = (int)$_GET['id'];

// Query untuk menghapus posting berdasarkan ID
$deleteQuery = "DELETE FROM posts WHERE postID = $postID";

if ($conn->query($deleteQuery) === TRUE) {
    header("Location: admin_dashboard.php");
} else {
    echo "Error: " . $deleteQuery . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();