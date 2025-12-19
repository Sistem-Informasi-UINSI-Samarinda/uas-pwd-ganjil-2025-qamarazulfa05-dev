<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include "../../config/koneksi.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM inventory_obat WHERE id_obat='$id'");

echo "<script>
        alert('Data obat berhasil dihapus 💔');
        window.location.href='dataobat.php';
      </script>";
