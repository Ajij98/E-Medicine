<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


 <!-- My order table data load -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db   = new Database();
   $sql  = "SELECT * FROM tb_order_medicine WHERE order_by = '$user_name'";
   $read_my_order = $db->select($sql);
  ?>



<!-- My order table data load -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db   = new Database();
   $sql  = "SELECT * FROM tb_return_medicine WHERE return_by = '$user_name'";
   $read_return_medicine = $db->select($sql);
  ?>





<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Grand Health - My Account</title>
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
                            <a href="index.php">Back to Home</a>
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
            <div class="page-header text-center" style="background-image: url('assets/images/medi_shop/bg_1.jpg')">
                <div class="container">
                    <h1 class="page-title" style="color: white;">My Account</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="dashboard">
                    <div class="container">
                        <div class="row">
                            <aside class="col-md-4 col-lg-2">
                                <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">My Order History</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-return-link" data-toggle="tab" href="#tab-return" role="tab" aria-controls="tab-return" aria-selected="false">Return History</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" onclick="return confirm('Sure to logout?')" href="logout_customer.php">Sign Out</a>
                                    </li>
                                </ul>
                            </aside><!-- End .col-lg-3 -->

                            <div class="col-md-8 col-lg-10">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                        <p>Hello! <?php echo $_SESSION['user_name']; ?>.</p>
                                    </div><!-- .End .tab-pane -->

                                    <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                      <table class="table table-cart table-mobile" id="my_order_table">
                                        <thead>
                                          <tr>
                                            <th>Order Id</th>
                                            <th>Order Code</th>
                                            <th>Ordered Medicine 'or' Pescription Image</th>
                                            <th>Order Date</th>
                                            <th>Shop Id</th>
                                            <th>Shop Name</th>
                                            <th>Shop Address</th>
                                            <th>Shop Owner</th>
                                            <th>Order Verify Status</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>

                                        <tbody>

                                          <?php if($read_my_order){ $i = 0; ?>
                                          <?php while($result = $read_my_order->fetch_assoc()){ $i = $i + 1; ?>
                                          <tr>
                                            <td class="text-success" style="font-weight: bold;"><?php echo "Order Id-".$result['order_id']; ?></td>
                                            <td><?php echo $result['order_code']; ?></td>
                                            <td>
                                                <?php echo $result['medicine']; ?>
                                                <img src="<?php echo $result['pescription_image']; ?>" height="80" alt="Pescription_image">
                                            </td>
                                            <td><?php echo $result['order_date']; ?></td>
                                            <td><?php echo "Shop Id-".$result['shop_id']; ?></td>
                                            <td><?php echo $result['shop_name']; ?></td>
                                            <td><?php echo $result['shop_address']; ?></td>
                                            <td><?php echo $result['shop_owner']; ?></td>
                                            <td>
                                                <?php
                                                    $order_verify_status = $result['order_verify_status'];

                                                    if($order_verify_status == 1)
                                                                                            {
                                                        $msg = '<div class="m-auto badge badge-success">Order Confirmed</div><br />';
                                                            echo $msg;
                                                    }
                                                    else
                                                    {
                                                        $msg = '<div class="m-auto badge badge-danger">Pending...</div><br />';
                                                            echo $msg;
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                              <a onclick="return confirm('Sure to return medicine?')" href="return_medicine.php?order_id=<?php echo $result['order_id']; ?>" title="return medicine" class="btn btn-primary btn-rounded mr-3">Return Medicine</a>
                                            </td>
                                            <td>
                                              <a onclick="return confirm('Sure to delete order?')" href="delete_data.php?order_id=<?php echo $result['order_id']; ?>" title="cancel order" class="btn-remove d-inline"><i class="fa fa-trash-o text-danger"></i></a>
                                            </td>
                                          </tr>
                                          <?php } ?>
                                          <?php }else{ ?>
                                          <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                                          echo $msg; ?>
                                          <?php } ?>

                                        </tbody>
                                      </table><!-- End .table table-wishlist -->
                                    </div><!-- .End .tab-pane -->


                                    <div class="tab-pane fade" id="tab-return" role="tabpanel" aria-labelledby="tab-return-link">
                                      <table class="table table-cart table-mobile" id="my_order_table">
                                        <thead>
                                          <tr>
                                            <th>Return Id</th>
                                            <th>Return Code</th>
                                            <th>Return Medicine</th>
                                            <th>Return Date</th>
                                            <th>Order Id</th>
                                            <th>Order Code</th>
                                            <th>Order Date</th>
                                            <th>Shop Id</th>
                                            <th>Shop Name</th>
                                            <th>Shop Address</th>
                                            <th>Shop Owner</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>

                                        <tbody>

                                          <?php if($read_return_medicine){ $i = 0; ?>
                                          <?php while($result = $read_return_medicine->fetch_assoc()){ $i = $i + 1; ?>
                                          <tr>
                                            <td class="text-success" style="font-weight: bold;"><?php echo "Return Id-".$result['return_id']; ?></td>
                                            <td><?php echo $result['return_code']; ?></td>
                                            <td><?php echo $result['return_medicine']; ?></td>
                                            <td><?php echo $result['return_date']; ?></td>
                                            <td><?php echo "Order Id-".$result['order_id']; ?></td>
                                            <td><?php echo $result['order_code']; ?></td>
                                            <td><?php echo $result['order_date']; ?></td>
                                            <td><?php echo "Shop Id-".$result['shop_id']; ?></td>
                                            <td><?php echo $result['shop_name']; ?></td>
                                            <td><?php echo $result['shop_address']; ?></td>
                                            <td><?php echo $result['shop_owner']; ?></td>
                                            <td>
                                              <a onclick="return confirm('Sure to delete this return history?')" href="delete_data.php?return_id=<?php echo $result['return_id']; ?>" title="cancel order" class="btn-remove d-inline"><i class="fa fa-trash-o text-danger"></i></a>
                                            </td>
                                          </tr>
                                          <?php } ?>
                                          <?php }else{ ?>
                                          <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                                          echo $msg; ?>
                                          <?php } ?>

                                        </tbody>
                                      </table><!-- End .table table-wishlist -->
                                    </div><!-- .End .tab-pane -->


                                    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>First Name *</label>
                                                    <input type="text" class="form-control" required>
                                                </div><!-- End .col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <label>Last Name *</label>
                                                    <input type="text" class="form-control" required>
                                                </div><!-- End .col-sm-6 -->
                                            </div><!-- End .row -->

                                            <label>Display Name *</label>
                                            <input type="text" class="form-control" required>
                                            <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

                                            <label>Email address *</label>
                                            <input type="email" class="form-control" required>

                                            <label>Current password (leave blank to leave unchanged)</label>
                                            <input type="password" class="form-control">

                                            <label>New password (leave blank to leave unchanged)</label>
                                            <input type="password" class="form-control">

                                            <label>Confirm new password</label>
                                            <input type="password" class="form-control mb-2">

                                        <input type="submit" class="btn btn-primary btn-round" value="Save Changes">

                                        </form>
                                    </div><!-- .End .tab-pane -->
                                </div>
                            </div><!-- End .col-lg-9 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .dashboard -->
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

            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="megamenu-container active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="index.php">Buy Medicine</a>
                                </li>
                                <li>
                                    <a href="dashboard.php">My Account</a>
                                </li>
                </ul>
            </nav><!-- End .mobile-nav -->

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
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- JQuery datatable plugin (js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
</body>


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->
</html>

<!-- My Order Table JS -->
<script>

  $(document).ready(function() {
    var table = $('#my_order_table').DataTable( {
        lengthChange: true,
    } );

    table.buttons().container()
        .appendTo( '#my_order_table_wrapper .col-md-6:eq(0)' );
  } );

</script>

<!-- My Product Table JS -->
<script>

  $(document).ready(function() {
    var table = $('#my_product_table').DataTable( {
        lengthChange: true,
    } );

    table.buttons().container()
        .appendTo( '#my_product_table_wrapper .col-md-6:eq(0)' );
  } );

</script>

<!-- Payment History Table JS -->
<script>

  $(document).ready(function() {
    var table = $('#payment_history_table').DataTable( {
        lengthChange: true,
    } );

    table.buttons().container()
        .appendTo( '#payment_history_table_wrapper .col-md-6:eq(0)' );
  } );

</script>
