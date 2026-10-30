<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data baru berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Master Supplier Baru</title>
</head>
<body>

    <h2>Tambah Data Master Supplier Baru</h2>
    <form action="" method="POST">
        Nama: <br>
        <input type="text" name="nama" placeholder="Nama" required><br><br>
        Telp: <br>
        <input type="text" name="telp" placeholder="telp" required><br><br>
        Alamat: <br>
        <input type="text" name="alamat" placeholder="alamat" required><br><br>
        
        <button type="submit" name="submit">Simpan</button>
        <a href="index.php">Batal</a>
    </form>

</body>
</html>