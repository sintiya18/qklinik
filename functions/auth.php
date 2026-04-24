<?php

// sesion handling (aman)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// cek login
function cekLogin(){
    if(!isset($_SESSION['id'])){
        header("Location: ../index.php");
        exit;
    }
}

// cek role
function cekRole($role){
    if(!isset($_SESSION['role']) || $_SESSION['role'] != $role){
        echo "<h4 style='color:red;text-align:center;margin-top:20px;'>Akses ditolak!</h4>";
        exit;
    }
}

// cek multi role
function cekMultiRole($roles = []){
    if(!isset($_SESSION['role']) || !in_array($_SESSION['role'], $roles)){
        echo "<h4 style='color:red;text-align:center;margin-top:20px;'>Akses ditolak!</h4>";
        exit;
    }
}

// ambil data user
function user(){
    return $_SESSION ?? null;
}
?>