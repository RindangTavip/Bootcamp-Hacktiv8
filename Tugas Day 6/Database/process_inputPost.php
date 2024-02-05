<?php
include 'koneksi.php';

// Ambil data dari formulir
$judul = $_POST['judul'];
$konten = $_POST['konten'];
$kategori = $_POST['kategori'];

// Unggah gambar
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

// Query untuk menyimpan posting blog ke dalam database
$query = "INSERT INTO posts (judul, konten, gambar, kategoriID) VALUES ('$judul', '$konten', '$target_file', '$kategori')";
mysqli_query($conn, $query);

header("location:admin_dashboard.php");
?>
