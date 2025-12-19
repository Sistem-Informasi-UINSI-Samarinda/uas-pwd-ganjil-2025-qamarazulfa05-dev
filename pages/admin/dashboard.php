<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include "../../config/koneksi.php";
?>

<?php
$total_obat   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM inventory_obat"));
$total_stok   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(stock_obat) AS stok FROM inventory_obat"))['stok'];
$obat_habis   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM inventory_obat WHERE stock_obat <= 0"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Apotek Pinky</title>
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
        <h1>🌸 Dashboard Inventory Obat</h1>
        <p>Selamat datang di sistem inventory obat 💖</p>
    </header>

    <div class="cards">
        <div class="card pink">
            <h3>Total Obat</h3>
            <p><?= $total_obat; ?></p>
        </div>

        <div class="card soft">
            <h3>Total Stok</h3>
            <p><?= $total_stok; ?></p>
        </div>

        <div class="card danger">
            <h3>Obat Habis</h3>
            <p><?= $obat_habis; ?></p>
        </div>
    </div>

    <div class="table-box">
        <h2>🧾 Data Obat Terbaru</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Obat</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Expired</th>
            </tr>

            <?php
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM inventory_obat ORDER BY id_obat DESC LIMIT 5");
            while ($row = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['kode_obat']; ?></td>
                <td><?= $row['nama_obat']; ?></td>
                <td><?= $row['stock_obat']; ?></td>
                <td>Rp <?= number_format($row['harga_obat'],0,',','.'); ?></td>
                <td><?= $row['expired']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
