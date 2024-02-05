<?php
include 'koneksi.php';

// Query untuk mengambil daftar posting terbaru
$query = "SELECT * FROM posts INNER JOIN kategori ON posts.kategoriID = kategori.kategoriID ORDER BY postID DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog Rindang Tavip Supriyanto</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body style="background: rgb(243, 243, 243)">
        <div id="header">
            <nav class="navbar navbar-expand-sm navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link active" aria-current="page" href="#">HOME</a>
                            <a class="nav-link active" href="login.php">DASHBOARD</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container">
            <h1>Selamat datang di Blog Saya</h1>
        </div>

        <div class="container">
        <?php
        while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
            echo "<div class='card__header'>";
            echo "<img src='{$row['gambar']}' class='card__image' width='600'>";
            echo "</div>";
            echo "<div class='card__body'>";
            echo "<span class='tag tag-blue'>{$row['kategoriName']}</span>";
            echo "<h4>{$row['judul']}</h4>";
            echo "<p>{$row['konten']}</p>";
            echo "</div>";
            echo "<div class='card__footer'>";
            echo "<div class='user'>";
            echo "<div class='user__info'>";
            echo "<h5>Admin</h5>";
            echo "<small>2h ago</small>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
        </div>

        <div class="container">
            <br>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>