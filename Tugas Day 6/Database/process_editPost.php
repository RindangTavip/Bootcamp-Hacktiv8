<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil data dari formulir edit
$postID = (int)$_POST['postID'];
$judul = mysqli_real_escape_string($conn, $_POST['judul']);
$konten = mysqli_real_escape_string($conn, $_POST['konten']);
$kategori = mysqli_real_escape_string($conn, $_POST['kategori']);

// Cek apakah gambar baru diunggah
if (!empty($_FILES['gambar']['name'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

    if (file_exists($oldImage)) {
        unlink($oldImage);
    }

    // Unggah gambar baru
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    // Update kolom gambar di database
    $updateImageQuery = "UPDATE posts SET gambar = '$target_file' WHERE postID = $postID";
    $conn->query($updateImageQuery);
}

// Query untuk menyimpan perubahan ke database
$updateQuery = "UPDATE posts SET judul = '$judul', konten = '$konten', kategoriID = '$kategori' WHERE postID = $postID";
mysqli_query($conn, $updateQuery);

header("location:admin_dashboard.php");
?>
