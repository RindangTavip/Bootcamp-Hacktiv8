<?php
include 'koneksi.php';

// Ambil data dari formulir
$komentar = $_POST['komentar'];

// Query untuk menyimpan posting blog ke dalam database
$query = "INSERT INTO komentar (isiKomentar) VALUES ('$komentar')";
mysqli_query($conn, $query);

header("location:admin_dashboard.php");
?>