<?php

// phpinfo();

$all_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar, nilai WHERE pendaftar.id = nilai.pendaftar_id AND nilai.status = 0");
// $all_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar");

//cek hasil
if (!$all_pendaftar) {
    die('Query error : ' . mysqli_error($koneksi));

}

//Jmlh pendaftar
$jml_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar, nilai WHERE pendaftar.id = nilai.pendaftar_id");

//cek hasil
if (!$jml_pendaftar) {
    die('Query error : ' . mysqli_error($koneksi));

}

//cjumlah lolos
$jml_diterima = mysqli_query($koneksi, "SELECT * FROM pendaftar, nilai WHERE pendaftar.id = nilai.pendaftar_id AND nilai.status = 1");

//cek Haisil
if (!$jml_diterima) {
    die('Query error : ' . mysqli_error($koneksi));

}


?>