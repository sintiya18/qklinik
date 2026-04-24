<?php
session_start();
include '../config/koneksi.php';

// cek login
if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    exit;
}

// cek role petugas
if($_SESSION['role'] != 'petugas'){
    echo "Akses ditolak!";
    exit;
}

// validasi parameter
if(!isset($_GET['id']) || !isset($_GET['status'])){
    echo "Parameter tidak lengkap!";
    exit;
}

$id = intval($_GET['id']);
$status = $_GET['status'];

// status yg valid
$allowed = ['menunggu','dipanggil','diperiksa','selesai'];

if(!in_array($status, $allowed)){
    echo "Status tidak valid!";
    exit;
}

// update data
$query = mysqli_query($koneksi, "UPDATE antrian SET status='$status' WHERE id='$id'");

// cek error
if(!$query){
    echo "Gagal update: " . mysqli_error($koneksi);
    exit;
}

// redirect
header("Location: dashboard.php");
exit;