<?php
session_start();
include '../config/koneksi.php';

$user = $_SESSION['id'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];

// validasi waktu //
$jam_mulai = explode('-', $jam)[0];
$waktu_pilih = strtotime($tanggal . ' ' . $jam_mulai);

if($waktu_pilih < time()){
    echo "<script>alert('Jam sudah lewat!');history.back();</script>";
    exit;
}

//cek duplikat//
$cek_duplikat = mysqli_query($koneksi,"
    SELECT * FROM antrian 
    WHERE user_id='$user' 
    AND tanggal='$tanggal' 
    AND jam='$jam'
");

if(mysqli_num_rows($cek_duplikat) > 0){
    echo "<script>alert('Anda sudah mengambil antrian di sesi ini!');history.back();</script>";
    exit;
}

//ambil nomor//
$cek = mysqli_query($koneksi, "
    SELECT MAX(no_antrian) as max_no 
    FROM antrian 
    WHERE tanggal='$tanggal'
");

$data = mysqli_fetch_assoc($cek);

//kalau belum ada data //
$no_antrian = $data['max_no'] ? $data['max_no'] + 1 : 1;

//insert//
mysqli_query($koneksi, "
    INSERT INTO antrian(user_id, tanggal, jam, no_antrian, status)
    VALUES('$user', '$tanggal', '$jam', '$no_antrian', 'menunggu')
");

//redirect//
header("Location: dashboard.php?msg=ambil");
exit;
?>