<?php
require 'koneksi.php';

$id = (int)$_GET['id'];

$query_cek = $koneksi->query("SELECT COUNT(*) AS jumlah FROM transaksi_detail WHERE barang_id = $id");
$data_cek = $query_cek->fetch_assoc();
$jumlah_dipakai = $data_cek['jumlah'];

if ($jumlah_dipakai > 0) {
    echo "<script>
            alert('GAGAL: Barang ini tidak dapat dihapus karena masih digunakan pada transaksi!');
            window.location = 'barang.php';
          </script>";
} 
else {
    $koneksi->query("DELETE FROM barang WHERE id = $id");
    echo "<script>
            alert('SUKSES: Barang berhasil dihapus.');
            window.location = 'barang.php';
          </script>";
}
?>