<?php
require 'koneksi.php';

$tid = (int)$_POST['transaksi_id'];
$nama_barang = trim($_POST['nama_barang']);
$qty = (int)$_POST['qty'];

$cari_barang = $koneksi->query("SELECT id, harga FROM barang WHERE nama_barang = '$nama_barang'");
$data_barang = $cari_barang->fetch_assoc();

if (!$data_barang) {
    echo "<script>alert('GAGAL: Barang tidak ditemukan di database! Pastikan nama barang benar.'); window.location='index.php?id=$tid';</script>";
    exit;
}

$bid = $data_barang['id'];
$harga = $data_barang['harga'];

$cek = $koneksi->query("SELECT COUNT(*) AS jml FROM transaksi_detail WHERE transaksi_id = $tid AND barang_id = $bid");
if ($cek->fetch_assoc()['jml'] > 0) {
    echo "<script>alert('GAGAL: Barang ini sudah ada di dalam transaksi!'); window.location='index.php?id=$tid';</script>";
    exit;
}

$koneksi->query("INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) VALUES ($tid, $bid, $harga, $qty)");

$total_baru = 0;
$query_hitung = $koneksi->query("SELECT harga, qty FROM transaksi_detail WHERE transaksi_id = $tid");
while ($row = $query_hitung->fetch_assoc()) {
    $total_baru += ($row['harga'] * $row['qty']);
}
$koneksi->query("UPDATE transaksi SET total = $total_baru WHERE id = $tid");

header("Location: index.php?id=$tid");
exit;
?>