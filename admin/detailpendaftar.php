<?php include('../config/auto_load.php'); ?>
<?php include('../controller/admin_detailpendaftar_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h2 class="text-gray-800">Detail Pendaftar</h2>
    <!-- <hr> -->
    <div class="row">
        <!-- Data Pendaftar -->
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DATA PENDAFTAR</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <?php
                        if ($data_pendaftar['foto'] != NULL) {
                            $foto = '../uploads/' . $data_pendaftar['foto'];
                        } else {
                            $foto = '../assets/img/avatar.png';
                        }
                        ?>

                        <img src="<?= $foto ?>" alt="fotoprofil" class="img-fuild rounded-circle" style="width: 200px; height:200px">
                    </div>
                    <h5 class="text-center card-title mt-4 text-uppercase" style="color: black">

                        <b><?= $data_pendaftar['nama'] ?></b>

                    </h5>
                    <ul class="list-group">
                        <li class="list-group-item ">
                            <h6 class="mb-0" style="color: black"><b>Tempat, Tanggal Lahir</b></h6>
                            <small class="text-muted"><?= $data_pendaftar['tmpt_lahir'] ?>, <?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'])) ?></small>
                        </li>
                        <li class="list-group-item ">
                            <?php
                            if ($data_pendaftar['jenis_kelamin'] == 'L') {
                                $kelamin = "Laki-laki";
                            } else {
                                $kelamin = "Perempuan";
                            }
                            ?>
                            <h6 class="mb-0" style="color: black"><b>Jenis Kelamin</b></h6>
                            <small><?= $kelamin ?></small>
                        </li>
                        <li class="list-group-item ">
                            <h6 class="mb-0" style="color: black"><b>Agama</b></h6>
                            <small> <?= $data_pendaftar['agama'] ?> </small>
                        </li>
                        <li class="list-group-item ">
                            <h6 class="mb-0" style="color: black"><b>Alamat</b></h6>
                            <small> <?= $data_pendaftar['alamat'] ?> </small>
                        </li>
                        <li class="list-group-item ">
                            <h6 class="mb-0" style="color: black"><b>Email</b></h6>
                            <small><?= $data_pendaftar['email'] ?></small>
                        </li>
                        <li class="list-group-item ">
                            <h6 class="mb-0" style="color: black"><b>Telepon</b></h6>
                            <small><?= $data_pendaftar['telepon'] ?></small>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- Data Nilai -->
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DATA NILAI PENDAFTAR</h6>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <?php
                        if ($data_nilai['status'] == 0) {
                            echo '<div class="alert alert-warning">
                               Data pendaftar belum divalidasi
                           </div>';
                        } else if ($data_nilai['status'] == 1) {
                            echo '<div class="alert alert-warning">
                               Data pendaftar dinyatakan <b>DITERIMA</b>
                                 </div>';
                        } else if ($data_nilai['status'] == 2) {
                            echo '<div class="alert alert-warning">
                               Data pendaftar dinyatakan <b>DITOLAK</b>
                                 </div>';
                        }
                        ?>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h6 class="mb-0" style="color: black">Nilai Bahasa Indonesia</h6>
                                <small class="text-muted"> <?= $data_nilai['nilai_indo'] ?> </small>
                            </li>
                            <li class="list-group-item">
                                <h6 class="mb-0" style="color: black">Nilai Bahasa Inggris</h6>
                                <small class="text-muted"> <?= $data_nilai['nilai_inggris'] ?> </small>
                            </li>
                            <li class="list-group-item">
                                <h6 class="mb-0" style="color: black">Nilai MTK</h6>
                                <small class="text-muted"><?= $data_nilai['nilai_mtk'] ?></small>
                            </li>
                            <li class="list-group-item">
                                <h6 class="mb-0" style="color: black">Nilai IPA</h6>
                                <small class="text-muted"><?= $data_nilai['nilai_ipa'] ?></small>
                            </li>
                        </ul>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mt-3 btn-block" data-toggle="modal" data-target="#modalvalidasi">
                            <i class="fas fa-flag mr-2"></i>
                            Validasi Data Pendaftar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalvalidasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="<?= $base_url ?>/admin/detailpendaftar.php?id=<?= $id_pendaftar ?>" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Penilaian data pendaftar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <a href="" class="btn btn-success mr-3">Diterima</a>
                                          <a href="" class="btn btn-danger">Ditolak</a> -->

                                            <label for="nilai">Beri Penilaian</label>
                                            <select name="nilai" id="nilai" required class="form-control">
                                                <option value="">--Pilih--</option>
                                                <option value="1">Diterima</option>
                                                <option value="2">Ditolak</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button name="simpan" value="simpan_nilai" class="btn btn-primary">
                                                <i class="fas fa-save"></i>
                                                Simpan</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                <i class="fas fa-arrow-left"></i>
                                                Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="pendaftaran.php" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali ke halaman data pendaftar</span>
                </a>
            </div>
        </div>


    </div>

</div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>