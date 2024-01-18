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

        if (($indo <= 0 || $indo > 100) || ($inggris <= 0 || $inggris > 100) || ($mtk <= 0 || $mtk > 100) || ($ipa <= 0 || $ipa > 100)) {
            // $_SESSION['insert_nilai_gagal'] = "Insert nilai gagal! Silahkan masukkan nilai dengan benar!";
            echo "<script>alert('Insert nilai gagal!'): window.location='../siswa/dashboard.php'</script>";
            header('location:../siswa/dashboard.php');
            // echo('Masuk'); die;
        } else {
            // Menghitung rata-rata
            $rata = ($indo + $inggris + $mtk + $ipa) / 4;

            // Menetapkan status berdasarkan nilai_rata
            $status = ($rata >= 68) ? 1 : 2;

            $sql_insert_nilai = "INSERT INTO nilai(nilai_indo, nilai_inggris, nilai_mtk, nilai_ipa, nilai_rata, status, pendaftar_id) 
            VALUES ('$indo', '$inggris', '$mtk','$ipa', '$rata', '$status', '$id_pendaftar') ";

            $query_insert_nilai = mysqli_query($koneksi, $sql_insert_nilai);

            if ($query_insert_nilai) {
                $_SESSION['pesan_insert_nilai'] = "Insert data nilai berhasil!";
                echo '<script>window.location="../siswa/dashboard.php"</script>';
                header('location:../siswa/dashboard.php');
            } else {
                echo "Error : " . mysqli_error($koneksi);
                die;
            }
        }
    }

    //upload file

    if (isset($_POST['btn_upload']) && $_POST['btn_upload'] == 'simpan_nilai') {
        // Sesuaikan dengan koneksi database Anda
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "ppdb_online";

        $conn = new mysqli($host, $username, $password, $database);

        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi database gagal: " . $conn->connect_error);
        }

        // Loop melalui setiap file yang diunggah
        for ($i = 0; $i < count($_FILES['akta_kelahiran']['name']); $i++) {
            $akta_kelahiran = $_FILES['akta_kelahiran']['name'][$i];
            $kartu_keluarga = $_FILES['kartu_keluarga']['name'][$i];
            $ijazah_smp = $_FILES['ijazah_smp']['name'][$i];
            $surat_kelulusan = $_FILES['surat_kelulusan']['name'][$i];

            // Lakukan operasi upload ke direktori tujuan, misalnya uploads/
            $uploadDir = "../assets/berkas";
            move_uploaded_file($_FILES['akta_kelahiran']['tmp_name'][$i], $uploadDir . $akta_kelahiran);
            move_uploaded_file($_FILES['kartu_keluarga']['tmp_name'][$i], $uploadDir . $kartu_keluarga);
            move_uploaded_file($_FILES['ijazah_smp']['tmp_name'][$i], $uploadDir . $ijazah_smp);
            move_uploaded_file($_FILES['surat_kelulusan']['tmp_name'][$i], $uploadDir . $surat_kelulusan);

            $id_users = $_SESSION['id_users'];
            $tatus = 1;

            // Simpan informasi file ke dalam tabel berkas di database
            $sql = "INSERT INTO berkas (id_pendaftar, akta_kelahiran, kartu_keluarga, ijazah_smp, surat_kelulusan,status) 
                VALUES ('$id_users', '$akta_kelahiran', '$kartu_keluarga', '$ijazah_smp', '$surat_kelulusan','$status')";

            if ($conn->query($sql) === TRUE) {
                echo "Data berhasil disimpan.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}
