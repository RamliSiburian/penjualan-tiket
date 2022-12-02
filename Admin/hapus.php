<?php
require "../Config/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = mysqli_query($conn, "DELETE FROM movies WHERE id='$id' ");

    if ($delete) {
?>
        <script>
            alert("data berhasil dihapus")
            window.location = "./admin.php"
        </script>
<?php
    }
}
