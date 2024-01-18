<?php

$id_pendaftar = $_GET['id'];

$sql_pendaftar = "SELECT * FROM pendaftar where id='$id_pendaftar'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);
$data_pendaftar = mysqli_fetch_array($result_pendaftar);
 
if (!$result_pendaftar) {
    die('Query : ' . mysqli_error($koneksi));
}

$sql_nilai = "SELECT * FROM nilai where pendaftar_id='$id_pendaftar'";
$result_nilai = mysqli_query($koneksi, $sql_nilai);
$data_nilai = mysqli_fetch_array($result_nilai);
 
if (!$result_nilai) {
    die('Query : ' . mysqli_error($koneksi));
}

if(isset($_POST['simpan']) && $_POST['simpan'] == 'simpan_nilai'){
    $nilai = $_POST['nilai'];

    $sql_nilai = "UPDATE nilai SET status='$nilai' WHERE pendaftar_id='$id_pendaftar'";
    $query_nilai = mysqli_query($koneksi, $sql_nilai);

    if ($query_nilai) {
        $_SESSION['pesan_status'] = "Status pendaftar berhasil diubah!";
        echo '<script>window.location="../admin/pendaftaran.php"</script>';
        header('location:../admin/pendaftaran.php');
    } else {
        echo "Gagal update status pendaftar"; die;
    }
    

}   

?>