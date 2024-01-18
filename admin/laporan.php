<?php include('../config/auto_load.php'); ?>
<?php include('../controller/admin_laporan_control.php'); ?>

<?php include('../template/header.php'); ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="text-gray-800">Laporan Pendaftaran</h2>
    <!-- <hr> -->

    <div class="row">
    </div>
    <div class="row">
      <div class="col-md-12">
              <!-- Data Pendaftar-->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-black text-uppercase">Laporan Pendaftar keseluruhan</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <div class="col-md-12 mb-3" align="right">
                      <a href="<?= $base_url ?>/cetak/data_pendaftar.php" class="btn btn-dark btn-sm">
                      <i class="fas fa-print"></i>
                      Cetak Semua</a>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr align="center">
                          <th width="1%">No</th>
                          <th width="15%">Nama</th>
                          <th width="15%">Alamat</th>
                          <th width="5%">Jenis Kelamin</th>
                          <th width="5%">Status</th>
                          <th width="5%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php

                        $no = 1;
                        $pesan = "Data belum diisi!";

                        while ($p = mysqli_fetch_array($all_pendaftar)) { 
                          if ($p['jenis_kelamin'] == 'L') {
                            $kelamin = "Laki-laki";
                          } else {
                            $kelamin = "Perempuan";
                          }
                          
                          if ($p['status'] == 0) {
                            $status = '<span class="badge badge-info">BARU</span>';
                          } else if($p['status'] == 1) {
                            $status = '<span class="badge badge-success">DITERIMA</span>';
                          } else if($p['status'] == 2) {
                            $status = '<span class="badge badge-danger">DITOLAK</span>';
                          }

                          ?>
                          <tr>
                            <td  align="center"><?= $no++ ?></td>
                            <td class="text-left"><?= $p['nama'] ?></td>
                            <td class="text-left"><?= $p['alamat'] ?></td>
                            <td align="center"><?= $kelamin ?></td>
                            <td align="center"><?= $status ?></td>
                            <td align="center">
                              <a href="<?= $base_url?>/cetak/detail_cetak.php?id=<?= $p['id'] ?>" class="btn btn-dark btn-sm">
                              <i class="fas fa-print"></i>
                              Cetak
                              </a>
                            </td>
                          </tr>    

                          <?php } 

                          if (mysqli_num_rows($all_pendaftar) == 0) {
                            echo "<tr><td colspan='8' align='center'><b>Belum ada pendaftar baru yang masuk</b</tr>";
                          }

                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
      </div>
   </div>
  </div>
  </div>
  <!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>

