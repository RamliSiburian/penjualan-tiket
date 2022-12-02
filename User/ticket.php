<?php
require "../Config/db.php";

if (isset($_GET['id_buyer'])) {
    $id_buyer = $_GET['id_buyer'];
    $getMovie = mysqli_query($conn, "SELECT * FROM ticketsell WHERE id_buyer='$id_buyer' ");
    $result = mysqli_fetch_assoc($getMovie);
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Tiket</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="ticket d-flex justify-content-center align-items-center">
        <div class="card" style="width: 25rem;">
            <div class=" card-body">
                <h5 class="card-title">Tiket Konser <?= $result['title']; ?></h5>
                <hr class="m-0">
                <table class="table">
                    <tr>
                        <th>Id Tiket</th>
                        <td>: <?= $result['id_buyer']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>: <?= $result['name']; ?></td>
                    </tr>
                    <tr>
                        <th>Jadwal Konser</th>
                        <td>: <?= $result['schedule']; ?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>: Rp. <?= $result['price']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        window.print()
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>