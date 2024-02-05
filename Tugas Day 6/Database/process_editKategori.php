<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil data dari formulir edit
$kategoriID = (int)$_POST['kategoriID'];
$kategoriName = mysqli_real_escape_string($conn, $_POST['kategoriName']);

// Query untuk menyimpan perubahan ke database
$updateQuery = "UPDATE kategori SET kategoriName = '$kategoriName' WHERE kategoriID = $kategoriID";
mysqli_query($conn, $updateQuery);

header("location:admin_dashboard.php");
?>
