<?php
session_start();
include '../config/koneksi.php';

$email    = $_POST['email'];
$password = $_POST['password'];

// ambil user
$stmt = $koneksi->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){

    $user = $result->fetch_assoc();

    // cek password (hash)
    if(password_verify($password, $user['password'])){

        $_SESSION['id']   = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['role'] = $user['role'];

        // redirect role
        if($user['role'] == 'admin'){
            header("Location: ../admin/dashboard.php");

        } elseif($user['role'] == 'petugas'){
            header("Location: ../petugas/dashboard.php");

        } elseif($user['role'] == 'pasien'){
            header("Location: ../pasien/dashboard.php");

        } else {
            echo "Role tidak dikenali!";
        }

        exit;

    } else {
        echo "<script>alert('Password salah!');window.location='/auth/login.php';</script>";
    }

} else {
    echo "<script>alert('Email tidak ditemukan!');window.location='/auth/login.php';</script>";
}