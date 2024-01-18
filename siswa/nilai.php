<?php include('../config/auto_load.php'); ?>

<?php include('../controller/siswa_nilai_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-left">Edit Nilai</h1>

    <div class="row">
        <div class="col-md-12">
            <?php


            ?>
        </div>
    </div>

    <!-- Data Nilai -->
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">EDIT DATA NILAI</h6>
            </div>
            <div class="card-body">
                <h6 class="text-left mt-1 mb-3 text-danger">* Ubah jika ada kesalahan!</h6>
                <form class="user" method="POST" action="<?= $base_url ?>/siswa/nilai.php">

                    <?php
                    if (isset($data_nilai)) {
                        $id_nilai = $data_nilai['id'];
                        echo "<input type='hidden' name='id_nilai' value='$id_nilai'>";
                    } else {
                        // echo "insert nilai";
                    }
                    ?>

                    <div class="form-group">
                        <label for="nilai_indo">Nilai Bahasa Indonesia</label>
                        <input type="text" name="nilai_indo" class="form-control form-control" id="nilai_indo" placeholder="Masukkan Nilai Bahasa Indonesia" value="<?php if (isset($data_nilai['nilai_indo'])) {
                                                                                                                                                                        echo $data_nilai['nilai_indo'];
                                                                                                                                                                    } ?>">
                    </div>

                    <div class="form-group">
                        <label for="nilai_inggris">Nilai Bahasa Inggris</label>
                        <input type="text" name="nilai_inggris" class="form-control form-control" id="nilai_inggris" placeholder="Masukkan Nilai Bahasa Inggris" value="<?php if (isset($data_nilai['nilai_inggris'])) {
                                                                                                                                                                            echo $data_nilai['nilai_inggris'];
                                                                                                                                                                        } ?>">
                    </div>

                    <div class="form-group">
                        <label for="nilai_mtk">Nilai MTK</label>
                        <input type="text" name="nilai_mtk" class="form-control form-control" id="nilai_mtk" placeholder="Masukkan Nilai Agama" value="<?php if (isset($data_nilai['nilai_mtk'])) {
                                                                                                                                                            echo $data_nilai['nilai_mtk'];
                                                                                                                                                        } ?>">
                    </div>

                    <div class="form-group">
                        <label for="nilai_ipa">Nilai IPA</label>
                        <input type="text" name="nilai_ipa" class="form-control form-control" id="nilai_ipa" placeholder="Masukkan Nilai IPA" value="<?php if (isset($data_nilai['nilai_ipa'])) {
                                                                                                                                                            echo $data_nilai['nilai_ipa'];
                                                                                                                                                        } ?>">
                    </div>

                    <div class="text-right">
                        <button type="submit" name="btn_simpan" value="simpan_nilai" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Simpan
                        </button>
                        <a href="dashboard.php" class="btn btn-danger" name="kembali">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>