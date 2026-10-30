<?php
include 'koneksi.php';

$query = "SELECT id, nama, telp, alamat FROM supplier";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
</head>
<body>

    <h2>Data Master Supplier</h2>
    <a href="tambah.php">Tambah Data</a><br><br>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["telp"] . "</td>";
                echo "<td>" . $row["alamat"] . "</td>";
                echo "<td>
                        <a href='edit.php?id=" . $row["id"] . "'>Edit</a> | 
                        <a href='hapus.php?id=" . $row["id"] . "' onclick='return confirm(\"Anda yakin akan menghapus supplier ini?\");'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' align='center'>0 results</td></tr>";
        }
        ?>
    </table>

</body>
</html>