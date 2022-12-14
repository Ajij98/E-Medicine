<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../../login.php');
  }
 ?>


 <!-- Add shop section -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['submit']))
   {

         $name                  = $_POST['name'];
         $email                 = $_POST['email'];
         $phone                 = $_POST['phone'];
         $shop_name             = $_POST['shop_name'];
         $about_shop            = $_POST['about_shop'];
         $shop_location         = $_POST['shop_location'];
         $shop_location_details = $_POST['shop_location_details'];
         $shop_added_date       = $_POST['shop_added_date'];
         $shop_oc_time          = $_POST['shop_oc_time'];
         $shop_contact          = $_POST['shop_contact'];
         $shop_code             = rand(100000, 999999);
         $shop_owner            = $user_name;
       

         $tmp         = md5(time());
         $shop_image  = $_FILES["shop_image"]["name"];
         $dst         = "./shop_images/".$tmp.$shop_image;
         $dst_db      = "shop_images/".$tmp.$shop_image;
         move_uploaded_file($_FILES["shop_image"]["tmp_name"],$dst);


         $sql = "INSERT INTO tb_shop(name,email,phone,shop_name,about_shop,shop_location,shop_location_details,shop_image,shop_added_date,shop_oc_time,shop_contact,shop_code,shop_owner,entry_time)values('$name','$email','$phone','$shop_name','$about_shop','$shop_location','$shop_location_details','$dst_db','$shop_added_date','$shop_oc_time','$shop_contact','$shop_code','$shop_owner','$current_datetime')";
         $insert_row = $db->insert($sql);

         if($insert_row)
         {
           ?>

           <script type="text/javascript">
             window.alert("Shop added successfully.");
             window.location='manage_shop.php';
           </script>

          <?php
         }
         else 
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong! Data not added.</div><br />';
           echo $msg;
           return false;
         }
   }

  ?>








<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Grand Health | Add Shop</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="icon/medicine_4.png">
  <link rel="icon" type="image/png" sizes="32x32" href="icon/medicine_4.png">
  <link rel="icon" type="image/png" sizes="16x16" href="icon/medicine_4.png">
  <link rel="manifest" href="icon/site.html">
  <link rel="mask-icon" href="icon/medicine_4.svg" color="#666666">
  <link rel="shortcut icon" href="icon/medicine_4.ico">

</head>
<body class="hold-transition sidebar-mini">
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
        <a href="../index.php" class="nav-link">Home</a>
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
    <a href="../index.php" class="brand-link">
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
            <a href="../index.php" class="nav-link">
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
            <a href="add_shop.php" class="nav-link active">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                Add Shop
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="manage_shop.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Manage Shop
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="shop_payment_history.php" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Shop Payment History
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="shop_list.php" class="nav-link">
              <i class="nav-icon fas fa-medkit"></i>
              <p>
                Add Medicine
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="customer_order.php" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Customer Order
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="shop_review.php" class="nav-link">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Shop</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Shop</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Shop Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">

                  <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Your Full Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="name" placeholder="Enter your full name" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="email" class="form-control" name="email"
                                                                    placeholder="Enter your email" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Phone</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" class="form-control" name="phone"
                                                                    placeholder="Enter 11 digits phone number" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Shop Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="shop_name"
                                                                    placeholder="Enter shop name" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">About Shop</label>
                                                                <div class="col-sm-10">
                                                                    <textarea rows="5" cols="5" class="form-control" name="about_shop"
                                                                    placeholder="Type somthing about your shop" required></textarea>
                                                                </div>
                                                            </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Shop Location</label>
                                                                    <div class="col-sm-10">
                                                                        <select class="form-control" name="shop_location" required>
                                                                            <option selected>Select restaurant location</option>
                                                                            <option>Muradpur</option>
                                                                            <option>2 No Gate</option>
                                                                            <option>New Market</option>
                                                                            <option>Agrabad</option>
                                                                            <option>Boddarhat</option>
                                                                            <option>GEC</option>
                                                                            <option>Chawkbazar</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                  <label class="col-sm-2 col-form-label">Shop Location Details</label>
                                                                  <div class="col-sm-10">
                                                                    <textarea class="form-control" name="shop_location_details" rows="2" required></textarea>
                                                                  </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                  <label class="col-sm-2 col-form-label">Shop Image</label>
                                                                  <div class="col-sm-10">
                                                                    <input type="file" class="form-control" name="shop_image" required>
                                                                  </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Shop Added Date</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="date" class="form-control" name="shop_added_date"
                                                                         required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Shop Opening-Closing Time</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" name="shop_oc_time"
                                                                        placeholder="Enter opening-closing time like (Monday - Wednessday, 10 AM - 12 PM)" required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Shop Contact</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="number" class="form-control" name="shop_contact"
                                                                        placeholder="Enter shop contact number" required>
                                                                    </div>
                                                                </div>

                                                                <input type="submit" class="btn btn-primary waves-effect waves-light" name="submit" value="Add Shop">

                                                                </form>

                </div>
                <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="../index.php">Grand Health</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <a href="../index.php"><i class="fas fa-home"></i> Home</a>
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
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
