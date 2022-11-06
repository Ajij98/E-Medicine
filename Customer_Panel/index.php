<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>



 <!-- Read All Shop -->
 <?php
   $db   = new Database();
   $sql  = "SELECT * FROM tb_shop WHERE shop_verify_status = 1";
   $read_all_shop = $db->select($sql);
  ?>



  <!--Top Selling Shop cart data load-->
 <?php
   $current_datetime = date("Y-m-d");
   $db   = new Database();
   $sql  = "SELECT DISTINCT shop_id, shop_name, shop_address, shop_image FROM tb_order_medicine";
   $read_topselling_shop = $db->select($sql);
  ?>



  <!-- Particular shop cart data load -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_POST['search']))
    {

      $shop_name     = $_POST['shop_name'];
      $shop_location = $_POST['shop_location'];

      $sql  = "SELECT * FROM tb_shop WHERE shop_verify_status = 1 AND shop_name = '$shop_name' AND shop_location = '$shop_location'";
      $read_all_shop = $db->select($sql);

    }
   ?>

   <!-- View All Shop -->
   <?php
     if(isset($_POST['view_all']))
     {
       $db   = new Database();
       $sql  = "SELECT * FROM tb_shop WHERE shop_verify_status = 1";
       $read_all_shop = $db->select($sql);
     }
    ?>






<!DOCTYPE html>
<html lang="en">


<!-- molla/index-10.html  22 Nov 2019 09:58:04 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Grand Health - Home</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
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
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-10.css">
    <link rel="stylesheet" href="assets/css/demos/demo-10.css">

    <!-- Fontawsome(v-4.7.0) -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">


</head>

