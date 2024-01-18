<!-- <?php include('../controller/siswa_editprofil_control.php'); ?> -->


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Aplikasi Pendaftaran Siswa Baru Online - MA NU Sunan Giri Prigen plus Program Vokasional (Multimedia, Pariwisata & Perhotelan)">
  <meta name="author" content="Syaifuddin Zuhri">

  <title>Registrasi Siswa Baru</title>

  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="assets/js/style/css/main.css">

  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assets/css/style2.css" rel="stylesheet">

  <!-- Style Css Manual-->
  <style>

  </style>

</head>

<body>
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-12">
                <div class="p-5">
                  <div class="text-center">
                    <img src="assets/img/logo-tutwuri.jpg" alt="Logo Aplikasi" class="img-logo-regis">
                    <h1 class="h4 text-gray-900">Registrasi Siswa Baru</h1>
                    <h1 class="h4 text-gray-900"><b>SMAN 1 PARIANGAN</b></h1>
                    <h1 class="h5 text-gray-900"><b>KABUPATEN TANAH DATAR</b></h1>

                    <?php
                    session_start();

                    if (isset($_SESSION['pesan_registrasi']) && $_SESSION['pesan_registrasi'] <> '') {
                      echo '<div class="alert alert-danger text-center">' . $_SESSION['pesan_registrasi'] . '</div>';
                    }

                    $_SESSION['pesan_registrasi'] = '';

                    session_destroy();
                    ?>

                  </div>
                  <form class="user" action="controller/registrasi_control.php" method="POST">
                    <div class="form-group">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control form-control" required="" id="nama" placeholder="Nama Anda" oninvalid="this.setCustomValidity('Masukkan nama Anda!')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control form-control" required="" id="tempt_lahir" placeholder="Tempat Lahir Anda" oninvalid="this.setCustomValidity('Masukkan tempat lahir Anda!')" oninput="setCustomValidity('')">
                      </div>
                      <div class="col-md-6">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control form-control" required="" id="tgl_lahir" oninvalid="this.setCustomValidity('Masukkan tanggal lahir Anda!')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label>Jenis Kelamin</label>
                        <div class="form-check">
                          <input type="radio" name="jenis_kelamin" value="L" class="form-check-input" id="laki">
                          <label for="laki" class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" name="jenis_kelamin" value="P" class="form-check-input" id="perempuan">
                          <label for="perempuan" class="form-check-label">Perempuan</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-control" required="" oninvalid="this.setCustomValidity('Masukkan agama Anda!')" oninput="setCustomValidity('')">
                          <option valuerequired="">Pilih Agama</option>
                          <option value="islam">Islam</option>
                          <option value="kristen">Kristen</option>
                          <option value="katolik">Katolik</option>
                          <option value="hindu">Hindu</option>
                          <option value="budha">Budha</option>
                          <option value="konghucu">Konghucu</option>
                        </select>
                      </div>

                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea name="alamat" id="alamat" class="form-control" required="" oninvalid="this.setCustomValidity('Masukkan alamat Anda!')" oninput="setCustomValidity('')"></textarea>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required="" placeholder="Email" oninvalid="this.setCustomValidity('Masukkan email Anda!')" oninput="setCustomValidity('')">
                      </div>
                      <div class="col-md-6">
                        <label for="telepon">Telepon</label>
                        <input type="text" name="telepon" id="telepon" class="form-control" required="" placeholder="Telepon" oninvalid="this.setCustomValidity('Masukkan nomor telepon Anda!')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required="" placeholder="Password" oninvalid="this.setCustomValidity('Masukkan password Anda!')" oninput="setCustomValidity('')">
                      </div>
                      <div class="col-md-6">
                        <label for="ulangi_password">Ulangi Password</label>
                        <input type="password" name="ulangi_password" id="ulangi_password" class="form-control" required="" placeholder="Ulangi Password" oninvalid="this.setCustomValidity('Masukkan password ulang!')" oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <?php
                    if (isset($data_pendaftar['foto'])) {
                      $foto = '../uploads/' . $data_pendaftar['foto'];
                    } else {
                      $foto = '../assets/img/avatar.png';
                    }
                    ?>
                    <!-- <div class="form-group row">
                    <label for="upload_gambar">Upload Foto Profil</label> -->

                    <!-- <div class="col-md-12">
                      <form action="aksi.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <input type="submit" name="upload" value="Upload">
                      </form>
                    </div>
                    </div> -->

                    <input type="submit" name="btn_registrasi" value="Registrasi" class="btn btn-primary btn-user btn-block"></input>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small">Sudah punya akun?
                      <a class="small" href="login.php">Login Disini!</a>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Essential javascripts for application to work-->
  <!-- <script src="assets/js/style/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/style/js/popper.min.js"></script>
  <script src="assets/js/style/js/bootstrap.min.js"></script>
  <script src="assets/js/style/js/main.js"></script> -->
  <!-- The javascript plugin to display page loading on top-->
  <!-- <script src="assets/js/style/js/plugins/pace.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>