
<!-- ======= Hero Section ======= -->
<!-- <section class="hero" style="background-image: url(<?php //URLROOT; ?>/pics/cover.jpg);" > -->
<section class="hero" style="background-repeat: no-repeat; background-position: center center; background-image: url(<?php echo URLROOT;  echo  $data['bg-img']; ?>);">

    <div class="container text-center">

        <div class="row">

        </div>
        <div class="col-md-12">
            <h1 class="hero__headline">
                Ashland Soccar
            </h1>

            <p class="tagline">
                <?php echo $data['description']; ?>
            </p>
                <?php if(strstr($view,'adminusers') != TRUE AND strstr($view, 'adminpages') != TRUE ):?>
              <a class="btn btn-full scrollto" href="<?php echo URLROOT . $data['hero-button-path']; ?>">
                <?php echo $data['hero-button-text']; ?>
              </a>
                <?php endif;?>
        </div>
    </div>

</section><!-- End Hero -->

<div id="wrapper">