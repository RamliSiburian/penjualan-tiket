<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="add-film">
        <div class="container">
            <div class="back mt-5">
                <a href="admin.php">Kembali</a>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group ,b-3">
                    <label for="image" class="form-label fw-bold"> image </label>
                    <input type="file" name="image" id="image" class="form-control" placeholder="username">
                </div>
                <div class="form-group mb-3">
                    <label for="title" class="form-label fw-bold"> Judul Film </label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="judul">
                </div>

                <div class="for-group mb-3">
                    <label for="description" class="form-label fw-bold"> Deskripsi </label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="deskripsi">
                </div>

                <div class="form-group mb-3">
                    <label for="start" class="form-label fw-bold"> Jam Muali </label>
                    <input type="time" name="start" id="start" class="form-control" placeholder="jam mulai">
                </div>

                <div class="form-group mb-3">
                    <label for="end" class="form-label fw-bold"> Jam Selesai </label>
                    <input type="time" name="end" id="end" class="form-control" placeholder="jam selesai">
                </div>

                <div class="form-group mb-3">
                    <label for="price" class="form-label fw-bold"> Harga </label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="harga">
                </div>

                <button type="submit" name="simpan">Simpan</button>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
require "../Config/db.php";

if (isset($_POST["simpan"])) {
    // $image = $_POST['image'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $price = $_POST['price'];

    $file = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];

    $directory = '../uploads/';
    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $image = rand(1000, 1000000) . "." . $extension;

    $getMovie = mysqli_query($conn, "SELECT * FROM movies WHERE title='$title' and start='$start' ");

    $result = mysqli_fetch_assoc($getMovie);

    if ($result['title'] != $title  && $result['start'] != $start) {
        move_uploaded_file($tmp_dir, $directory . $image);
        $simpan = mysqli_query($conn, "INSERT INTO movies VALUES('', '$title', '$image', '$description', '$start', '$end', '$price' )");
        if ($simpan) {
?>
            <script>
                alert("Entri film berhasil dibuat")
                window.location = "admin.php"
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert("Entri film sudah ada, silahkan buat jadwal lain")
            window.location = "admin.php"
        </script>
<?php
    }
}
?>