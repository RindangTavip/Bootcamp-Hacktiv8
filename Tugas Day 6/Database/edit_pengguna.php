<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$userID = (int)$_GET['id'];

$query = "SELECT * FROM users WHERE userID = $userID";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    echo "Posting tidak ditemukan.";
    exit();
}

$post = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
</head>
<body>

<h2>Edit Pengguna</h2>

<form action="process_editPengguna.php" method="post"  enctype="multipart/form-data">
    <input type="hidden" name="userID" value="<?php echo $userID; ?>">

    <label for="username">Nama Kategori:</label>
    <input type="text" id="username" name="username" value="<?php echo $post['username']; ?>" required><br>

    <button type="submit">Simpan Perubahan</button>
    <p><a href="admin_dashboard.php">Kembali</a></p><br>
</form>

</body>
</html>
