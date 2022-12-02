<?php
require "../Config/db.php";
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
    <div class="login">
        <div class="container">
            <form action="" method="post">
                <div class="form-group">
                    <label for="username" class="form-label fw-bold"> Username </label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="username">
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="form-label fw-bold"> Password </label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password">
                </div>

                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
</body>

</html>

<?php
if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $getUser = mysqli_query($conn, "SELECT * FROM users  WHERE username='$username'");
    $userResult = mysqli_num_rows($getUser);

    if ($userResult > 0) {
        $user = mysqli_fetch_assoc($getUser);

        if ($user['username'] == $username && $user['password'] == $password) {
            $_SESSION['username'] = $username;
            $_SESSION["mhs"] = true;
            header("location:../Admin/admin.php");
        } else {
            echo "user atau pass salah";
        }
    } else {
        echo "user belum terdaftar";
    }
}

?>