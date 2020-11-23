<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicons -->
  <link href="<?php echo URLROOT ?>/assets/img/favicon.png" rel="icon">
  <link href="<?php echo URLROOT ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo URLROOT ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo URLROOT ?>/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo URLROOT ?>/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  
  
  <link href="<?php echo URLROOT ?>/assets/css/style.css" rel="stylesheet">
  <link href="<?php echo URLROOT ?>/style.css" rel="stylesheet">
  

  <!-- =======================================================
  * Template Name: Bell - v2.1.0
  * Template URL: https://bootstrapmade.com/bell-free-bootstrap-4-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <!-- added  -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">
  <title><?php echo SITENAME;?></title>
</head>

<body>





  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="<?php if($_SESSION['adminid']){echo URLROOT . "/adminpages/index";}else{echo URLROOT;} ?>"><img
            class="logo" src="<?php  echo URLROOT ?>/public/svg/LOGO.svg" /></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
        <?php if($_SESSION['adminid'] OR $_SESSION['user_name']): ?>
          <li><a class="nav-link" href="#">How's it going?
            <?php echo $_SESSION['user_name']; echo $_SESSION['ad_username']; ?> </a></li>
          <li><a class="nav-link" href="<?php 
            if(isset($_SESSION)){
                switch(true){
                    case ($_SESSION['adminid']):
                        echo URLROOT . "/adminusers/logout";
                        break;
                    case($_SESSION['user_name']):
                        echo URLROOT . "/users/logout";
                }
            }
            ?>">Logout
            </a></li>
            <?php  endelse; else: ?>
            
          <li><a class="user-nav-link" href="<?php echo URLROOT;?>/newplayers/register">New players</a></li>
          <li><a class="user-nav-link" href="<?php echo URLROOT;?>/users/login">Users Login</a></li>
          <li><a class="user-nav-link" href="<?php echo URLROOT;?>/adminusers/login">Admin Login</a></li>
          <?php if(!$data['dropdown']):?>
            <li class="menu-has-children"><a>Explore</a>
              <ul>
                <li><a class="user-nav-link" href="<?php echo URLROOT;?>/pages/teams">Teams</a></li>
                <li><a class="user-nav-link" href="<?php echo URLROOT;?>/pages/action">Action</a></li>
                <li><a class="user-nav-link" href="<?php echo URLROOT;?>/pages/schedule">Schedule</a></li>
              </ul>
            </li>
          <?php endif; ?>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->

      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
      </nav>
    </div>
    <?php endif;?>
  </header><!-- End Header -->
            
  <main id="main">