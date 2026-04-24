<?php
session_start();
include '../templates/header.php';
include '../templates/sidebar.php';
include '../config/koneksi.php';

$id_login = $_SESSION['id'];

$data_user = mysqli_query($koneksi, "SELECT * FROM users");
?>

<div class="main-content">
    <h3>Data User</h3>

    <a href="tambah_user.php" class="btn btn-primary mb-3">+ Tambah User</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; while($u = mysqli_fetch_array($data_user)) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $u['nama']; ?></td>
                <td><?= $u['email']; ?></td>
                <td><?= ucfirst($u['role']); ?></td>
                <td>

                  
                    <a href="edit_user.php?id=<?= $u['id']; ?>" 
                       class="btn btn-warning btn-sm">Edit</a>

            
                    <?php if($u['id'] != $id_login) { ?>
                        <a href="hapus_user.php?id=<?= $u['id']; ?>" 
                           onclick="return confirm('Yakin ingin menghapus user ini?')" 
                           class="btn btn-danger btn-sm">
                           Hapus
                        </a>
                    <?php } else { ?>
                        <button class="btn btn-secondary btn-sm" disabled>
                            Tidak bisa hapus diri sendiri
                        </button>
                    <?php } ?>

                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php include '../templates/footer.php'; ?>