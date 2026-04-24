<?php
include '../config/koneksi.php';

$nama     = $_POST['nama'];
$jk       = $_POST['jk'];
$no_hp    = $_POST['no_hp'];
$email    = $_POST['email'];
$password = $_POST['password'];

// validasi
if(empty($nama) || empty($jk) || empty($no_hp) || empty($email) || empty($password)){
    echo "Data harus diisi!";
    exit;
}

// cek email sudah ada atau belum
$cek = $koneksi->prepare("SELECT * FROM users WHERE email = ?");
$cek->bind_param("s", $email);
$cek->execute();
$result = $cek->get_result();

if($result->num_rows > 0){
    echo "Email sudah terdaftar!";
    exit;
}

// hash password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// simpan ke database
$stmt = $koneksi->prepare("INSERT INTO users(nama,jk,no_hp,email,password,role) VALUES (?,?,?,?,?,'pasien')");
$stmt->bind_param("sssss", $nama, $jk, $no_hp, $email, $password_hash);
$stmt->execute();

header("Location: login.php");
exit;