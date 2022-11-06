<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../../login.php');
  }
 ?>


 <!-- Select medicine data -->
 <?php

   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['medicine_id']))
   {

     $medicine_id = $_GET['medicine_id'];
     $shop_id     = $_GET['shop_id'];

     $sql     = "SELECT * FROM tb_medicine WHERE medicine_id = $medicine_id AND shop_id = $shop_id";

     $result  = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
         $name                  = $getData['name'];
         $phone                 = $getData['phone'];
         $shop_id               = $getData['shop_id'];
         $shop_code             = $getData['shop_code'];
         $shop_name             = $getData['shop_name'];
         $shop_location_details = $getData['shop_location_details'];
         $medicine_name         = $getData['medicine_name'];
         $medicine_type         = $getData['medicine_type'];
         $medicine_price        = $getData['medicine_price'];
         $medicine_added_date   = $getData['medicine_added_date'];
         $medicine_image        = $getData['medicine_image'];
     }
   }
  ?>




<!--Update medicine details -->
  <?php
    //$admin_username = $_SESSION['user_name'];
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['update']))
   {
         $medicine_id = $_GET['medicine_id'];
         $shop_id     = $_GET['shop_id'];

         $name                  = $getData['name'];
         $phone                 = $getData['phone'];
         $shop_id               = $getData['shop_id'];
         $shop_code             = $getData['shop_code'];
         $shop_name             = $getData['shop_name'];
         $shop_location_details = $getData['shop_location_details'];
         $medicine_name         = $getData['medicine_name'];
         $medicine_type         = $getData['medicine_type'];
         $medicine_price        = $getData['medicine_price'];
         $medicine_added_date   = $getData['medicine_added_date'];

         $medicine_image = $_FILES["medicine_image"]["name"];
         $tmp            = md5(time());

         if($medicine_image != "")
         {
           $dst    = "./medicine_images/".$tmp.$medicine_image;
           $dst_db = "medicine_images/".$tmp.$medicine_image;
           move_uploaded_file($_FILES["medicine_image"]["tmp_name"],$dst);

           $sql = "UPDATE tb_medicine SET name='$name',phone='$phone',shop_id='$shop_id',shop_code='$shop_code',shop_name='$shop_name',shop_location_details='$shop_location_details',medicine_name='$medicine_name',medicine_type='$medicine_type',medicine_price='$medicine_price',medicine_image='$dst_db',medicine_added_date='$medicine_added_date' WHERE medicine_id = $medicine_id";

           $update_row = $db->update($sql);
         }


          $sql = "UPDATE tb_medicine SET name='$name',phone='$phone',shop_id='$shop_id',shop_code='$shop_code',shop_name='$shop_name',shop_location_details='$shop_location_details',medicine_name='$medicine_name',medicine_type='$medicine_type',medicine_price='$medicine_price',medicine_added_date='$medicine_added_date' WHERE medicine_id = $medicine_id";

           $update_row = $db->update($sql);

         if($update_row)
         {
         ?>
         <script type="text/javascript">

           window.alert("Medicine details updated successfully.");
           window.location='view_medicine_details.php?shop_id=4';

         </script>
         <?php
         }
         else
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong!</div><br />';
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
  <title>Grand Health | Update Medicine Details</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
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
            <a href="add_shop.php" class="nav-link">
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
            <a href="shop_list.php" class="nav-link active">
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
            <h1>Update Medicine Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Update Medicine Details</li>
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
                <h3 class="card-title">Medicine Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">

                  <form action="" method="post" enctype="multipart/form-data" autocomplete="off">

                      <div class="form-row">
                        <div class="form-group col-lg-6">
                          <label for="email">Your Name *</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter Full Name"  name="name" value="<?php echo $name; ?>" required>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="phone">Phone *</label>
                          <input type="number" id="phone" class="form-control" placeholder="Your Phone Number" name="phone" value="<?php echo $phone; ?>" required>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-lg-3">
                          <label for="shop_id">Shop Id *</label>
                          <input type="text" id="shop_id" class="form-control" placeholder="Enter Shop Id"  name="shop_id" value="<?php echo $shop_id; ?>" required>
                        </div>
                        <div class="form-group col-lg-3">
                          <label for="shop_no">Shop Code *</label>
                          <input type="text" class="form-control" id="shop_code" name="shop_code" placeholder="Enter Shop Code" value="<?php echo $shop_code; ?>" required>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="shop_type">Shop Name *</label>
                          <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="Enter Shop Name." value="<?php echo $shop_name; ?>" required>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-lg-6">
                          <label for="medicine_name">Medicine Name *</label>
                          <input type="text" class="form-control" id="medicine_name" name="medicine_name" placeholder="Enter Medicine Name"  name="medicine_name" value="<?php echo $medicine_name; ?>" required>
                        </div>
                        <div class="form-group col-lg-6">
                          <label for="medicine_type">Medicine Type *</label>
                          <select class="form-control" name="medicine_type" required>
                            <option selected><?php echo $medicine_type; ?></option>
                            <option>Medicine</option>
                            <option>Insulin</option>
                            <option>Face Mask</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-lg-6">
                          <label for="medicine_price">Medicine Price *</label>
                          <input type="number" class="form-control" id="medicine_price" name="medicine_price" placeholder="Enter Medicine Price" value="<?php echo $medicine_price; ?>" required>
                        </div>
                        <div class="form-group col-lg-6">
                          <img src="<?php echo $medicine_image; ?>" height="100"><br>
                          <label for="medicine_image">Medicine Image *</label>
                          <input type="file" class="form-control" id="medicine_image" name="medicine_image">
                        </div>
                      </div>

                      <div class="form-group">
                          <label for="shop_location_details">Shop Address *</label>
                          <textarea rows="3" class="form-control" id="shop_location_details" name="shop_location_details" placeholder="Enter Shop Location Details" required><?php echo $shop_location_details; ?></textarea>
                      </div>

                      <div class="form-group col-lg-6">
                          <label for="medicine_added_date">Medicine Added Date *</label>
                          <input type="date" class="form-control" id="medicine_added_date" name="medicine_added_date" value="<?php echo $medicine_added_date; ?>" required>
                      </div>

                      <div class="form-group">
                        <input type="submit" name="update" class="btn btn-info" value="Save Changes">
                      </div>

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
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="../index.php">Grand Health</a>.</strong>
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
