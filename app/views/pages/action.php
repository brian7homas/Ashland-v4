<?php 
require APPROOT . '/views/inc/header.php';
?>


<section class="portfolio" id="portfolio">

    <div class="container text-center">
      <h2>
        Action
      </h2>

      <p>
        See some players in action
      </p>
    </div>

    <div class="portfolio-grid py-4" >
      <div class="row p-3">
        <!-- <div class="col-lg-3 col-sm-6 col-xs-12"> -->
        <div class="col-lg-3 col-sm-6 col-xs-12 m-2 action-pics" style="cursor: unset; min-height: 17em; background-image: url('<?php echo URLROOT; ?>/pics/dit.jpg'); background-repeat: no-repeat; background-size: contain;background-position: center ">
        </div>

        <!-- <div class="col-lg-3 col-sm-6 col-xs-12"> -->
        <div class="col-lg-3 col-sm-6 col-xs-12 m-2 action-pics" style="min-height: 17em; background-image: url('<?php echo URLROOT; ?>/pics/jsc.jpg'); background-repeat: no-repeat; background-size: contain;background-position: center ">
        </div>

          
        <div class="col-lg-3 col-sm-6 col-xs-12 m-2 action-pics" style="min-height: 17em; background-image: url('<?php echo URLROOT; ?>/pics/krst.jpg'); background-repeat: no-repeat; background-size: contain;background-position: center ">
        </div>

          <!-- <div class="col-lg-3 col-sm-6 col-xs-12"> -->
        <div class="col-lg-3 col-sm-6 col-xs-12 m-2 action-pics" style="min-height: 17em; background-image: url('<?php echo URLROOT; ?>/pics/kath.jpg'); background-repeat: no-repeat; background-size: contain;background-position: center ">
        </div>
      </div>

    </div>
  </section><!-- End Portfolio Section -->

<?php require APPROOT . '/views/inc/footer.php';?>