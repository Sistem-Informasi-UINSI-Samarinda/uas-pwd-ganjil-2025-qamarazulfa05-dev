<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include "../../config/koneksi.php";

if (isset($_POST['simpan'])) {
    $kode   = $_POST['kode_obat'];
    $nama   = $_POST['nama_obat'];
    $stok   = $_POST['stock_obat'];
    $harga  = $_POST['harga_obat'];
    $exp    = $_POST['expired'];

    $query = mysqli_query($conn, "INSERT INTO inventory_obat 
        (kode_obat, nama_obat, stock_obat, harga_obat, expired)
        VALUES 
        ('$kode', '$nama', '$stok', '$harga', '$exp')");

    if ($query) {
        echo "<script>
                alert('Obat berhasil ditambahkan 💖');
                window.location.href='dataobat.php';
              </script>";
    } else {
        echo "<script>alert('Gagal menambahkan obat 😢');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Obat | Apotek Pinky</title>
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
        <h1>➕ Tambah Obat</h1>
        <p>Silakan isi data obat dengan lengkap 🌸</p>
    </header>

    <div class="form-box">
        <form method="POST">
            <input type="text" name="kode_obat" placeholder="Kode Obat" required>
            <input type="text" name="nama_obat" placeholder="Nama Obat" required>
            <input type="number" name="stock_obat" placeholder="Stok" required>
            <input type="number" name="harga_obat" placeholder="Harga" required>
            <input type="date" name="expired" required>

            <button type="submit" name="simpan">💾 Simpan</button>
        </form>
    </div>
</div>

</body>
</html>
