<?php
session_start();
include '../config/koneksi.php';

$id_login = $_SESSION['id'];
$id_hapus = $_GET['id'];

// Proteksi: admin tidak bisa hapus diri sendiri
if($id_hapus == $id_login){
    echo "<script>alert('Tidak bisa menghapus akun sendiri!'); window.location='users.php';</script>";
    exit;
}

// Eksekusi hapus
mysqli_query($koneksi, "DELETE FROM users WHERE id='$id_hapus'");

echo "<script>alert('User berhasil dihapus'); window.location='users.php';</script>";
?>