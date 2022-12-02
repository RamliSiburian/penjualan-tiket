<?php
require "../Config/db.php";

$getOrder = mysqli_query($conn, "SELECT * FROM ticketsell");
$no = 1;

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Check In</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="oreder-ticket">
        <div class="header">
            <div class="container">
                <div class="head d-flex justify-content-between align-items-center">
                    <h1>MY KONSER</h1>
                    <div class="login">
                        <a class="btn btn-primary" href="../index.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <p class="fs-2 fw-bold mt-3">Halaman Check-In Tiket</p>
            <hr>
            <table class="table table-striped table-hover table-primary">
                <tr>
                    <th>No</th>
                    <th>Id Tiket</th>
                    <th>Nama</th>
                    <th>jadwal Konser</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
                <?php foreach ($getOrder as $order) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $order['id_buyer']; ?></td>
                        <td><?= $order['name']; ?></td>
                        <td><?= $order['schedule']; ?></td>
                        <?php if ($order['status'] == "belum check-in") : ?>
                            <td class="text-danger"><?= $order['status']; ?></td>
                        <?php elseif ($order['status'] == "sudah check-in") :  ?>
                            <td class="text-success"><?= $order['status']; ?></td>
                        <?php endif; ?>
                        <?php if ($order['status'] == "belum check-in") : ?>
                            <td class="text-center"><a href="edit_checkin.php?id_buyer=<?= $order['id_buyer']; ?>" class="btn btn-success text-white">Check-in</a></td>
                        <?php elseif ($order['status'] == "sudah check-in") :  ?>
                            <td></td>
                        <?php endif; ?>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>