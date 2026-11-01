<?php include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    mysqli_query($conn, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        input { padding: 5px; margin-bottom: 10px; width: 300px; }
        .btn { padding: 5px 10px; color: white; border-radius: 3px; border: none; cursor: pointer;}
        .btn-simpan { background-color: #5cb85c; }
        .btn-batal { background-color: #d9534f; }
    </style>
</head>
<body>
    <h2>Tambah Data Master Supplier Baru</h2>
    <form method="post">
        <p>Nama: <br> <input type="text" name="nama" placeholder="Nama" required></p>
        <p>Telp: <br> <input type="text" name="telp" placeholder="telp" required></p>
        <p>Alamat: <br> <input type="text" name="alamat" placeholder="alamat" required></p>
        <button type="submit" name="simpan" class="btn btn-simpan">Simpan</button>
        <a href="index.php"><button type="button" class="btn btn-batal">Batal</button></a>
    </form>
</body>
</html>