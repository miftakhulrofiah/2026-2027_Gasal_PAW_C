<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Master Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        
        /* Perbaikan Tabel */
        table { border-collapse: collapse; width: 80%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px 8px; text-align: left; vertical-align: middle; }
        th { background-color: #d9edf7; color: #31708f; }
        
        /* Perbaikan Kolom Tindakan agar sejajar */
        td:last-child {
            white-space: nowrap; /* Mencegah tombol turun ke bawah */
            text-align: center;
        }

        /* Perbaikan Tombol */
        .btn { 
            padding: 6px 12px; 
            text-decoration: none; 
            color: white; 
            border-radius: 3px; 
            border: none; 
            cursor: pointer;
            font-size: 14px;
            display: inline-block;
            margin-right: 5px;
        }
        .btn-tambah { background-color: #5cb85c; margin-bottom: 10px; }
        .btn-edit { background-color: #f0ad4e; }
        .btn-hapus { background-color: #d9534f; margin-right: 0;}
    </style>
</head>
<body>
    <h2>Data Master Supplier</h2>
    <a href="tambah.php" class="btn btn-tambah">Tambah Data</a>
    
    <table>
        <tr>
            <th width="50">No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th width="150">Tindakan</th>
        </tr>
        <?php
        $no = 1;
        $q = mysqli_query($conn, "SELECT * FROM supplier");
        while ($d = mysqli_fetch_assoc($q)) {
            echo "<tr>
                <td>".$no++."</td>
                <td>".$d['nama']."</td>
                <td>".$d['telp']."</td>
                <td>".$d['alamat']."</td>
                <td>
                    <a href='edit.php?id=".$d['id']."' class='btn btn-edit'>Edit</a>
                    <a href='hapus.php?id=".$d['id']."' class='btn btn-hapus' onclick=\"return confirm('Anda yakin akan menghapus supplier ini?')\">Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>