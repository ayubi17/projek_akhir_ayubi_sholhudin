<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../Bootstrap-Admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../Bootstrap-Admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=produk">
          <i class="fas fa-fw fa--alt"></i>
          <span>Produk</span></a>
      </li>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php?page=pelanggan">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>Pelanggan</span></a>
      </li>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php?page=transaksi">
          <i class="fas fa-fw fa-money-alt"></i>
          <span>Transaksi</span></a>
      </li>
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
        <a class="nav-link" href="index.php?page=laporan">
          <i class="fas fa-fw fa-user-alt"></i>
          <span>Laporan</span></a>
      </li>


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
<!-- Title bar -->
   
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <div id="page-wrapper">
        <div id="page-inner">
            <?php
            if(isset($_GET['page'])){
                if($_GET['page']=="produk"){
                    include 'produk.php';
                }elseif($_GET['page']=="ubahproduk"){
                  include 'ubahproduk.php';
                }elseif($_GET['page']=="hapusproduk"){
                  include 'hapusproduk.php';
                }elseif($_GET['page']=="tambahproduk"){
                  include 'tambahproduk.php';
                }elseif($_GET['page']=="pelanggan"){
                  include 'pelanggan.php';
                }elseif($_GET['page']=="hapuspelanggan"){
                  include 'hapuspelanggan.php';
                }elseif($_GET['page']=="ubahpelanggan"){
                  include 'ubahpelanggan.php';
                }elseif($_GET['page']=="transaksi"){
                  include 'transaksi.php';
                }elseif($_GET['page']=="pembayaran"){
                  include 'pembayaran.php';
                }elseif($_GET['page']=="laporan"){
                  include 'laporan.php';
                }
            }
            ?>
        </div>
  </div>

</body>

</html>
