<?php
session_start();
include '../config/koneksi.php';

// prs simpan
if(isset($_POST['simpan'])){
    $nama     = $_POST['nama'];
    $jk       = $_POST['jk'];
    $no_hp    = $_POST['no_hp'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // ✅ FIX
    $role     = $_POST['role'];

    // cek email
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($cek) > 0){
        echo "<script>alert('Email sudah digunakan!');</script>";
    } else {
        mysqli_query($koneksi, "INSERT INTO users 
        (nama, jk, no_hp, email, password, role) 
        VALUES 
        ('$nama', '$jk', '$no_hp', '$email', '$password', '$role')");

        echo "<script>alert('User berhasil ditambahkan'); window.location='users.php';</script>";
    }
}
?>

<?php
include '../templates/header.php';
include '../templates/sidebar.php';
?>

<div class="main-content">
    <h3>Tambah User</h3>

    <form method="POST">

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
                <option value="pasien">Pasien</option>
            </select>
        </div>

        <button type="submit" name="simpan" class="btn btn-success">
            Simpan
        </button>

        <a href="users.php" class="btn btn-secondary">
            Kembali
        </a>

    </form>
</div>

<?php include '../templates/footer.php'; ?>