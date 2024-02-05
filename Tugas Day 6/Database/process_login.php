<?php
session_start();
include 'koneksi.php';

// Ambil data dari formulir
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Query untuk memeriksa login
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND userID = 1";
$result = $conn->query($query);

// Jika login berhasil, atur sesi
if ($result->num_rows == 1) {
    $_SESSION['username'] = $username;
    header("Location: admin_dashboard.php");
} else {
    echo '<script>';
    echo 'alert("Login gagal! Anda bukan admin.");';
    echo 'window.location.href = "login.php";';
    echo '</script>';
}

// Tutup koneksi
$conn->close();
?>
