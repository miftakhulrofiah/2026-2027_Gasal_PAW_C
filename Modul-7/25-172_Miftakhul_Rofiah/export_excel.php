<?php
$host = "localhost";
$user = "root";       
$pass = "";           
$db   = "db_toko"; 

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_error()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$tgl_mulai = $_GET['tanggal_mulai'] ?? '';
$tgl_selesai = $_GET['tanggal_selesai'] ?? '';

if (empty($tgl_mulai) || empty($tgl_selesai)) {
    die("Parameter tanggal tidak valid.");
}

$filename = "Rekap_Penjualan_" . $tgl_mulai . "_sd_" . $tgl_selesai . ".xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Pragma: no-cache");
header("Expires: 0");

$query = "SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total_harian
          FROM transaksi 
          WHERE DATE(waktu_transaksi) BETWEEN '$tgl_mulai' AND '$tgl_selesai'
          GROUP BY DATE(waktu_transaksi) 
          ORDER BY tanggal ASC";
$result = mysqli_query($koneksi, $query);

echo "<table border='1'>";
echo "<tr>
        <th colspan='3' style='background-color: #cce5ff;'>Rekap Laporan Penjualan</th>
      </tr>";
echo "<tr>
        <th colspan='3'>Periode: {$tgl_mulai} s/d {$tgl_selesai}</th>
      </tr>";
echo "<tr>
        <th style='background-color: #cce5ff;'>No</th>
        <th style='background-color: #cce5ff;'>Total Pendapatan</th>
        <th style='background-color: #cce5ff;'>Tanggal Transaksi</th>
      </tr>";

$no = 1;
$grand_total = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $grand_total += $row['total_harian'];
    
    echo "<tr>";
    echo "<td>" . $no++ . "</td>";
    echo "<td>" . $row['total_harian'] . "</td>";
    echo "<td>" . $row['tanggal'] . "</td>";
    echo "</tr>";
}

echo "<tr>
        <td colspan='2' style='text-align: right;'><b>TOTAL KESELURUHAN</b></td>
        <td><b>" . $grand_total . "</b></td>
      </tr>";
echo "</table>";
?>