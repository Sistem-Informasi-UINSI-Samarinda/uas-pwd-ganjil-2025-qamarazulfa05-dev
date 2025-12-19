<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include "../../config/koneksi.php";
$data = mysqli_query($conn, "SELECT * FROM inventory_obat ORDER BY id_obat DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat | Apotek Pinky</title>
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
        <h1>📦 Data Inventory Obat</h1>
        <p>Daftar seluruh obat yang tersedia 💖</p>
    </header>

    <div class="table-box">
        <table>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Expired</th>
                <th>Aksi</th>
            </tr>

            <?php

            $no = 1;
            if (mysqli_num_rows($data) > 0) {
                while ($row = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['kode_obat']; ?></td>
                <td><?= $row['nama_obat']; ?></td>
                <td><?= $row['stock_obat']; ?></td>
                <td>Rp <?= number_format($row['harga_obat'], 0, ',', '.'); ?></td>
                <td><?= $row['expired']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_obat']; ?>" class="btn edit">Edit</a>
                    <a href="hapus.php?id=<?= $row['id_obat']; ?>"
                    class="btn hapus"
                    onclick="return confirm('Yakin mau hapus obat ini? 💔')">
                    Hapus
                    </a>
                </td>
            </tr>
            <?php
                }
            } else {
            ?>
            <tr>
                <td>🌸</td>
                <td>-</td>
                <td>Belum ada data obat</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
