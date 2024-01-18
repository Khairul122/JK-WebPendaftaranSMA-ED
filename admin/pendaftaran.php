<?php include('../config/auto_load.php'); ?>
<?php include('../controller/admin_pendaftaran_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="text-gray-800">Data Pendaftar</h2>
  <!-- <hr> -->

  <div class="row">
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php
      if (isset($_SESSION['pesan_status'])  && $_SESSION['pesan_status'] <> '') {
        echo '<div class="alert alert-success text-center">' . $_SESSION['pesan_status'] . '</div>';

        // $_SESSION['pesan_status'] = '';
      }
      if (isset($_SESSION['pesan_hapus_berhasil'])  && $_SESSION['pesan_hapus_berhasil'] <> '') {
        echo '<div class="alert alert-success text-center">' . $_SESSION['pesan_hapus_berhasil'] . '</div>';

        // $_SESSION['pesan_status'] = '';
      }
      unset($_SESSION['pesan_status']);
      unset($_SESSION['pesan_hapus_berhasil']);



      ?>

    </div>

    <div class="col-md-12">
      <!-- Data Pendaftar-->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-black text-uppercase">Data pendaftar keseluruhan</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr align="center">
                  <th width="1%">No</th>
                  <th width="15%">Nama</th>
                  <th width="10%">Alamat</th>
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
                  } else if ($p['status'] == 1) {
                    $status = '<span class="badge badge-success">DITERIMA</span>';
                  } else if ($p['status'] == 2) {
                    $status = '<span class="badge badge-danger">DITOLAK</span>';
                  }

                ?>
                  <tr>
                    <td align="center"><?= $no++ ?></td>
                    <td class="text-left"><?= $p['nama'] ?></td>
                    <td align="center"><?= $p['alamat'] ?></td>
                    <td align="center"><?= $kelamin ?></td>
                    <td align="center"><?= $status ?></td>
                    <td align="center">
                      <a href="detailpendaftar.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm ">
                        <i class="fas fa-user-check"></i></a>
                      <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus_<?= $p['id'] ?>">
                        <i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>

                  <!-- Modal -->
                  <div class="modal fade" id="modalHapus_<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Anda akan menghapus data pendaftar atas nama "<?= $p['nama'] ?>",<br><b> DATA AKAN DIHAPUS PERMANEN.</b></p>
                        </div>
                        <div class="modal-footer">
                          <a href="<?= $base_url ?>/admin/pendaftaran.php?action=hapus&id=<?= $p['id'] ?>" class="btn btn-danger">Hapus</a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>

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