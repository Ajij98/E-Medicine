<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


 <!-- Select particular shop details -->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['order_id']))
   {

     $order_id = $_GET['order_id'];

     $sql = "SELECT * FROM tb_order_medicine WHERE order_id = $order_id";

     $result = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
       $order_id     = $getData['order_id'];
       $order_code   = $getData['order_code'];
       $order_date   = $getData['order_date'];
       $shop_id      = $getData['shop_id'];
       $shop_name    = $getData['shop_name'];
       $shop_address = $getData['shop_address'];
       $shop_owner   = $getData['shop_owner'];
     }
   }
  ?>



<!-- Review section -->
  <?php
    $user_name = $_SESSION['user_name'];
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_POST['submit']))
    {
            $return_code     = rand(100000, 999999);
            $return_date     = $_POST['return_date'];
            $order_id        = $_POST['order_id'];
            $order_code      = $_POST['order_code'];
            $order_date      = $_POST['order_date'];
            $shop_id         = $_POST['shop_id'];
            $shop_name       = $_POST['shop_name'];
            $shop_address    = $_POST['shop_address'];
            $shop_owner      = $shop_owner;
            $return_medicine = $_POST['return_medicine'];
            $return_by       = $user_name;

            $sql = "INSERT INTO tb_return_medicine(return_code,return_date,order_id,order_code,order_date,shop_id,shop_name,shop_address,shop_owner,return_medicine,return_by,entry_time)values('$return_code','$return_date','$order_id','$order_code','$order_date','$shop_id','$shop_name','$shop_address','$shop_owner','$return_medicine','$return_by','$current_datetime')";
            $insert_row = $db->insert($sql);

            if($insert_row)
            {
            ?>

            <script type="text/javascript">

              window.alert("Your medicine return request successfully. Thank You!");
              window.location="dashboard.php";

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Grand Health - Return Medicine</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">

    <!-- Fontawsome (Version: 4.7.0) -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icon/medicine_4.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icon/medicine_4.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icon/medicine_4.png">
    <link rel="manifest" href="assets/icon/site.html">
    <link rel="mask-icon" href="assets/icon/medicine_4.svg" color="#666666">
    <link rel="shortcut icon" href="assets/icon/medicine_4.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">

    <!-- Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left py-3">
                        <div>
                            <a href="dashboard.php">Back to Account</a>
                        </div><!-- End .header-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                          <li>
                              <a href="#">Links</a>
                              <ul>
                                  <li><a href="tel:#"><i class="icon-phone"></i>Call: +880 1840-516731</a></li>
                                  <li><a href="#"><i class="icon-envelope"></i>E-mail: rahat@gmail.com</a></li>
                                  <li><a href="#">Contact Us</a></li>
                              </ul>
                          </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="index.php" class="logo">
                            <h4><b style="font-family: 'Noto Serif', serif;"><img class="d-inline mb-1" src="assets/icon/medicine_4.png" width="28" height="28"> <span style="color: #445F84;">Grand Health</span></b><span class="text-danger">.BD</span></h4>
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#available_medicine" class="scroll-to">Buy Medicine</a>
                                </li>
                                <li>
                                    <a href="dashboard.php">My Account</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                          <a onclick="return confirm('Sure to logout?')" href="logout_customer.php">
                              <i class="icon-user"></i> Logout
                          </a>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="dashboard.php">My Account</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Return Medicine</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">

                          <div class="col-9 m-auto">

                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">

                                  <div class="row">
                                    <div class="col-sm-4">
                                      <label>Order Id *</label>
                                      <input type="text" name="order_id" class="form-control" value="<?php echo $order_id; ?>" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                      <label>Order Code *</label>
                                      <input type="text" name="order_code" class="form-control" value="<?php echo $order_code; ?>" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                      <label>Order Date *</label>
                                      <input type="date" name="order_date" class="form-control" value="<?php echo $order_date; ?>" readonly>
                                    </div>   
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <label>Shop Id *</label>
                                      <input type="text" name="shop_id" class="form-control" value="<?php echo $shop_id; ?>" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                      <label>Shop Name *</label>
                                      <input type="text" name="shop_name" class="form-control" value="<?php echo $shop_name; ?>" readonly>
                                    </div>   
                                    <div class="col-sm-4">
                                      <label>Shop Address *</label>
                                      <input type="text" name="shop_address" class="form-control" value="<?php echo $shop_address; ?>" readonly>
                                    </div> 
                                  </div>

                                  <label>Return Medicine *</label>
                                  <textarea class="form-control" name="return_medicine" rows="2" placeholder="Type your return medicine details..." required></textarea>

                                  <div class="row">
                                    <div class="col-sm-12">
                                      <label>Return Date *</label>
                                      <input type="date" name="return_date" class="form-control" required>
                                    </div>   
                                  </div>

                                  <input type="submit" name="submit" class="btn btn-primary btn-round" value="Return Now">

                                </form>

                          </div>

                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <footer class="footer footer-dark">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <a href="index.php" class="logo">
                                    <h4><b style="font-family: 'Noto Serif', serif;"><img class="d-inline mb-1" src="assets/icon/medicine_4.png" width="28" height="28"> <span style="color: #445F84;">Grand Health</span></b><span class="text-danger">.BD</span></h4>
                                </a>
                                <p>Drug shops and pharmacies, with their convenience, anonymity, and cost-savings (compared to private physicians), are an important source of health services. </p>

                                <div class="social-icons">
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div><!-- End .soial-icons -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">About Grand Health</a></li>
                                    <li><a href="#">How to shop on Grand Health</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Contact us</a></li>
                                    <li><a onclick="return confirm('Sure to logout?')" href="logout_customer.php">Logout</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="#">Money-back guarantee!</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Terms and conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Account Setting</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="dashboard.php">My Account</a></li>
                                    <li><a href="#">Sign Out</a></li>
                                    <li><a href="#">Help</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © <?php echo date("Y"); ?> Grand Health. All Rights Reserved.</p><!-- End .footer-copyright -->
                    <figure class="footer-payments">
                        <a href="index.php"><i class="fa fa-home"></i></a>
                    </figure><!-- End .footer-payments -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
        
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>


    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                    <nav class="mobile-nav">
                        <ul class="mobile-menu">
                            <li class="active">
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="index.php">Shop Now</a>
                            </li>
                            <li>
                                <a href="faq.php">FAQs</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact</a>
                            </li>
                            <li>
                                <a href="dashboard.php">My Account</a>
                            </li>
                        </ul>
                    </nav><!-- End .mobile-nav -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                    <nav class="mobile-cats-nav">
                        <ul class="mobile-cats-menu">
                          <li><a href="#">Computer & Laptop</a></li>
                          <li><a href="#">Smart Phones</a></li>
                          <li><a href="#">Televisions</a></li>
                          <li><a href="#">Camera</a></li>
                          <li><a href="#">Lighting</a></li>
                          <li><a href="#">Cooking</a></li>
                        </ul><!-- End .mobile-cats-menu -->
                    </nav><!-- End .mobile-cats-nav -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->
</html>
