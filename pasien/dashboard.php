<?php 
include '../templates/header.php'; 
include '../config/koneksi.php'; 

$id = $_SESSION['id'];
$total = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM antrian WHERE user_id='$id'"));
?>

<div class="wrapper">

    <?php include '../templates/sidebar.php'; ?>

    <div class="main-content" id="mainContent">

        <h3>Dashboard Pasien</h3>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        Total Antrian Saya
                        <h4><?= $total ?></h4>
                    </div>
                </div>
            </div>
        </div>

    
        <h5>Riwayat Antrian</h5>

        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>No Antrian</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>
            </tr>

            <?php
            $no=1;
            $data = mysqli_query($koneksi,"SELECT * FROM antrian WHERE user_id='$id' ORDER BY id DESC");

            while($d=mysqli_fetch_assoc($data)){
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><b><?= $d['no_antrian'] ?? '-' ?></b></td>
                <td><?= htmlspecialchars($d['tanggal']) ?></td>
                <td><?= $d['jam'] ?? '-' ?></td>
                <td>
                <?php
                $status = $d['status'] ?? 'menunggu';

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
            </tr>
            <?php } ?>
        </table>

    </div>

</div>

<?php include '../templates/footer.php'; ?>