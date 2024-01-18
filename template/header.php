<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <?php if ($_SESSION['level'] == 'siswa') { ?>
    <title>Dashboard Siswa Baru</title>
  <?php } ?>

  <?php if ($_SESSION['level'] == 'admin') { ?>
    <title>Dashboard Admin </title>
  <?php } ?>


  <!-- Gambar title -->

  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="../assets/js/style/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- css datepicker -->
  <link href="../assets/vendor/datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
  <link href="../assets/vendor/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon">
        </div>
        <div class="sidebar-brand-text mx-2">PPDB Online</div>
      </a>

      <!-- Heading -->
      <div class="sidebar-heading">
        <?= $_SESSION['level']; ?>
      </div>

        <?php if ($_SESSION['level'] == 'admin') { ?>
          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span><b>Dashboard</b></span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">     
          
          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
            <a class="nav-link" href="pendaftaran.php">
            <i class="fas fa-list"></i>
              <span><b>Data pendaftar</b></span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider my-0"> 

          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
            <a class="nav-link" href="laporan.php">
            <i class="fas fa-file-import"></i>
              <span><b>Laporan</b></span></a>
          </li>

       <?php } else if ($_SESSION['level'] == 'siswa')  { ?>


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><b>Dashboard</b></span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">     
        
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="nilai.php">
          <i class="fas fa-list ml-1"></i>
            <span><b>Nilai</b></span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0"> 

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="editprofile.php">
          <i class="fas fa-user-edit"></i>
            <span><b>Edit Profile</b></span></a>
        </li>
       <?php } ?>
          <!-- Divider -->
          <hr class="sidebar-divider my-0">  

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt ml-1"></i>
            <span><b>Log Out</b></span></a>
        </li>

      <!-- Divider -->
      <hr class="sidebar-divider">     

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar  -->
          <form class="d-none d-sm-inline-block mt-2">
            <div class="text-left">
                <?php 
                
                if ($_SESSION['level'] == 'siswa') {
                    $nama = $data_pendaftar['nama'];
                } else {
                    $nama = "Administrator";
                }
                ?>
                <h5>Selamat datang, 
                <b><?= $nama ?></b></h5>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=  $nama ?></span>
                <?php 
                if ($_SESSION['level'] == 'siswa') {
                    if ($data_pendaftar['foto'] != null) {
                        $foto = '../uploads/' . $data_pendaftar['foto'];
                    } else {
                        $foto = '../assets/img/avatar.png';
                    }
                }
                 else if ($_SESSION['level'] == 'admin') { 
                    
                    $foto = '../assets/img/avatar.png';
                } 
                ?>
                <img class="img-profile rounded-circle" src="<?= $foto ?>"  alt="fotoprofil">
                <i class="fas fa-caret-down ml-2"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= $base_url ?>/siswa/editprofile.php">
                  <i class="fas fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Profile
                </a>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
      <!-- End of Topbar -->
      