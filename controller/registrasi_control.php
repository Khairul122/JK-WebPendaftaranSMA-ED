<?php

include('../config/koneksi.php');
session_start();

if (isset($_POST['btn_registrasi'])) {
    // print_r($_POST);

    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = date("Y-m-d", strtotime($_POST['tgl_lahir']));
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $password = md5($_POST['password']);
    $ulangi_password = md5($_POST['ulangi_password']);


    if($password != $ulangi_password){
        $_SESSION['pesan_registrasi'] = "Password tidak sama, Masukkan kembali password Anda!";
        echo '<script>window.location="../registrasi.php"</script>';
        header('location:registrasi.php');
        die;
    }

    $sql_user = "INSERT INTO users (nama, username, password, level) VALUES ('$nama','$email','$password','siswa')";
    $result_user = mysqli_query($koneksi, $sql_user);

    if($result_user){
        $data_user = mysqli_query($koneksi, "SELECT LAST_INSERT_ID()");
        while($u = mysqli_fetch_array($data_user)){
            $id_user = $u[0];
        }


        

        $sql_pendaftar = "INSERT INTO pendaftar (nama, tmpt_lahir, tgl_lahir, jenis_kelamin, agama, alamat, email, telepon,users_id) 
        VALUES ('$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$alamat','$email','$telepon', '$id_user')";
        $result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);

        if ($result_pendaftar) {
            $_SESSION['pesan_registrasi'] = "Registrasi berhasil! Silahkan login menggunakan Email dan Password Anda!";
            echo '<script>window.location="../login.php"</script>';
            header('location:../login.php');
            die;
        } else {

        }

    } else {
        $_SESSION['pesan_registrasi'] = "Maaf, Akun sudah terdaftar! Gunakan email yang lain! ";
        echo '<script>window.location="../registrasi.php"</script>';
        header('location:../registrasi.php');
        die;
    }

} else {
    header('location:../registrasi.php');
}

?>