<body>
    <div class="page-wrapper">
        <header class="header header-8">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <div class="header-dropdown">
                            <li><a href="tel:#"><i class="icon-phone"></i>Call: +880 1840-516731</a></li>
                        </div><!-- End .header-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a onclick="return confirm('Sure to logout?')" href="logout_customer.php"><i class="icon-user"></i>Logout</a></li>
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
                            <h4><b style="font-family: 'Noto Serif', serif;"><img class="d-inline mb-1" src="assets/icon/medicine_4.png" width="28" height="28"> <span class="text-primary">Grand Health</span></b><span class="text-danger">.BD</span></h4>
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul">Shop</a>

                                    <ul>
                                        <li>
                                            <a href="#all_shop" class="scroll-to">All Shop</a>
                                        </li>
                                        <li>
                                            <a href="#top_selling_shop" class="scroll-to">Top Selling Shop</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                                <li>
                                    <a href="dashboard.php">My Account</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->

                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
            <div class="container">
                <div class="intro-slider-container slider-container-ratio mb-2">
                    <div class="intro-slider owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false}'>
                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)" srcset="assets/images/medi_shop/3.jpg">
                                    <img src="assets/images/medi_shop/bg_4.jpg" alt="Image Desc">
                                </picture>
                            </figure><!-- End .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">Welcome to Grand Health.</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title text-white">We care about your health!</h1><!-- End .intro-title -->

                                <a href="#all_shop" class="scroll-to btn btn-white-primary btn-round mt-3">
                                    <span>SHOP NOW</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)" srcset="assets/images/medi_shop/5.jpg">
                                    <img src="assets/images/medi_shop/bg_5.jpg" alt="Image Desc">
                                </picture>
                            </figure><!-- End .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">Welcome to Grand Health.</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title text-white">We care about your health!</h1><!-- End .intro-title -->

                                <a href="#all_shop" class="scroll-to btn btn-white-primary btn-round mt-3">
                                    <span>SHOP NOW</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)" srcset="assets/images/medi_shop/2.jpg">
                                    <img src="assets/images/medi_shop/bg_2.jpg" alt="Image Desc">
                                </picture>
                            </figure><!-- End .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">Welcome to Grand Health.</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title text-white">We care about your health!</h1><!-- End .intro-title -->

                                <a href="#all_shop" class="scroll-to btn btn-white-primary btn-round mt-3">
                                    <span>SHOP NOW</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->
                    </div><!-- End .intro-slider owl-carousel owl-simple -->
                    <span class="slider-loader"></span><!-- End .slider-loader -->
                </div><!-- End .intro-slider-container -->
            </div><!-- End .container -->

            <div class="banner-group">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="banner banner-overlay">
                                        <a href="#">
                                            <img src="assets/images/medi_shop/1.jpg" alt="Banner">
                                        </a>

                                        <div class="banner-content banner-content-right">
                                            <h4 class="banner-subtitle"><a href="#">Grand Health</a></h4><!-- End .banner-subtitle -->
                                            <h3 class="banner-title text-white"><a href="#"></a></h3><!-- End .banner-title -->
                                            <a href="#all_shop" class="scroll-to btn btn-outline-white banner-link btn-round">Shop Now</a>
                                        </div><!-- End .banner-content -->
                                    </div><!-- End .banner -->
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <div class="banner banner-overlay banner-overlay-light">
                                        <a href="#">
                                            <img src="assets/images/medi_shop/bg_3.jpg" alt="Banner">
                                        </a>

                                        <div class="banner-content">
                                            <h4 class="banner-subtitle bright-black"><a href="#">Grand Health</a></h4><!-- End .banner-subtitle -->
                                            <a href="#all_shop" class="scroll-to btn btn-outline-gray banner-link btn-round">Shop Now</a>
                                        </div><!-- End .banner-content -->
                                    </div><!-- End .banner -->
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="banner banner-large banner-overlay d-none d-sm-block">
                                <a href="#">
                                    <img src="assets/images/medi_shop/bg_1.jpg" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-white"><a href="#">Grand Health</a></h4><!-- End .banner-subtitle -->
                                    <a href="#all_shop" class="scroll-to btn btn-outline-white banner-link btn-round">Shop Now</a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-8 -->

                        <div class="col-lg-4 d-sm-none d-lg-block">
                            <div class="banner banner-middle banner-overlay">
                                <a href="#">
                                    <img src="assets/images/medi_shop/6.jpg" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-bottom">
                                    <h4 class="banner-subtitle text-white"><a href="#">Grand Health</a></h4><!-- End .banner-subtitle -->
                                    <a href="#all_shop" class="scroll-to btn btn-outline-white banner-link btn-round">Shop Now</a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .banner-group -->

            <div class="bg-light pt-5 pb-10 mb-3" id="top_selling_shop">
                <div class="container">
                    <div class="heading heading-center mb-3">
                        <h2 class="title-lg">Top Selling Shop</h2><!-- End .title -->

                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
                            </li>
                        </ul>
                    </div><!-- End .heading -->

                    <div class="tab-content tab-content-carousel">
                        <div class="tab-pane tab-pane-shadow p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                            <div class="owl-carousel owl-simple carousel-equal-height" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 0,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1200": {
                                            "items":4,
                                            "nav": true
                                        }
                                    }
                                }'>

                                <?php if($read_topselling_shop){ ?>
                                <?php while($result = $read_topselling_shop->fetch_assoc()){ ?>

                                <div class="product product-3 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-primary">Top Sale</span>
                                        <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>">
                                                <img src="<?php echo "../Shop_Owner_Panel/pages/".$result['shop_image']; ?>" alt="Shop image" class="product-image">
                                            </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        </div><!-- End .product-action-vertical -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Grand Health</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>"><?php echo $result['shop_name']; ?></a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $result['shop_address']; ?></span>
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->

                                    <div class="product-footer">
                                        <div class="ratings-container">

                                                <!-- Total Review count -->
                                                 <?php
                                                     $shop_id = $result['shop_id'];
                                                     $db   = new Database();
                                                     $sql  = "SELECT * FROM tb_shop_review WHERE shop_id = $shop_id";
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

                                                        <!-- Total rating value count -->
                                                    <?php
                                                       $shop_id = $result['shop_id'];
                                                       $db   = new Database();
                                                       $sql  = "SELECT sum(rating_value)rating_value FROM tb_shop_review WHERE shop_id = $shop_id";
                                                       $sum_of_rating_value = $db->select($sql);

                                                       while($getData = $sum_of_rating_value->fetch_assoc())
                                                       {
                                                         $total_rating = $getData['rating_value'];
                                                       }
                                                    ?>

                                                        <!-- Average rating value count -->
                                                    <?php 
                                                      error_reporting( error_reporting() & ~E_NOTICE );
                                                      if ($total_rating == 0 AND $total_review == 0) 
                                                      {
                                                        $avg_rating = 0;
                                                      }
                                                      else
                                                      {
                                                        $avg_rating = (int) ($total_rating/$total_review);
                                                      }

                                                     ?>



                                                        <!-- Put rating strat -->
                                                     <?php 

                                                        if($avg_rating == 0)
                                                        {
                                                          ?>

                                                            <i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                          <?php
                                                        }
                                                        else if($avg_rating == 1)
                                                        {
                                                          ?>

                                                            <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                          <?php
                                                        }
                                                        else if($avg_rating == 2)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($avg_rating == 3)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($avg_rating == 4)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($avg_rating >= 5)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i>

                                                            <?php
                                                        }

                                                       ?>

                                                <span class="ratings-text">( <?php echo $total_review; ?> Reviews )</span>
                                            </div><!-- End .rating-container -->

                                        <div class="product-action">
                                            <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>" class="btn-product btn-cart"><span>Shop Now</span></a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-footer -->
                                </div><!-- End .product -->

                                <?php } ?>
                                <?php }else{ ?>
                                <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                                    echo $msg; ?>
                                <?php } ?>
                                
                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .container -->
            </div><!-- End .bg-light -->


            <div class="mb-4" id="all_shop"></div><!-- End .mb-4 -->

            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg mb-2">All Shop</h2><!-- End .title-lg text-center -->

                    <div class="col-12 m-auto">
                    
                        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">

                        <div class="form-row">
                            <div class="form-group col-5">
                              <label for="shop_name">Shop Name *</label>
                              <input type="text" class="form-control" name="shop_name" required="">
                            </div>
                            <div class="form-group col-5">
                              <label for="shop_location">Select Shop Location *</label>
                              <select class="form-control" name="shop_location" required>
                                <option selected></option>
                                <option>Agrabad</option>
                                <option>JEC</option>
                                <option>Muradpur</option>
                                <option>2 No Gate</option>
                                <option>Chawkbazar</option>
                                <option>Gulpahar Mur</option>
                              </select>
                            </div>
                            <div class="form-group col-2">
                              <input type="submit" class="btn" style="background-color: #333333; color: white; margin-top: 36px;" class="form-control" name="search" value="Search">
                            </div>
                        </div>
                        
                    </form>

                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-row">
                            <div class="form-group col-12">
                              <input type="submit" class="btn" style="background-color: #333333; color: white;" class="form-control" name="view_all" value="View All">
                            </div>
                        </div>
                    </form>

                </div>

                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
                        </li>
                    </ul>
                </div><!-- End .heading -->

                <div class="tab-content">
                    <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                        <div class="products just-action-icons-sm">
                            <div class="row">

                                <?php if($read_all_shop){ ?>
                                <?php while($result = $read_all_shop->fetch_assoc()){ ?>

                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product product-3 text-center">
                                        <figure class="product-media">
                                            <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>">
                                                <img src="<?php echo "../Shop_Owner_Panel/pages/".$result['shop_image']; ?>" alt="Shop image" class="product-image">
                                            </a>
                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            </div><!-- End .product-action-vertical -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">Grand Health</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>"><?php echo $result['shop_name']; ?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $result['shop_location']; ?></span>
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->

                                        <div class="product-footer">
                                            <div class="ratings-container">

                                                <!-- Total Review count -->
                                                 <?php
                                                     $shop_id = $result['shop_id'];
                                                     $db   = new Database();
                                                     $sql  = "SELECT * FROM tb_shop_review WHERE shop_id = $shop_id";
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

                                                        <!-- Total rating value count -->
                                                    <?php
                                                       $shop_id = $result['shop_id'];
                                                       $db   = new Database();
                                                       $sql  = "SELECT sum(rating_value)rating_value FROM tb_shop_review WHERE shop_id = $shop_id";
                                                       $sum_of_rating_value = $db->select($sql);

                                                       while($getData = $sum_of_rating_value->fetch_assoc())
                                                       {
                                                         $total_rating = $getData['rating_value'];
                                                       }
                                                    ?>

                                                        <!-- Average rating value count -->
                                                    <?php 
                                                      error_reporting( error_reporting() & ~E_NOTICE );
                                                      if ($total_rating == 0 AND $total_review == 0) 
                                                      {
                                                        $avg_rating = 0;
                                                      }
                                                      else
                                                      {
                                                        $avg_rating = (int) ($total_rating/$total_review);
                                                      }

                                                     ?>



                                                        <!-- Put rating strat -->
                                                     <?php 

                                                        if($avg_rating == 0)
                                                        {
                                                          ?>

                                                            <i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                          <?php
                                                        }
                                                        else if($avg_rating == 1)
                                                        {
                                                          ?>

                                                            <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                          <?php
                                                        }
                                                        else if($avg_rating == 2)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($avg_rating == 3)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($avg_rating == 4)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($avg_rating >= 5)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i>

                                                            <?php
                                                        }

                                                       ?>

                                                <span class="ratings-text">( <?php echo $total_review; ?> Reviews )</span>
                                            </div><!-- End .rating-container -->

                                            <div class="product-action">
                                                <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>" class="btn-product btn-cart" title="shop now"><span>Shop Now</span></a>
                                            </div><!-- End .product-action -->
                                        </div><!-- End .product-footer -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-6 col-md-4 col-lg-3 -->

                                <?php } ?>
                                <?php }else{ ?>
                                <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Shop Found!</div><br />';
                                    echo $msg; ?>
                                <?php } ?>

                            </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- End .mb5 -->

            <div class="blog-posts">
                <div class="container">
                    <h2 class="title-lg text-center mb-4">From Our Blog</h2><!-- End .title-lg text-center -->

                    <div class="owl-carousel owl-simple mb-4" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "520": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                }
                            }
                        }'>
                        <article class="entry">
                            <figure class="entry-media">
                                <a href="#">
                                    <img src="assets/images/medi_shop/1.jpg" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body text-center">
                                <div class="entry-meta">
                                    <a href="#">Nov 22, 2018</a>, 0 Comments
                                </div><!-- End .entry-meta -->

                                <h3 class="entry-title">
                                    <a href="#">Sed adipiscing ornare.</a>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <p>Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. </p> 
                                    <a href="#" class="read-more">READ MORE</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    
                        <article class="entry">
                            <figure class="entry-media">
                                <a href="#">
                                    <img src="assets/images/medi_shop/2.jpg" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body text-center">
                                <div class="entry-meta">
                                    <a href="#">Dec 12, 2018</a>, 0 Comments
                                </div><!-- End .entry-meta -->

                                <h3 class="entry-title">
                                    <a href="#">Fusce lacinia arcuet nulla.</a>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. </p>
                                    <a href="#" class="read-more">READ MORE</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->

                        <article class="entry">
                            <figure class="entry-media">
                                <a href="#">
                                    <img src="assets/images/medi_shop/3.jpg" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body text-center">
                                <div class="entry-meta">
                                    <a href="#">Dec 19, 2018</a>, 2 Comments
                                </div><!-- End .entry-meta -->

                                <h3 class="entry-title">
                                    <a href="#">Aliquam erat volutpat.</a>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <p>Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. </p>
                                    <a href="#" class="read-more">READ MORE</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->

                        <article class="entry">
                            <figure class="entry-media">
                                <a href="#">
                                    <img src="assets/images/medi_shop/shop_3.jpg" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body text-center">
                                <div class="entry-meta">
                                    <a href="#">Dec 19, 2018</a>, 2 Comments
                                </div><!-- End .entry-meta -->

                                <h3 class="entry-title">
                                    <a href="#">Quisque a lectus.</a>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. </p>
                                    <a href="#" class="read-more">READ MORE</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .owl-carousel -->

                    <div class="more-container text-center mt-1">
                        <a href="#" class="btn btn-outline-lightgray btn-more btn-round"><span>View more articles</span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .more-container -->
                </div><!-- End .container -->
            </div><!-- End .blog-posts -->
        </main><!-- End .main -->

        <footer class="footer footer-dark">
            <div class="cta bg-image bg-dark pt-4 pb-5 mb-0" style="background-image: url(assets/images/medi_shop/4.jpg);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-8 col-lg-6">
                            <div class="cta-heading text-center">
                                <h3 class="cta-title text-white">Subscribe for Our Newsletter</h3><!-- End .cta-title -->
                            </div><!-- End .text-center -->
                        
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-white" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                        </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cta -->
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <a href="index.php" class="logo">
                                    <h4><b style="font-family: 'Noto Serif', serif;"><img class="d-inline mb-1" src="assets/icon/medicine_4.png" width="28" height="28"> <span class="text-primary">Grand Health</span></b><span class="text-danger">.BD</span></h4>
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
                    <p class="footer-copyright">Copyright © <?php echo date('Y'); ?> Grand Health. All Rights Reserved.</p><!-- End .footer-copyright -->
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
                    <li class="active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul">Shop</a>

                                    <ul>
                                        <li>
                                            <a href="#all_shop">All Shop</a>
                                        </li>
                                        <li>
                                            <a href="#top_selling_shop">Top Selling Shop</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
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
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demos/demo-10.js"></script>
</body>


<!-- molla/index-10.html  22 Nov 2019 09:58:22 GMT -->
</html>