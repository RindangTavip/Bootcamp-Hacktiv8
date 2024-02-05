<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Penambahan Kategori Blog</title>
</head>
<body>

<h2>Tambah Kategori Baru</h2>

<form action="process_addKategori.php" method="post" enctype="multipart/form-data">
    <label for="kategoriName">Nama Kategori:</label>
    <input type="text" id="kategoriName" name="kategoriName" required><br>

    <button type="submit">Tambah Kategori</button>
    <p><a href="admin_dashboard.php">Kembali</a></p><br>
</form>
</body>
</html>