<?php
    include 'koneksi.php';
    
    $nama = $_POST['nama'];
    $role = $_POST['role'];
    $availability = $_POST['availability'];
    $age = $_POST['age'];
    $lokasi = $_POST['lokasi'];
    $pengalaman = $_POST['pengalaman'];
    $email = $_POST['email'];

    $query="INSERT INTO portfolio SET nama='$nama', role='$role', availability='$availability', age='$age', lokasi='$lokasi', pengalaman='$pengalaman', email='$email'";
    mysqli_query($conn, $query);

    header("location:index.html");
?>