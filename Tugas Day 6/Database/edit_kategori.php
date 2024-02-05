<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil ID posting dari parameter URL
$kategoriID = (int)$_GET['id'];

// Query untuk mengambil data posting berdasarkan ID
$query = "SELECT * FROM kategori WHERE kategoriID = $kategoriID";
$result = $conn->query($query);

// Periksa apakah posting ditemukan
if ($result->num_rows == 0) {
    echo "Posting tidak ditemukan.";
    exit();
}

// Ambil data posting
$post = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
</head>
<body>

<h2>Edit Kategori</h2>

<form action="process_editKategori.php" method="post"  enctype="multipart/form-data">
    <input type="hidden" name="kategoriID" value="<?php echo $kategoriID; ?>">

    <label for="kategoriName">Nama Kategori:</label>
    <input type="text" id="kategoriName" name="kategoriName" value="<?php echo $post['kategoriName']; ?>" required><br>

    <button type="submit">Simpan Perubahan</button>
    <p><a href="admin_dashboard.php">Kembali</a></p><br>
</form>

</body>
</html>
