<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";
 ?>

 <!--User login section (USE BINARY KEYWORD FOR CASE SENSETIVE LOGIN INFORMATION)-->
 <?php
   $msg = "";
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
  if(isset($_POST['submit']))
  {
      $user_name = $_POST['user_name'];
      $password  = $_POST['password'];

      $sql = "SELECT * FROM tb_user WHERE BINARY user_name = '$user_name' AND BINARY password = '$password' LIMIT 1";

      $result = $db->link->query($sql) or die($this->link->error.__LINE__);

      if($result->num_rows != 0)
      {
        while($getData = $result->fetch_assoc())
        {
            $user_type = $getData['user_type'];
        }

        if($user_type == "Admin")
        {
            $_SESSION['user_name'] = $user_name;
            header('location:Admin_Panel/index.php');
        }
        else if($user_type == "Shop Owner")
        {
            $_SESSION['user_name'] = $user_name;
            header('location:Shop_Owner_Panel/index.php');
        }
        else if($user_type == "Customer")
        {
            $_SESSION['user_name'] = $user_name;
            header('location:Customer_Panel/index.php');
        }

      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissable w-100 m-auto" id="flash-msg"><strong>Error!</strong> Username or Password is incorrect.</div><br />';
      }
  }
  ?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Grand Health | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="login_registration_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="login_registration_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="login_registration_assets/dist/css/adminlte.min.css">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/icon/medicine_4.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/icon/medicine_4.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/icon/medicine_4.png">
  <link rel="manifest" href="assets/icon/site.html">
  <link rel="mask-icon" href="assets/icon/medicine_4.svg" color="#666666">
  <link rel="shortcut icon" href="assets/icon/medicine_4.ico">

  <!-- Fontawsome(v-4.7.0) -->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

  <!-- Google Font CDN -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">


</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php" class="logo">
      <h4><b style="font-family: 'Noto Serif', serif;"><img class="d-inline mb-1" src="assets/icon/medicine_4.png" width="28" height="28"> <span style="color: #445F84;">Grand Health</span></b><span class="text-danger">.BD</span></h4>
    </a>
  </div>
  <!-- /.login-logo -->

  <?php echo $msg; ?>

  <div class="card px-3 py-3">
    <div class="card-body login-card-body px-3 py-3">
      <p class="login-box-msg">Sign In Here!</p>

      <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="input-group mb-3">
          <input type="user_name" class="form-control" name="user_name" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Sign In" required>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Forgot password?</a>
      </p>
      <p class="mb-0">
        <a href="registration.php" class="text-center">Register a new membership.</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="login_registration_assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="login_registration_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="login_registration_assets/dist/js/adminlte.min.js"></script>
</body>
</html>
