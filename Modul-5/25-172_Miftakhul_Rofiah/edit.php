<?php include 'koneksi.php';
$id = $_GET['id'];
$d = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM supplier WHERE id=$id"));
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    mysqli_query($conn, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        input { padding: 5px; margin-bottom: 10px; width: 300px; }
        .btn { padding: 5px 10px; color: white; border-radius: 3px; border: none; cursor: pointer;}
        .btn-update { background-color: #5cb85c; }
        .btn-batal { background-color: #d9534f; }
    </style>
</head>
<body>
    <h2>Edit Data Master Supplier</h2>
    <form method="post">
        <p>Nama: <br> <input type="text" name="nama" value="<?= $d['nama'] ?>" required></p>
        <p>Telp: <br> <input type="text" name="telp" value="<?= $d['telp'] ?>" required></p>
        <p>Alamat: <br> <input type="text" name="alamat" value="<?= $d['alamat'] ?>" required></p>
        <button type="submit" name="update" class="btn btn-update">Update</button>
        <a href="index.php"><button type="button" class="btn btn-batal">Batal</button></a>
    </form>
</body>
</html>