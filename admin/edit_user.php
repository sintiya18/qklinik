<?php
include '../templates/header.php';
include '../templates/sidebar.php';
include '../config/koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$u = mysqli_fetch_array($data);
?>

<div class="main-content">
    <h3>Edit User</h3>

    <form method="POST">

        <input type="hidden" name="id" value="<?= $u['id']; ?>">

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $u['nama']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
                <option value="L" <?= $u['jk']=='L'?'selected':''; ?>>Laki-laki</option>
                <option value="P" <?= $u['jk']=='P'?'selected':''; ?>>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>No Telepon</label>
            <input type="text" name="no_hp" value="<?= $u['no_hp']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="<?= $u['email']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" <?= $u['role']=='admin'?'selected':''; ?>>Admin</option>
                <option value="petugas" <?= $u['role']=='petugas'?'selected':''; ?>>Petugas</option>
                <option value="pasien" <?= $u['role']=='pasien'?'selected':''; ?>>Pasien</option>
            </select>
        </div>

        <button type="submit" name="update" class="btn btn-primary">
            Update
        </button>

        <a href="users.php" class="btn btn-secondary">
            Kembali
        </a>

    </form>
</div>

<?php
// PROSES UPDATE
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    mysqli_query($koneksi, "UPDATE users SET 
        nama='$nama',
        jk='$jk',
        no_hp='$no_hp',
        email='$email',
        role='$role'
    WHERE id='$id'");

    echo "<script>alert('Data berhasil diupdate'); window.location='users.php';</script>";
}
?>

<?php include '../templates/footer.php'; ?>