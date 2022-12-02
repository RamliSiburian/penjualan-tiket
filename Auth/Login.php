<?php
require "../Config/db.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Movie</title>
    <link rel="stylesheet" href="../Style//style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="login">
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


        <div class="container  d-flex justify-content-center mt-5">
            <form action="" method="post" class="w-50">
                <p class="fs-1 fw-bold">Form Login</p>
                <div class="form-group">
                    <label for="username" class="form-label fw-bold"> Username </label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="username">
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="form-label fw-bold"> Password </label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password">
                </div>

                <div class="login d-flex justify-content-end">
                    <button type="submit" name="login" class="btn btn-primary mt-3 text-black fw-bold" style="width:150px ;">Login</button>
                </div>

                <div class="info bg-info mt-5 p-1 rounded">
                    username : admin
                    <br>
                    password : admin
                </div>
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