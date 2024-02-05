<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$query ="SELECT * FROM kategori";
$result = $conn->query($query);
if($result->num_rows> 0){
    $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Penambahan Posting Blog</title>
</head>
<body>

<h2>Tambah Posting Baru</h2>

<form action="process_inputPost.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <label for="judul">Judul:</label>
    <input type="text" id="judul" name="judul" required><br>

    <label for="konten">Isi Posting:</label>
    <textarea id="konten" name="konten" rows="4" required></textarea><br>

    <label for="kategori">Kategori:</label>
    <select id="kategori" name="kategori" required>
        <?php 
        foreach ($options as $option) {
        ?>
        <option value="<?php echo $option['kategoriID'];?>"><?php echo $option['kategoriName'];?></option>
        <?php
        }
        ?>
    </select><br>

    <label for="gambar">Gambar Utama:</label>
    <input type="file" id="gambar" name="gambar" accept="image/*" required><br>

    <button type="submit">Tambah Posting</button>
    <p><a href="admin_dashboard.php">Kembali</a></p><br>
</form>
<script>
    function validateForm() {
        var judul = document.getElementById('judul').value;
        var konten = document.getElementById('konten').value;
        var kategori = document.getElementById('kategori').value;
        var gambar = document.getElementById('gambar').value;

        if (judul === "" || konten === "" || kategori === "" || gambar === "") {
            alert("Semua kolom harus diisi");
            return false;
        }
        return true;
    }
</script>
</body>
</html>