<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');

include '../templates/header.php'; 
include '../templates/sidebar.php'; 
include '../config/koneksi.php'; 

// proteksi admin
if ($_SESSION['role'] != 'admin') {
    header("location:../login.php");
    exit;
}

// tanggal hari ini
$tanggal = $_GET['tanggal'] ?? date('Y-m-d');

// statistik user
$user = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM users"));

// statistik antrian berdasarkan tanggal
$antrian   = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM antrian WHERE tanggal='$tanggal'"));
$menunggu  = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM antrian WHERE status='menunggu' AND tanggal='$tanggal'"));
$dipanggil = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM antrian WHERE status='dipanggil' AND tanggal='$tanggal'"));
$diperiksa = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM antrian WHERE status='diperiksa' AND tanggal='$tanggal'"));
$selesai   = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM antrian WHERE status='selesai' AND tanggal='$tanggal'"));

// data antrian
$data_antrian = mysqli_query($koneksi, "
    SELECT antrian.*, users.nama 
    FROM antrian 
    LEFT JOIN users ON users.id = antrian.user_id
    WHERE antrian.tanggal = '$tanggal'
    ORDER BY antrian.id ASC
");
?>

<div class="main-content p-3">

    <h3 class="mb-4">Dashboard Admin</h3>


    <div class="row g-3">

        <div class="col-12 col-md-6">
            <div class="card bg-dark text-white shadow-sm">
                <div class="card-body">
                    <small>Total User</small>
                    <h3><?= $user ?></h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card bg-info text-white shadow-sm">
                <div class="card-body">
                    <small>Total Antrian</small>
                    <h6><?= date('d-m-Y', strtotime($tanggal)) ?></h6>
                    <h3><?= $antrian ?></h3>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card bg-warning text-white shadow-sm text-center">
                <div class="card-body">
                    <h6>Menunggu</h6>
                    <h3><?= $menunggu ?></h3>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card bg-primary text-white shadow-sm text-center">
                <div class="card-body">
                    <h6>Dipanggil</h6>
                    <h3><?= $dipanggil ?></h3>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card" style="background:#6f42c1; color:white;">
                <div class="card-body text-center">
                    <h6>Diperiksa</h6>
                    <h3><?= $diperiksa ?></h3>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card bg-success text-white shadow-sm text-center">
                <div class="card-body">
                    <h6>Selesai</h6>
                    <h3><?= $selesai ?></h3>
                </div>
            </div>
        </div>

    </div>

    
    <div class="card shadow-sm my-4">
        <div class="card-body text-center">

            <form method="GET" class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                <input type="date" 
                       name="tanggal" 
                       value="<?= htmlspecialchars($tanggal) ?>" 
                       class="form-control form-control-sm w-auto">

                <button type="submit" class="btn btn-primary btn-sm">
                    Tampilkan
                </button>
            </form>

            <hr>

            <p class="text-muted mb-0">
                Menampilkan tanggal: 
                <b><?= date('d-m-Y', strtotime($tanggal)) ?></b>
            </p>

        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h6 class="mb-0">📋 Data Antrian</h6>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-bordered table-striped mb-0">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>No Antrian</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Jam</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        <?php while ($row = mysqli_fetch_assoc($data_antrian)) { ?>
                            <tr class="text-center <?= ($row['status'] == 'dipanggil') ? 'table-danger fw-bold' : '' ?>">
                                <td><?= $no++ ?></td>
                                <td><b><?= $row['no_antrian'] ?></b></td>
                                <td><?= $row['nama'] ?? '-' ?></td>
                                <td>
                                    <?php if ($row['status'] == 'menunggu') { ?>
                                        <span class="badge bg-warning">Menunggu</span>
                                    <?php } elseif ($row['status'] == 'dipanggil') { ?>
                                        <span class="badge bg-primary">Dipanggil</span>
                                    <?php } elseif ($row['status'] == 'diperiksa') { ?>
                                        <span class="badge bg-secondary">Diperiksa</span>
                                    <?php } else { ?>
                                        <span class="badge bg-success">Selesai</span>
                                    <?php } ?>
                                </td>
                                <td><?= $row['jam'] ?? '-' ?></td>
                            </tr>
                        <?php } ?>

                        <?php if (mysqli_num_rows($data_antrian) == 0) { ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Tidak ada data pada tanggal ini
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="laporan_print.php?tanggal=<?= $tanggal ?>" 
           target="_blank"
           class="btn btn-danger btn-sm px-3">
            🧾 Cetak PDF
        </a>
    </div>

</div>

<?php include '../templates/footer.php'; ?>