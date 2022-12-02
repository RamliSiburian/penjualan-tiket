<?php
require "../Config/db.php";

if (isset($_GET['id_buyer'])) {
    $id_buyer = $_GET['id_buyer'];

    $newstatus = "sudah check-in";

    $update = mysqli_query($conn, "UPDATE ticketsell SET status='$newstatus' WHERE id_buyer='$id_buyer' ");
    if ($update) {
?>
        <script>    
            alert("Check-In berhasil")
            window.location = "./checkin.php"
        </script>
<?php
    }
}
