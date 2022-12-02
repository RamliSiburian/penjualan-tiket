<?php
require "../Config/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $getMovie = mysqli_query($conn, "SELECT * FROM movies WHERE id='$id' ");
    $result = mysqli_fetch_assoc($getMovie);
    $randomid = random_int(1000, 99999);
    $id_buyer = $randomid . "_" . $result['title'];
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Ticket</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="order">
        <div class="header">
            <div class="container">
                <div class="head ">
                    <p class="fs-1 fw-bold text">MY KONSER</p>

                </div>
            </div>
        </div>


        <div class="container d-flex justify-content-center">
            <form action="" method="post" class="w-50 mb-5">
                <div class="head d-flex gap-3 align-items-center">
                    <a href="../index.php" class="fs-4 text-danger fw-bold">Kembali </a>
                    <p class="fs-2 fw-bold m-0"> Form Order Tiket</p>
                </div>
                <hr class="m-0 mb-4">
                <div class="form-group mb-3">
                    <label for="name" class="form-label fw-bold"> Nama </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="nama">
                </div>
                <div class="form-group mb-3">
                    <label for="address" class="form-label fw-bold"> Aalamat </label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="alamat">
                </div>
                <div class="form-group mb-3">
                    <label for="title" class="form-label fw-bold"> Judul Konser </label>
                    <input type="text" name="title" id="title" class="form-control" value="<?= $result['title'];  ?>" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="schedule" class="form-label fw-bold"> Jadwal </label>
                    <input type="text" name="schedule" id="schedule" class="form-control" value="<?= $result['start'] . " - " . $result['end'] ?>" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="price" class="form-label fw-bold"> Harga Ticket </label>
                    <input type="text" name="price" id="price" class="form-control" value="<?= $result['price']  ?>" disabled>
                </div>

                <div class="beli d-flex justify-content-end">
                    <button type="submit" name="beli" class="btn btn-primary fw-bold" style="width: 150px;"> Beli</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST['beli'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $title = $result['title'];
    $schedule = $result['start'] . " - " . $result['end'];
    $price = $result['price'];
    $status = "belum check-in";

    $getTicket = mysqli_query($conn, "SELECT * FROM ticketsell WHERE name='$name' && title='$title' && schedule='$schedule' ");
    $tickets = mysqli_num_rows($getTicket);

    if ($tickets > 0) {
?>
        <script>
            alert("Anda telah membeli tiket yang dengan jadwal yang sama")
        </script>
        <?php
    } else {
        $beli = mysqli_query($conn, "INSERT INTO ticketsell VALUES('', '$id_buyer', '$name', '$address', '$title', '$schedule', '$price', '$status' ) ");
        if ($beli) {
        ?>
            <script>
                alert("Anda berhasil membeli tiket");
                window.location = "./ticket.php?id_buyer=<?= $id_buyer; ?> ";
            </script>
<?php
        }
    }
}


?>