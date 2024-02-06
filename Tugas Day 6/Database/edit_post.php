<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil ID posting dari parameter URL
$postID = (int)$_GET['id'];

// Query untuk mengambil data posting berdasarkan ID
$query = "SELECT * FROM posts INNER JOIN kategori ON posts.kategoriID = kategori.kategoriID WHERE postID = $postID";
$result = $conn->query($query);

$query2 ="SELECT * FROM kategori";
$result2 = $conn->query($query2);
if($result2->num_rows > 0){
    $options= mysqli_fetch_all($result2, MYSQLI_ASSOC);
}

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
    <title>Edit Posting</title>
</head>
<body>

<h2>Edit Posting</h2>

<form action="process_editPost.php" method="post" enctype="multipart/form-data" >
    <input type="hidden" name="postID" value="<?php echo $postID; ?>">
    <label for="judul">Judul:</label>
    <input type="text" id="judul" name="judul" value="<?php echo $post['judul']; ?>" required><br>

    <label for="konten">Isi Posting:</label>
    <textarea id="konten" name="konten" rows="4" required><?php echo $post['konten']; ?></textarea><br>

    <label for="kategori">Kategori:</label>
    <select id="kategori" name="kategori" required>
        <option value="<?php echo $post['kategoriID']; ?>"><?php echo $post['kategoriName']; ?></option>
        <?php 
        foreach ($options as $option) {
        ?>
        <option value="<?php echo $option['kategoriID'];?>"><?php echo $option['kategoriName'];?></option>
        <?php
        }
        ?>
    </select><br>

    <label for="gambar">Gambar Utama:</label>
    <input type="file" id="gambar" name="gambar" accept="image/*" value="<?php echo $post['gambar']; ?>"><br>

    <button type="submit">Simpan Perubahan</button>
    <p><a href="admin_dashboard.php">Kembali</a></p><br>
</form>

</body>
</html>
