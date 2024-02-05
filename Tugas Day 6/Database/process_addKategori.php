<?php
include 'koneksi.php';

// Ambil data dari formulir
$kategoriName = $_POST['kategoriName'];

// Query untuk menyimpan posting blog ke dalam database
$query = "INSERT INTO kategori (kategoriName) VALUES ('$kategoriName')";
mysqli_query($conn, $query);

header("location:admin_dashboard.php");
?>
