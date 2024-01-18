<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Aplikasi Pendaftaran Siswa Baru Online - MA NU Sunan Giri Prigen plus Program Vokasional (Multimedia, Pariwisata & Perhotelan)">
  <meta name="author" content="Syaifuddin Zuhri">

  <title>Login Siswa Baru</title>

  <!-- Main CSS -->
  <link rel="stylesheet" type="text/css" href="assets/js/style/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assets/css/style2.css" rel="stylesheet">

</head>

<body>
  <div class="">
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-md-5 p-sm-1">
          <div class="card o-hidden border-0 shadow-lg my-4">
            <div class="card-body bg-light p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-md-12">
                  <div class="pl-5 pr-5 pt-4 pb-4">
                    <div class="text-center" class="text">
                      <img src="assets/img/logo-tutwuri.jpg" alt="Logo Aplikasi" class="img-logo">
                      <h1 class="h4 text-gray-900">Login Pendaftaran Siswa Baru</h1>
                      <h1 class="h4 text-gray-900"><b>SMAN 1 PARIANGAN</b></h1>
                      <h1 class="h5 text-gray-900"><b>KABUPATEN TANAH DATAR</b></h1>

                      <?php
                      session_start();

                      if (isset($_SESSION['pesan_registrasi']) && $_SESSION['pesan_registrasi'] <> '') {
                        echo '<div class="alert alert-success text-center">' . $_SESSION['pesan_registrasi'] . '</div>';
                      }

                      $_SESSION['pesan_registrasi'] = '';

                      if (isset($_SESSION['pesan_login']) && $_SESSION['pesan_login'] <> '') {
                        echo '<div class="alert alert-danger text-center">' . $_SESSION['pesan_login'] . '</div>';
                      }

                      $_SESSION['pesan_login'] = '';

                      if (isset($_SESSION['login_error']) && $_SESSION['login_error'] <> '') {
                        echo '<div class="alert alert-danger text-center">' . $_SESSION['login_error'] . '</div>';
                      }

                      $_SESSION['login_error'] = '';

                      if (isset($_SESSION['pesan_logout']) && $_SESSION['pesan_logout'] <> '') {
                        echo '<div class="alert alert-danger text-center">' . $_SESSION['pesan_logout'] . '</div>';
                      }

                      $_SESSION['pesan_logout'] = '';

                      session_destroy();
                      ?>

                    </div>
                    <form class="user" action="controller/login_control.php" method="POST">
                      <div class="form-group">
                        <input type="text" name="username" class="form-control form-control-user" id="username" required="" placeholder="Masukkan Username..." oninvalid="this.setCustomValidity('Masukkan username Anda!')" oninput="setCustomValidity('')">
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user " id="password" required="" placeholder="Masukkan Password..." oninvalid="this.setCustomValidity('Masukkan password Anda!')" oninput="setCustomValidity('')">

                        <!-- <div class="valid-feedback">
                          Looks good!
                        </div> -->
                      </div>
                      <!-- <div class="input-group mb-3 ml-2 input-group-sm">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="selectLevel">@</label>
                      </div>
                      <select class="custom-select mr-3" id="inputGroupSelect01">
                        <option selected>--- Pilih jenis user ---</option>
                        <option value="admin">Admin</option>
                        <option value="siswa">Siswa</option>
                      </select>
                    </div> -->
                      <input type="submit" name="btn_login" value="Login" class="btn btn-primary btn-user btn-block"></input>
                    </form>
                    <!-- <hr> -->

                    <!-- <div class="text-center">
                    <a class="medium" href="forgot.php">Lupa Password?</a>
                  </div> -->
                    <div class="text-center mt-2">
                      <a class="small"> Belum punya akun?
                        <a class="small" href="registrasi.php"> Registrasi Disini!</a>
                      </a>
                    </div>
                    <hr>
                    <marquee>SELAMAT DATANG DI WEBSITE PPDB ONLINE</marquee>
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
  <script src="assets/js/style/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/style/js/popper.min.js"></script>
  <script src="assets/js/style/js/bootstrap.min.js"></script>
  <!-- <script src="assets/js/style/js/main.js"></script> -->

  <!-- The javascript plugin to display page loading on top-->
  <script src="assets/js/style/js/plugins/pace.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>