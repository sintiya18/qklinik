<?php 
include '../templates/header.php'; 
include '../templates/sidebar.php'; 
include '../config/koneksi.php'; 

$hari_ini = date('Y-m-d');

// statistik hari ini
$total = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM antrian WHERE tanggal='$hari_ini'"));
$menunggu = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM antrian WHERE tanggal='$hari_ini' AND status='menunggu'"));
$dipanggil = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM antrian WHERE tanggal='$hari_ini' AND status='dipanggil'"));
$diperiksa = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM antrian WHERE tanggal='$hari_ini' AND status='diperiksa'"));
$selesai = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM antrian WHERE tanggal='$hari_ini' AND status='selesai'"));
?>

<div class="main-content">

<h3>Dashboard Petugas</h3>


<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-secondary text-white">
            <div class="card-body">
                Menunggu
                <h4><?= $menunggu ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                Dipanggil
                <h4><?= $dipanggil ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                Diperiksa
                <h4><?= $diperiksa ?></h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                Selesai
                <h4><?= $selesai ?></h4>
            </div>
        </div>
    </div>
</div>


<h5>Data Antrian Hari Ini</h5>

<table class="table table-bordered table-striped">
<tr>
    <th>No</th>
    <th>No Antrian</th>
    <th>Nama Pasien</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php
$no=1;

$data = mysqli_query($koneksi,"
SELECT antrian.*, users.nama 
FROM antrian 
JOIN users ON users.id = antrian.user_id
WHERE antrian.tanggal='$hari_ini'
ORDER BY antrian.no_antrian ASC
");

while($d=mysqli_fetch_assoc($data)){
?>

<tr>
<td><?= $no++ ?></td>

<td><b><?= $d['no_antrian'] ?></b></td>

<td><?= htmlspecialchars($d['nama']) ?></td>

<td><?= $d['tanggal'] ?></td>

<td><?= $d['jam'] ?></td>

<td>
<?php
$status = $d['status'];

if($status=='menunggu'){
    echo "<span class='badge bg-secondary'>Menunggu</span>";
}elseif($status=='dipanggil'){
    echo "<span class='badge bg-warning'>Dipanggil</span>";
}elseif($status=='diperiksa'){
    echo "<span class='badge bg-primary'>Diperiksa</span>";
}else{
    echo "<span class='badge bg-success'>Selesai</span>";
}
?>
</td>

<td>

<?php if($status=='menunggu'){ ?>
<a href="proses_update.php?id=<?= $d['id'] ?>&status=dipanggil" class="btn btn-warning btn-sm">Panggil</a>
<?php } ?>

<?php if($status=='dipanggil'){ ?>
<a href="proses_update.php?id=<?= $d['id'] ?>&status=diperiksa" class="btn btn-primary btn-sm">Periksa</a>
<?php } ?>

<?php if($status=='diperiksa'){ ?>
<a href="proses_update.php?id=<?= $d['id'] ?>&status=selesai" class="btn btn-success btn-sm">Selesai</a>
<?php } ?>

</td>

</tr>

<?php } ?>

</table>

</div>

<?php include '../templates/footer.php'; ?>