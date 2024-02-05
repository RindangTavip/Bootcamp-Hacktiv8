<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil data dari formulir edit
$userID = (int)$_POST['userID'];
$username = mysqli_real_escape_string($conn, $_POST['username']);

// Query untuk menyimpan perubahan ke database
$updateQuery = "UPDATE users SET username = '$username' WHERE userID = $userID";
mysqli_query($conn, $updateQuery);

header("location:admin_dashboard.php");
?>
