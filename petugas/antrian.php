<?php 
include '../templates/header.php'; 
include '../templates/sidebar.php'; 
include '../config/koneksi.php'; 

// ambil tanggal dari input (default hari ini)
$tanggal = $_GET['tanggal'] ?? date('Y-m-d');

// query dengan filter tanggal
$data = mysqli_query($koneksi,"
SELECT antrian.*, users.nama 
FROM antrian 
JOIN users ON users.id = antrian.user_id
WHERE antrian.tanggal = '$tanggal'
ORDER BY antrian.id DESC
");
?>

<div class="main-content">

<h3 class="mb-3">Data Antrian Pasien</h3>

<!-- fltr tgl -->
<form method="GET" class="mb-3 d-flex gap-2 align-items-center">
    <input type="date" name="tanggal" class="form-control w-auto"
        value="<?= htmlspecialchars($tanggal) ?>">

    <button type="submit" class="btn btn-primary btn-sm">
        Filter
    </button>

    <a href="?" class="btn btn-secondary btn-sm">
        Reset
    </a>
</form>

<!--info tgl -->
<p class="text-muted">
    Menampilkan tanggal: <b><?= date('d-m-Y', strtotime($tanggal)) ?></b>
</p>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    <?php 
    $no = 1;
    while($d = mysqli_fetch_assoc($data)){ 
        $status = $d['status'];
    ?>
        <tr>
            <td><?= $no++ ?></td>

            <td><?= htmlspecialchars($d['nama']) ?></td>

            <td><?= date('d-m-Y', strtotime($d['tanggal'])) ?></td>

            <td><?= $d['jam'] ?? '-' ?></td>

            <td>
                <?php
                if($status=='menunggu'){
                    echo "<span class='badge bg-secondary'>Menunggu</span>";
                }elseif($status=='dipanggil'){
                    echo "<span class='badge bg-warning text-dark'>Dipanggil</span>";
                }elseif($status=='diperiksa'){
                    echo "<span class='badge bg-primary'>Diperiksa</span>";
                }else{
                    echo "<span class='badge bg-success'>Selesai</span>";
                }
                ?>
            </td>

            <td>
                <?php if($status=='menunggu'){ ?>
                    <a href="proses_update.php?id=<?= $d['id'] ?>&status=dipanggil" 
                       class="btn btn-warning btn-sm">
                        Panggil
                    </a>
                <?php } ?>

                <?php if($status=='dipanggil'){ ?>
                    <a href="proses_update.php?id=<?= $d['id'] ?>&status=diperiksa" 
                       class="btn btn-primary btn-sm">
                        Periksa
                    </a>
                <?php } ?>

                <?php if($status=='diperiksa'){ ?>
                    <a href="proses_update.php?id=<?= $d['id'] ?>&status=selesai" 
                       class="btn btn-success btn-sm">
                        Selesai
                    </a>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>

    <?php if(mysqli_num_rows($data) == 0){ ?>
        <tr>
            <td colspan="6" class="text-center text-muted">
                Tidak ada data pada tanggal ini
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table>

</div>

<?php include '../templates/footer.php'; ?>