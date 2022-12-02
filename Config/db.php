<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "my_movie";

$conn = mysqli_connect("$host", "$user", "$pass", "$db");

if (mysqli_connect_errno()) {
    echo "koneksi gagal" . mysqli_connect_error();
}
