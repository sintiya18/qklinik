<?php
include '../config/koneksi.php';

// ambil tanggal (default hari ini)
$tanggal = $_GET['tanggal'] ?? date('Y-m-d');

// amankan input
$tanggal = mysqli_real_escape_string($koneksi, $tanggal);

// query
$data = mysqli_query($koneksi, "
    SELECT antrian.*, users.nama 
    FROM antrian
    JOIN users ON antrian.user_id = users.id
    WHERE antrian.tanggal = '$tanggal'
    ORDER BY antrian.no_antrian ASC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Qlinik</title>

    <style>
        body {
            font-family: Arial;
            font-size: 12px;
            color: #000;
            margin: 20px;
        }

        .kop {
            text-align: center;
            margin-bottom: 10px;
        }

        .kop h2 {
            margin: 0;
            font-size: 20px;
        }

        .kop p {
            margin: 2px;
            font-size: 12px;
        }

        hr {
            border: 1px solid black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th {
            background: #f0f0f0;
            text-align: center;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 6px;
        }

        td {
            text-align: left;
        }

        .ttd {
            width: 200px;
            float: right;
            text-align: center;
            margin-top: 50px;
        }

        /* btn style */
        .btn {
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            margin-right: 5px;
            display: inline-block;
        }

        .btn-back {
            background: #6c757d;
            color: white;
        }

        .btn-print {
            background: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.85;
        }

        .toolbar {
            margin-bottom: 15px;
        }

     
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="toolbar no-print">
    
    <a href="../admin/dashboard.php" class="btn btn-back">
        ⬅ Kembali
    </a>

    <button onclick="window.print()" class="btn btn-print">
        🖨 Cetak / Save PDF
    </button>

</div>

<div class="kop">
    <h2>QKLINIK</h2>
    <p>Sistem Antrian Klinik</p>
</div>

<hr>

<h4 style="text-align:center;">
    LAPORAN ANTRIAN PASIEN
</h4>

<p style="text-align:center;">
    Tanggal: <b><?= date('d-m-Y', strtotime($tanggal)); ?></b>
</p>

<table>
    <tr>
        <th width="5%">No</th>
        <th>Nama Pasien</th>
        <th>Status</th>
        <th width="20%">Jam</th>
    </tr>

    <?php 
    $no = 1;
    if(mysqli_num_rows($data) > 0){
        while($d = mysqli_fetch_assoc($data)) { 
    ?>
    <tr>
        <td style="text-align:center;"><?= $no++; ?></td>
        <td><?= htmlspecialchars($d['nama']); ?></td>
        <td style="text-align:center;"><?= ucfirst($d['status']); ?></td>
        <td style="text-align:center;"><?= $d['jam'] ?? '-'; ?></td>
    </tr>
    <?php } } else { ?>
    <tr>
        <td colspan="4" style="text-align:center;">
            Tidak ada data pada tanggal ini
        </td>
    </tr>
    <?php } ?>
</table>


<div class="ttd">
    <p><?= date('d-m-Y'); ?></p>
    <p>Admin Klinik</p>
    <br><br><br>
    <p>(_______________)</p>
</div>

</body>
</html>