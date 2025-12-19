<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include "../../config/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM inventory_obat WHERE id_obat='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $kode   = $_POST['kode_obat'];
    $nama   = $_POST['nama_obat'];
    $stok   = $_POST['stock_obat'];
    $harga  = $_POST['harga_obat'];
    $exp    = $_POST['expired'];

    $update = mysqli_query($conn, "UPDATE inventory_obat SET
        kode_obat='$kode',
        nama_obat='$nama',
        stock_obat='$stok',
        harga_obat='$harga',
        expired='$exp'
        WHERE id_obat='$id'
    ");

    if ($update) {
        echo "<script>
                alert('Data obat berhasil diperbarui 💖');
                window.location.href='dataobat.php';
              </script>";
    } else {
        echo "<script>alert('Gagal memperbarui data 😢');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat | Apotek Pinky</title>
    <link rel="stylesheet" href="../../assets/CSS/style.css">
</head>
<body>
    
<div class="sidebar">
    <h2>💊 Apotek Pinky</h2>
    <ul>
        <li><a href="dashboard.php">🏠 Dashboard</a></li>
        <li><a href="dataobat.php">📦 Data Obat</a></li>
        <li><a href="tambahobat.php">➕ Tambah Obat</a></li>
        <li><a href="logout.php" class="logout">🚪 Logout</a></li>
    </ul>
</div>

<div class="main">
    <header>
        <h1>✏️ Edit Obat</h1>
        <p>Perbarui data obat dengan benar 🌸</p>
    </header>

    <div class="form-box">
        <form method="POST">
            <input type="text" name="kode_obat" value="<?= $data['kode_obat']; ?>" required>
            <input type="text" name="nama_obat" value="<?= $data['nama_obat']; ?>" required>
            <input type="number" name="stock_obat" value="<?= $data['stock_obat']; ?>" required>
            <input type="number" name="harga_obat" value="<?= $data['harga_obat']; ?>" required>
            <input type="date" name="expired" value="<?= $data['expired']; ?>" required>

            <button type="submit" name="update">💾 Update</button>
            <a href="dataobat.php" class="btn-back">↩️ Kembali</a>
        </form>
    </div>
</div>

</body>
</html>
