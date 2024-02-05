<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Penambahan Pengguna Blog</title>
</head>
<body>

<h2>Tambah Pengguna Baru</h2>

<form action="process_addPengguna.php" method="post" enctype="multipart/form-data">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label>
    <input type="text" id="password" name="password" required><br>

    <button type="submit">Tambah Pengguna</button>
    <p><a href="admin_dashboard.php">Kembali</a></p><br>
</form>
</body>
</html>