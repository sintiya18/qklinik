<?php
$koneksi = mysqli_connect("localhost","root","","klinik_app");
if(!$koneksi){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>