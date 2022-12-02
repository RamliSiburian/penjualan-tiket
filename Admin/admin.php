<?php
require "../Config/db.php";

$films = mysqli_query($conn, "SELECT * FROM movies");
$no = 1;

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="home">
        <div class="header bg-info">
            <div class="container">
                <div class="head d-flex justify-content-between align-items-center">
                    <h1>MY MOVIE</h1>
                    <div class="login">
                        <a href="#" class="me-3">Check-In</a>
                        <a class="btn btn-primary" href="../index.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="container">
                <div class="head d-flex mt-5 justify-content-between">
                    <a href="add_film.php" class="btn btn-primary">Tambah Film</a>
                    <div class="searc">
                        <input type="text" name="search" id="search" class="form-control" placeholder="search movie...">
                    </div>
                </div>
                <hr>
                <table class="table table-bordered table-hover table-striped mt-3">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>jam Mulai</th>
                        <th>Jam selesai</th>
                        <th>harga</th>
                        <th colspan="2">Opsi</th>
                    </tr>
                    <?php foreach ($films as $film) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><img src="../uploads/<?php echo $film['image']; ?>" width="60" height="80"></td>
                            <td><?= $film['title']; ?></td>
                            <td><?= $film['description']; ?></td>
                            <td><?= $film['start']; ?></td>
                            <td><?= $film['end']; ?></td>
                            <td><?= $film['price']; ?></td>
                            <td>edit</td>
                            <td>hapus</td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
</body>

</html>