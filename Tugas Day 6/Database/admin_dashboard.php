<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Query untuk mengambil daftar posting
$query = "SELECT * FROM posts";
$result = $conn->query($query);

$query2= "SELECT * FROM kategori";
$result2 = $conn->query($query2);

$query3= "SELECT * FROM users WHERE NOT userID = 1";
$result3 = $conn->query($query3);

$query4= "SELECT * FROM komentar INNER JOIN users ON komentar.userID = users.userID";
$result4 = $conn->query($query4);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>

<h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>
<p><a href="logout.php">Logout</a></p><br>

<h3>Manajemen Posting</h3>

<table border="1">
    <tr>
        <th>Judul</th>
        <th>Isi Posting</th>
        <th>Kategori</th>
        <th>Gambar Utama</th>
        <th>Tindakan</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['judul']}</td>";
        echo "<td>{$row['konten']}</td>";
        echo "<td>{$row['kategoriID']}</td>";
        echo "<td>{$row['gambar']}</td>";
        echo "<td>
                 <a href='edit_post.php?id={$row['postID']}'>Edit</a> | 
                 <a href='delete_post.php?id={$row['postID']}' onclick='confirmDeletePost()'>Hapus</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

<p><a href="add_posting.php">Tambah Posting Baru</a></p><br>

<h3>Manajemen Kategori</h3>

<table border="1">
    <tr>
        <th>ID Kategori</th>
        <th>Nama Kategori</th>
        <th>Tindakan</th>
    </tr>
    <?php
    while ($row = $result2->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['kategoriID']}</td>";
        echo "<td>{$row['kategoriName']}</td>";
        echo "<td>
                 <a href='edit_kategori.php?id={$row['kategoriID']}'>Edit</a> | 
                 <a href='delete_kategori.php?id={$row['kategoriID']}' onclick='confirmDeleteKategori()'>Hapus</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

<p><a href="add_kategori.php">Tambah Kategori Baru</a></p><br>

<h3>Manajemen Pengguna</h3>

<table border="1">
    <tr>
        <th>ID Pengguna</th>
        <th>Username</th>
        <th>Tindakan</th>
    </tr>
    <?php
    while ($row = $result3->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['userID']}</td>";
        echo "<td>{$row['username']}</td>";
        echo "<td>
                 <a href='edit_pengguna.php?id={$row['userID']}'>Edit</a> | 
                 <a href='delete_pengguna.php?id={$row['userID']}' onclick='confirmDeletePengguna()'>Hapus</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

<p><a href="add_pengguna.php">Tambah Pengguna Baru</a></p><br>

<h3>Manajemen Komentar</h3>

<table border="1">
    <tr>
        <th>ID Komentar</th>
        <th>ID Posting</th>
        <th>Username</th>
        <th>Komentar</th>
        <th>Tindakan</th>
    </tr>
    <?php
    while ($row = $result4->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['komentarID']}</td>";
        echo "<td>{$row['postID']}</td>";
        echo "<td>{$row['username']}</td>";
        echo "<td>{$row['isiKomentar']}</td>";
        echo "<td> 
                 <a href='delete_komentar.php?id={$row['komentarID']}' onclick='confirmDeleteKomentar()'>Hapus</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

<script>
    function confirmDeletePost(postID) {
        var result = confirm("Apakah Anda yakin ingin menghapus posting ini?");
        if (result) {
            window.location.href = 'delete_post.php?id=' + postID;
        }
    }

    function confirmDeleteKategori(kategoriID) {
        var result = confirm("Apakah Anda yakin ingin menghapus kategori ini?");
        if (result) {
            window.location.href = 'delete_kategori.php?id=' + kategoriID;
        }
    }

    function confirmDeletePengguna(userID) {
        var result = confirm("Apakah Anda yakin ingin menghapus pengguna ini?");
        if (result) {
            window.location.href = 'delete_pengguna.php?id=' + useriID;
        }
    }

    function confirmDeleteKomentar(komentarID) {
        var result = confirm("Apakah Anda yakin ingin menghapus komentar ini?");
        if (result) {
            window.location.href = 'delete_komentar.php?id=' + komentarID;
        }
    }
</script>
</body>
</html>