<?php
include 'koneksi.php';

// Ambil data dari formulir
$username = $_POST['username'];

// Query untuk menyimpan posting blog ke dalam database
$query = "INSERT INTO users (username) VALUES ('$username')";
mysqli_query($conn, $query);

header("location:admin_dashboard.php");
?>