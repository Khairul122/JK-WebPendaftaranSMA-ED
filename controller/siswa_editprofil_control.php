<?php

$id_user = $_SESSION['id_users'];
$sql_pendaftar = "SELECT * FROM pendaftar WHERE users_id = '$id_user'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);

if (mysqli_num_rows($result_pendaftar)) {

    $data_pendaftar = mysqli_fetch_array($result_pendaftar);

    if (isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_profil') {

        $id_pendaftar = $data_pendaftar['id'];

        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = date("Y-m-d", strtotime($_POST['tanggal_lahir']));
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];

        //Cek gambar
        if ($_FILES['gambar']['name'] != '') {
            
            $ekstensi_diperbolehkan = array('jpg', 'png');
            $nama_gambar = $_FILES['gambar']['name'];
            $x = explode('.', $nama_gambar);
            $ekstensi = strtolower(end($x));
            $ukuran = $_FILES['gambar']['size'];
            $file_temp = $_FILES['gambar']['tmp_name'];

            $ubah_nama = $nama . '.' . $ekstensi;

            if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
                if ($ukuran < 1044070) {
                    if(move_uploaded_file($file_temp, '../uploads/'. $ubah_nama)){
                        $sql_update_profile = "UPDATE pendaftar SET foto = '$ubah_nama' where id='$id_pendaftar'";
                        $query_update_profile = mysqli_query($koneksi, $sql_update_profile);
                        if ($query_update_profile) {
                            
                        } else {
                            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database";
                            die;
                        }
                    } else {
                        echo "Maaf, Gambar gagal untuk diupload.";
                    }        
                    
                } else {
                    echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB"; 
                    echo "<br><br> <button type='button' onClick='history.back()'>Kembali</button>";
                    die;
                }
                
            } else {
                echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG."; 
                echo "<br><br> <button type='button' onClick='history.back()'>Kembali</button>";
                die;
            }

        }

        $sql_update = "UPDATE pendaftar SET nama='$nama', tmpt_lahir='$tempat_lahir', tgl_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin',
        agama='$agama', alamat='$alamat', email='$email', telepon='$telepon' WHERE id='$id_pendaftar'";

        $query_update = mysqli_query($koneksi, $sql_update);
        if ($query_update) {                
            $_SESSION['pesan_profil'] = "Edit Profil berhasil!";
            // echo '<script>window.location="dashboard.php"</script>';
            header('location:../siswa/dashboard.php');
        } else {
            echo "Gagal Update Data";
            die;
        }
        
    } 

}


?>