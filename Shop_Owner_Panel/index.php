<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>



 <!-- New order count -->
 <?php
     $user_name = $_SESSION['user_name'];
     error_reporting( error_reporting() & ~E_NOTICE );
     $db = new Database();
     $current_date = date("Y-m-d");
     date_default_timezone_set('Asia/Dhaka');

     $sql  = "SELECT * FROM tb_order_medicine WHERE shop_owner = '$user_name' AND order_date = '$current_date'";
     $read_today_order = $db->select($sql);
     if($read_today_order)
     {
       $today_order = $read_today_order->num_rows;
     }
     else
     {
       $today_order = 0;
     }
    ?>



    <!-- Total order count -->
 <?php
     $user_name = $_SESSION['user_name'];
     error_reporting( error_reporting() & ~E_NOTICE );
     $db = new Database();
     $current_date = date("Y-m-d");
     date_default_timezone_set('Asia/Dhaka');

     $sql  = "SELECT * FROM tb_order_medicine WHERE shop_owner = '$user_name'";
     $read_total_order = $db->select($sql);
     if($read_total_order)
     {
       $total_order = $read_total_order->num_rows;
     }
     else
     {
       $total_order = 0;
     }
    ?>



    <!-- Total shop count -->
 <?php
     $user_name = $_SESSION['user_name'];
     error_reporting( error_reporting() & ~E_NOTICE );
     $db = new Database();
     $current_date = date("Y-m-d");
     date_default_timezone_set('Asia/Dhaka');

     $sql  = "SELECT * FROM tb_shop WHERE shop_owner = '$user_name'";
     $read_total_shop = $db->select($sql);
     if($read_total_shop)
     {
       $total_shop = $read_total_shop->num_rows;
     }
     else
     {
       $total_shop = 0;
     }
    ?>



    <!-- Total review count -->
 <?php
     $user_name = $_SESSION['user_name'];
     error_reporting( error_reporting() & ~E_NOTICE );
     $db = new Database();
     $current_date = date("Y-m-d");
     date_default_timezone_set('Asia/Dhaka');

     $sql  = "SELECT * FROM tb_shop_review WHERE shop_owner = '$user_name'";
     $read_total_review = $db->select($sql);
     if($read_total_review)
     {
       $total_review = $read_total_review->num_rows;
     }
     else
     {
       $total_review = 0;
     }
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Grand Health | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="icon/medicine_4.png">
  <link rel="icon" type="image/png" sizes="32x32" href="icon/medicine_4.png">
  <link rel="icon" type="image/png" sizes="16x16" href="icon/medicine_4.png">
  <link rel="manifest" href="icon/site.html">
  <link rel="mask-icon" href="icon/medicine_4.svg" color="#666666">
  <link rel="shortcut icon" href="icon/medicine_4.ico">

  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <h4><b style="font-family: 'Noto Serif', serif;"><img class="d-inline mb-1" src="icon/medicine_4.png" width="28" height="28"> <span class="text-primary">Grand Health</span></b><span class="text-danger">.BD</span></h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">User Name: <b><?php echo $_SESSION['user_name']; ?></b></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/add_shop.php" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                Add Shop
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/manage_shop.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Manage Shop
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/shop_payment_history.php" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Shop Payment History
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/shop_list.php" class="nav-link">
              <i class="nav-icon fas fa-medkit"></i>
              <p>
                Add Medicine
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/customer_order.php" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Customer Order
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/shop_review.php" class="nav-link">
              <i class="nav-icon fas fa-star"></i>
              <p>
                Shop Review
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a onclick="return confirm('Sure to logout?')" href="logout_owner.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Sign-Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $today_order; ?></h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="pages/customer_order.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $total_order; ?></h3>

                <p>Total Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="pages/customer_order.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo $total_shop; ?></h3>

                <p>Total Shop</p>
              </div>
              <div class="icon">
                <i class="ion ion-home"></i>
              </div>
              <a href="pages/manage_shop.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $total_review; ?></h3>

                <p>Unique Review</p>
              </div>
              <div class="icon">
                <i class="ion ion-star"></i>
              </div>
              <a href="pages/shop_review.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
  
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="index.html">Grand Health</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <a href="index.php"><i class="fas fa-home"></i> Home</a>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
