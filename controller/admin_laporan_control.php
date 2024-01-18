<?php

$all_pendaftar = mysqli_query($koneksi, "SELECT pendaftar.*, nilai.nilai_indo, nilai.nilai_inggris, nilai.nilai_mtk,nilai.nilai_ipa, nilai.status FROM pendaftar, nilai WHERE pendaftar.id = nilai.pendaftar_id");
// $all_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar");

//cek hasil
if (!$all_pendaftar) {
    die('Query error : ' . mysqli_error($koneksi));

}

if (isset($_GET['action']) && $_GET['action'] == 'hapus') {
    $id_pendaftar = $_GET['id'];
    $query_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id='$id_pendaftar'");
    if (mysqli_num_rows($query_pendaftar)) {
        
        $data_pendaftar = mysqli_fetch_array($query_pendaftar);
        $id_user = $data_pendaftar['users_id'];

        //Hapus Nilai
        $sql_hapus_nilai = mysqli_query($koneksi, "DELETE FROM nilai WHERE pendaftar_id = '$id_pendaftar'");
        

        //Hapus Foto pendaftar (unlink = mengahapus file)
        unlink('../uploads/' . $data_pendaftar['foto']);

        $sql_hapus_pendaftar = mysqli_query($koneksi, "DELETE FROM pendaftar WHERE id = '$id_pendaftar'");

        //Hapus di tabel user
        $sql_hapus_user = mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id_user'");

        if (!$sql_hapus_nilai || !$sql_hapus_pendaftar || !$sql_hapus_user) {
            die('Query error: ' . mysqli_error($koneksi));
        }

        // Simpan session
        $_SESSION['pesan_hapus_berhasil'] = "Data pendaftar berhasil dihapus!";
        echo '<script>window.location="../admin/pendaftaran.php"</script>';
        header('location:../admin/pendaftaran.php');
        



    } else {
        die('Data pendaftar tidak ditemukan!');
    }
}

?>