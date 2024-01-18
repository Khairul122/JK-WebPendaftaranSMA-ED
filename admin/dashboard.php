<?php include('../config/auto_load.php'); ?>
<?php include('../controller/admin_dashboard_control.php'); ?>
<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="text-gray-800">Dashboard</h2>
  <!-- <hr> -->

  <div class="row">
    <!-- Pendaftar Masuk -->
    <div class="col-md-6 p-2">
      <div class="card border-left-black shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h4 font-weight-bold text-black text-uppercase mb-1">Pendaftar Masuk</div>
              <div class="h5 mt-3 mb-2 font-weight-bold">
                <?= mysqli_num_rows($jml_pendaftar) ?> Orang
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-black" role="progressbar" style="width: 22%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300" style="font-size: 70px"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Diterima -->
    <div class="col-md-6 p-2">
      <div class="card border-left-black shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h4 font-weight-bold text-black text-uppercase mb-1">siswa Diterima</div>
              <div class="h5 mt-3 mb-2 font-weight-bold">
                <?= mysqli_num_rows($jml_diterima) ?> Orang
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-black" role="progressbar" style="width: 10%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300" style="font-size: 70px"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="mb-3 mt-4">
  <h3 class="text-gray-800 mb-4">Data Pendaftar Baru</h3>

  <!-- Data Pendaftar-->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-black text-uppercase">Data pendaftar baru yang sudah melengkapi persyaratan validasi</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th width="2%">No</th>
              <th width="15%">Nama</th>
              <th width="15%">Alamat</th>
              <th width="5%">Nilai Bahasa Indonesia</th>
              <th width="5%">Nilai Bahasa Inggris</th>
              <th width="5%">Nilai MTK</th>
              <th width="5%">Nilai IPA</th>
              <th width="5%">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $no = 1;
            $pesan = "Data belum diisi!";

            while ($p = mysqli_fetch_array($all_pendaftar)) { ?>
              <tr>
                <td align="center"><?= $no++ ?></td>
                <td class="text-left"><?= $p['nama'] ?></td>
                <!-- <td><?= $p['tmpt_lahir'] ?>, <?= $p['tgl_lahir'] ?> </td> -->
                <td><?= $p['alamat'] ?></td>
                <!-- <td><?= $p['email'] ?></td> -->
                <!-- <td><?= $p['telepon'] ?></td> -->

                <?php if (!isset($p['nilai_indo'])) { ?>
                  <td class="text-danger" align="center"><?= $pesan ?></td>
                <?php } else { ?>
                  <td align="center"><?= $p['nilai_indo'] ?></td>
                <?php } ?>
                <?php if (!isset($p['nilai_inggris'])) { ?>
                  <td class="text-danger" align="center"><?= $pesan ?></td>
                <?php } else { ?>
                  <td align="center"><?= $p['nilai_inggris'] ?></td>
                <?php } ?>
                <?php if (!isset($p['nilai_mtk'])) { ?>
                  <td class="text-danger" align="center"><?= $pesan ?></td>
                <?php } else { ?>
                  <td align="center"><?= $p['nilai_mtk'] ?></td>
                <?php } ?>
                <?php if (!isset($p['nilai_ipa'])) { ?>
                  <td class="text-danger" align="center"><?= $pesan ?></td>
                <?php } else { ?>
                  <td align="center"><?= $p['nilai_ipa'] ?></td>
                <?php } ?>

                <td align="center"><span class="badge badge-info">BARU</span></td>
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
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>