<?php

$id_user = $_SESSION['id_users'];
$sql_pendaftar = "SELECT * FROM pendaftar WHERE users_id = '$id_user'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);

if (mysqli_num_rows($result_pendaftar)) {
    $data_pendaftar = mysqli_fetch_array($result_pendaftar);
    $id_pendaftar = $data_pendaftar['id'];

    $sql_nilai = "SELECT * FROM nilai WHERE pendaftar_id = '$id_pendaftar'";
    $result_nilai = mysqli_query($koneksi, $sql_nilai);

    if (mysqli_num_rows($result_nilai)) {
        $data_nilai = mysqli_fetch_array($result_nilai);
        $status = $data_nilai['status'];

        // echo "status : " . $status;
        // die;

    } else {
        //JIka belum ada nilai atau status, maka kosong
    }




    //Simpan data
    if (isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_nilai') {
        $indo = $_POST['nilai_indo'];
        $inggris = $_POST['nilai_inggris'];
        $mtk = $_POST['nilai_mtk'];
        $ipa = $_POST['nilai_ipa'];

        if (($indo < 1 || $indo > 100) || ($inggris < 1 || $inggris > 100) || ($mtk < 1 || $mtk > 100) || ($ipa < 1 || $ipa > 100)) {
            $_SESSION['pesan_nilai_gagal'] = "Nilai yang anda masukkan invalid!";
            header('location:../siswa/dashboard.php');
        } else {
            if (isset($_POST['id_nilai'])) {
                //UPDATE NILAI
                $id_nilai = $_POST['id_nilai'];
                $sql_update_nilai = "UPDATE nilai SET nilai_indo='$indo', nilai_inggris='$inggris', nilai_mtk='$mtk',nilai_ipa='$ipa' WHERE id='$id_nilai'";
                $query_update_nilai = mysqli_query($koneksi, $sql_update_nilai);

                if ($query_update_nilai) {
                    $_SESSION['pesan_nilai_sukses'] = "Data nilai berhasil diubah.";
                    header('location:../siswa/dashboard.php');
                } else {
                    echo "Error : " . mysqli_error($koneksi);
                    die;
                }
            } else {
                //INSERT NILAI
                if (($indo < 1 || $indo > 100) || ($inggris < 1 || $inggris > 100) || ($mtk < 1 || $mtk > 100) || ($ipa < 1 || $ipa > 100)) {
                    $_SESSION['pesan_nilai_gagal'] = "Nilai yang anda masukkan invalid!";
                    header('location:../siswa/dashboard.php');
                } else {
                    $sql_insert_nilai = "INSERT INTO nilai(nilai_indo, nilai_inggris, nilai_mtk,nilai_ipa, status, pendaftar_id) 
                    VALUES ('$indo', '$inggris', '$mtk','$ipa', 0, '$id_pendaftar') ";

                    $query_insert_nilai = mysqli_query($koneksi, $sql_insert_nilai);

                    if ($query_insert_nilai) {
                        $_SESSION['pesan_nilai_sukses'] = "Insert Data berhasil.";
                        header('location:../siswa/dashboard.php');
                    } else {
                        echo "Error : " . mysqli_error($koneksi);
                        die;
                    }
                }
            }
        }
    }
}
