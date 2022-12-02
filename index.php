<?php
require "./Config/db.php";

$getMovie = mysqli_query($conn, "SELECT * FROM movies");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Konser</title>
    <link rel="stylesheet" href="./Style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="home">
        <div class="header">
            <div class="container">
                <div class="head d-flex justify-content-between align-items-center">
                    <p class="fs-1 fw-bold text">MY KONSER</p>
                    <div class="login">
                        <a class="btnlogin fw-bold" href="./Auth/Login.php">Login</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="container">
                <p class="fs-1 fw-bold mt-3">List Korser</p>
                <hr>
                <div class="movies d-flex mt-5 gap-5">
                    <?php foreach ($getMovie as $movie) : ?>
                        <div class="card" style="width: 16rem;">
                            <img src="./uploads/<?php echo $movie['image']; ?>" height="150" class=" card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= $movie['title']; ?></h5>
                                <div class="order d-flex justify-content-between">
                                    <p><?= $movie['start'] . " - " . $movie['end']; ?></p>
                                    <p>Rp. <?= $movie['price']; ?></p>
                                </div>
                                <p class="card-text"><?= $movie['description']; ?></p>
                                <a href="./User/order.php?id=<?= $movie['id']; ?>" class="btn btn-primary w-100">Beli</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
</body>

</html>