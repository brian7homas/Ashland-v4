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
  
  <link href="<?php echo URLROOT ?>/style.css" rel="stylesheet">
  <link href="<?php echo URLROOT ?>/assets/css/style.css" rel="stylesheet">
  

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

  <!-- ======= Hero Section ======= -->
  <!-- <section class="hero" style="background-image: url(<?php //URLROOT; ?>/pics/cover.jpg);" > -->
  <section class="hero" style="background-image: url(<?php URLROOT;  echo  $data['bg-img']; ?>);" >
  
    <div class="container text-center">  
      <div class="row">
        <div class="col-md-12">
          <a class="hero-brand" href="index.html" title="Home"><img alt="Bell Logo" src="<?php  echo URLROOT ?>/public/img/smLogo@3x.png"></a>
        </div>
      </div>
      <div class="col-md-12">
        <h1>
          Ashland Soccar
        </h1>

        <p class="tagline">
          This is a powerful theme with some great features that you can use in your future projects.
        </p>
        <a class="btn btn-full scrollto" href="#about">Add a new player</a>
      </div>
    </div>

  </section><!-- End Hero -->
  <?php require APPROOT . '/views/inc/navbar.php'?>