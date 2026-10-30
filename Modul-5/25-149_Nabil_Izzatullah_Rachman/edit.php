<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM supplier WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $query_update = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id";

    if (mysqli_query($conn, $query_update)) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Master Supplier</title>
</head>
<body>

    <h2>Edit Data Master Supplier</h2>
    <form action="" method="POST">
        Nama: <br>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br><br>
        Telp: <br>
        <input type="text" name="telp" value="<?php echo $row['telp']; ?>" required><br><br>
        Alamat: <br>
        <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required><br><br>
        
        <button type="submit" name="update">Update</button>
        <a href="index.php">Batal</a>
    </form>

</body>
</html>