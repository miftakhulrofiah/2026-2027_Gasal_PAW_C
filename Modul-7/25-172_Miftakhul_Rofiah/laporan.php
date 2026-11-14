<?php
$host = "localhost";
$user = "root";       
$pass = "";           
$db   = "db_toko"; 

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_error()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$labels = [];
$data_total = [];
$rekap = [];
$total_pendapatan = 0;
$total_pelanggan = 0;

$tgl_mulai   = $_GET['tanggal_mulai'] ?? '';
$tgl_selesai = $_GET['tanggal_selesai'] ?? '';

$where_clause = "";
if (!empty($tgl_mulai) && !empty($tgl_selesai)) {
    $where_clause = "WHERE DATE(waktu_transaksi) BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
}

$query_rekap = "SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total_harian
                FROM transaksi 
                $where_clause
                GROUP BY DATE(waktu_transaksi) 
                ORDER BY tanggal ASC";
$result_rekap = mysqli_query($koneksi, $query_rekap);
    
while ($row = mysqli_fetch_assoc($result_rekap)) {
    $labels[] = $row['tanggal'];
    $data_total[] = (int) $row['total_harian'];
    $rekap[] = $row;
    $total_pendapatan += $row['total_harian'];
}

$query_pelanggan = "SELECT COUNT(DISTINCT pelanggan_id) AS jml_pelanggan
                    FROM transaksi 
                    $where_clause";
$result_pelanggan = mysqli_query($koneksi, $query_pelanggan);
$row_pelanggan = mysqli_fetch_assoc($result_pelanggan);
$total_pelanggan = $row_pelanggan['jml_pelanggan'] ?? 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; margin-bottom: 20px;}
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #cce5ff; }
        .ringkasan-container { display: flex; gap: 20px; margin-top: 15px; }
        .card { flex: 1; border: 1px solid #333; padding: 15px; background-color: #cce5ff; }
        .card h4 { margin: 0 0 10px 0; font-size: 14px; color: #333; }
        .card h3 { margin: 0; font-size: 24px; color: #000; }

        @media print {
            .no-print { display: none !important; }
            body { margin: 0; }
            .card { border: 1px solid #000; background-color: transparent; }
            th { background-color: #eee !important; -webkit-print-color-adjust: exact; }
        }
    </style>
</head>
<body>

    <div class="no-print">
        <h2>Filter Laporan Penjualan</h2>
        <form method="GET" action="">
            <label>Dari Tanggal: </label>
            <input type="date" name="tanggal_mulai" value="<?= htmlspecialchars($tgl_mulai) ?>">
            
            <label>Sampai Tanggal: </label>
            <input type="date" name="tanggal_selesai" value="<?= htmlspecialchars($tgl_selesai) ?>">
            
            <button type="submit">Tampilkan</button>
        </form>
        <br>
        
        <?php if (!empty($labels)): ?>
            <button onclick="window.print()" style="padding: 10px 20px; cursor: pointer;">🖨️ Cetak Laporan</button>
            <a href="export_excel.php?tanggal_mulai=<?= $tgl_mulai ?>&tanggal_selesai=<?= $tgl_selesai ?>">
                <button type="button" style="padding: 10px 20px; cursor: pointer;">📊 Ekspor Excel</button>
            </a>
        <?php endif; ?>
    </div>

    <?php if (!empty($labels)): ?>
        <h1 style="text-align: center;">Rekap Laporan Penjualan</h1>
        <p style="text-align: center;">
            Periode: 
            <?= !empty($tgl_mulai) ? date('d M Y', strtotime($tgl_mulai)) : 'Awal' ?> 
            s/d 
            <?= !empty($tgl_selesai) ? date('d M Y', strtotime($tgl_selesai)) : 'Akhir' ?>
        </p>
        
        <div style="width: 80%; margin: 0 auto; height: 400px;">
            <canvas id="grafikPenjualan"></canvas>
        </div>

        <h3 style="margin-top: 30px;">Tabel Rekapitulasi Penjualan Harian</h3>
        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Total Pendapatan</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($rekap as $data): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>Rp. <?= number_format($data['total_harian'], 0, ',', '.') ?></td>
                    <td><?= date('d-m-Y', strtotime($data['tanggal'])) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="ringkasan-container">
            <div class="card">
                <h4>Jumlah Pelanggan Unik</h4>
                <h3><?= $total_pelanggan ?> Orang</h3>
            </div>
            <div class="card">
                <h4>Total Pendapatan Keseluruhan</h4>
                <h3>Rp. <?= number_format($total_pendapatan, 0, ',', '.') ?></h3>
            </div>
        </div>

        <script>
            const ctx = document.getElementById('grafikPenjualan').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($labels) ?>,
                    datasets: [{
                        label: 'Total Pendapatan Harian (Rp)',
                        data: <?= json_encode($data_total) ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        </script>

    <?php else: ?>
        <p style="text-align: center; color: red;">Belum ada data transaksi di database.</p>
    <?php endif; ?>

</body>
</html>