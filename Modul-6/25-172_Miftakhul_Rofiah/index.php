<?php
require 'koneksi.php';

$id_terpilih = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id_terpilih == 0) {
    $r = $koneksi->query("SELECT id FROM transaksi LIMIT 1");
    if ($row = $r->fetch_assoc()) {
        $id_terpilih = $row['id'];
    }
}

$barang_terpakai = [];
$query_terpakai = $koneksi->query("SELECT barang_id FROM transaksi_detail WHERE transaksi_id = $id_terpilih");
while ($row = $query_terpakai->fetch_assoc()) {
    $barang_terpakai[] = $row['barang_id'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Penjualan - Master Detail</title>
    <style>
        .box { margin-bottom: 30px; }
        table { border-collapse: collapse; margin-bottom: 10px; }
        th, td { border: 1px solid #333; padding: 6px; }
        th { background-color: #eee; }
    </style>
</head>
<body>

    <h2>Tabel Master (Transaksi)</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query_master = $koneksi->query("SELECT t.*, p.nama FROM transaksi t LEFT JOIN pelanggan p ON t.pelanggan_id = p.id ORDER BY t.id");
        while ($m = $query_master->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $m['id'] . "</td>";
            echo "<td>" . $m['waktu_transaksi'] . "</td>";
            echo "<td>" . htmlspecialchars($m['nama'] ?? '-') . "</td>";
            echo "<td>" . $m['total'] . "</td>";
            echo "<td><a href='index.php?id=" . $m['id'] . "'>Pilih</a></td>";
            echo "</tr>";
        }
        ?>
    </table>


    <h2>Tabel Detail Transaksi (ID: <?= $id_terpilih ?>)</h2>
    <table>
        <tr>
            <th>Barang</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
        <?php
        $query_detail = $koneksi->query("SELECT td.*, b.nama_barang FROM transaksi_detail td JOIN barang b ON td.barang_id = b.id WHERE td.transaksi_id = $id_terpilih");
        while ($d = $query_detail->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($d['nama_barang']) . "</td>";
            echo "<td>" . $d['harga'] . "</td>";
            echo "<td>" . $d['qty'] . "</td>";
            echo "<td>" . ($d['harga'] * $d['qty']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

        <h3>Input Detail Transaksi</h3>
    <form method="post" action="simpanDetail.php">
        <input type="hidden" name="transaksi_id" value="<?= $id_terpilih ?>">
        
        <label>Ketik Nama Barang: </label>
        <input type="text" name="nama_barang" placeholder="Contoh: Lampu LED" required>
        
        <label>Qty: </label>
        <input type="number" name="qty" min="1" required>
        
        <button type="submit">Simpan Detail</button>
    </form>

    <br>

    <h2>Tabel Barang</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query_barang_semua = $koneksi->query("SELECT * FROM barang ORDER BY id");
        while ($br = $query_barang_semua->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $br['id'] . "</td>";
            echo "<td>" . htmlspecialchars($br['kode_barang']) . "</td>";
            echo "<td>" . htmlspecialchars($br['nama_barang']) . "</td>";
            echo "<td>" . $br['harga'] . "</td>";
            echo "<td>" . $br['stok'] . "</td>";
            echo "<td><a href='hapusBarang.php?id=" . $br['id'] . "' onclick=\"return confirm('Yakin ingin menghapus barang ini?')\">Hapus</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>