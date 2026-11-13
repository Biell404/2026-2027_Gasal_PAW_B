<?php
$koneksi = mysqli_connect("localhost", "root", "", "penjualan_db");
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan.xls");
header("Pragma: no-cache");
header("Expires: 0");

$mulai = isset($_GET['mulai']) ? $_GET['mulai'] : '';
$selesai = isset($_GET['selesai']) ? $_GET['selesai'] : '';

$q = "SELECT DATE(waktu_transaksi) AS tgl, SUM(total) AS total_harian FROM transaksi";
if ($mulai != '' && $selesai != '') {
    $q .= " WHERE waktu_transaksi BETWEEN '$mulai' AND '$selesai'";
}
$q .= " GROUP BY DATE(waktu_transaksi) ORDER BY tgl ASC";

$res = mysqli_query($koneksi, $q);
?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Tanggal Transaksi</th>
        <th>Total Pendapatan</th>
    </tr>
    <?php 
    $no = 1;
    while ($row = mysqli_fetch_assoc($res)) : 
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['tgl']; ?></td>
        <td><?= $row['total_harian']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>