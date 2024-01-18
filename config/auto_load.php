<?php

session_start();
include('koneksi.php');

$base_url = "http://localhost/ppdb_sma";

$uri_segment = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
// var_dump($uri_segment);

if(isset($_SESSION['status']) && $_SESSION['status'] == 'login'){
    if($uri_segment[2] == $_SESSION['level']){

    } else {
        header('location: ../template/404.php');
        // echo "Error: Anda tidak dapat masuk ke halaman lain";
        // echo "<br><br> <button type='button' onClick='history.back()'>Kembali</button>";
        // die;
    }
} else {
    $_SESSION['login_error'] = "Silahkan login untuk masuk kedalam sistem!";
    header('location:' . $base_url . '/login.php');
}

?>