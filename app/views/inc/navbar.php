  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="<?php if($_SESSION['adminid']){echo URLROOT . "/adminpages/index";}else{echo URLROOT;} ?>"><img
            class="logo" src="<?php  echo URLROOT ?>/public/img/smLogo.png" /></a>
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
                <!-- <li class="menu-has-children"><a href="#">Drop Down 2</a>
                  <ul>
                    <li><a class="user-nav-link" href="<?php //echo URLROOT;?>/pages/teams">Teams</a></li>
                    <li><a class="user-nav-link" href="<?php //echo URLROOT;?>/pages/action">Action</a></li>
                    <li><a class="user-nav-link" href="<?php //echo URLROOT;?>/pages/schedule">Schedule</a></li>
                  </ul>
                </li> -->
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