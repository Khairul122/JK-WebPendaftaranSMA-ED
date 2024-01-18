<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "ppdb_online";

$koneksi = mysqli_connect($hostname, $username, $password, $db_name);

if ($koneksi->connect_error) {
    echo "Koneksi Database Gagal: ". mysqli_connect_error;
    die;
} 


?>