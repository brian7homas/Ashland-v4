<?php 

require APPROOT . '/views/inc/header.php';
?>



<section class="portfolio" id="portfolio">

    <div class="container text-center">
      <h2>
        <?php echo $data['title']; ?>
      </h2>

      <p>
        <?php echo $data['description']; ?>
      </p>
    </div>

    <div class="portfolio-grid">
      <div class="row justify-content-center">
        <div class="col-lg-2 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="<?php echo URLROOT; ?>/pages/teams"  data-gall="portfolioGallery"><img alt="" src="<?php echo URLROOT;  ?>/pics/teams.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title_h3-2">
                    Teams
                  </h3>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-lg-2 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="<?php echo URLROOT ?>/pages/action"  data-gall="portfolioGallery"><img alt="" src="<?php echo URLROOT;  ?>/pics/action.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title_h3-2">
                    Action
                  </h3>

                  
                  
                  
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-lg-2 col-sm-6 col-xs-12">
          <div class="card card-block">
          <a href="<?php echo URLROOT ?>/pages/maps"  data-gall="portfolioGallery"><img alt="" src="<?php echo URLROOT;  ?>/pics/maps.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title_h3-2">
                    Maps
                  </h3>

                  
                  
                  
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-lg-2 col-sm-6 col-xs-12">
          <div class="card card-block">
          <a href="<?php echo URLROOT ?>/pages/newplayers/register"  data-gall="portfolioGallery"><img alt="" src="<?php echo URLROOT;  ?>/pics/signup.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title_h3-2">
                    Sign up
                  </h3>

                  
                  
                  
                </div>
              </div>
            </a>
          </div>
        </div>
        
        <div class="col-lg-2 col-sm-6 col-xs-12">
          <div class="card card-block">
          <a href="<?php echo URLROOT ?>/pages/schedule"  data-gall="portfolioGallery"><img alt="" src="<?php echo URLROOT;  ?>/pics/gm-schedule-cover.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title_h3-2">
                    Schedule
                  </h3>

                  
                  
                  
                </div>
              </div>
            </a>
          </div>
        </div>
        
        
      </div>

    </div>
  </section><!-- End Portfolio Section -->
  
  <section class="team" id="team">
      <div class="container">
        <h2 class="text-center">
          Meet our team
        </h2>

        <div class="row">
          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="<?php echo URLROOT;  ?>/pics/team-1.jpg">
                <div class="card-title-wrap">
                  <span class="card-title"><?php echo $data['head_coach/1/name']; ?></span> <span class="card-text"><?php echo $data['head_coach/1/title']; ?></span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
                  </nav>

                  <p>
                    <?php echo $data['head_coach/1/description']; ?>  
                  </p>
                </div>
              </a>
            </div>
          </div>

          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="<?php echo URLROOT;  ?>/pics/team-2.jpg">
                <div class="card-title-wrap">
                  <span class="card-title"><?php echo $data['assistant_coach/1/name']; ?></span> <span class="card-text"><?php echo $data['assistant_coach/1/title']; ?></span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
                  </nav>

                  <p>
                    <?php echo $data['assistant_coach/1/description']; ?>
                  </p>
                </div>
              </a>
            </div>
          </div>

          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="<?php echo URLROOT;  ?>/pics/team-3.jpg">
                <div class="card-title-wrap">
                  <span class="card-title"><?php echo $data['head_coach/2/name']; ?></span> <span class="card-text"><?php echo $data['head_coach/2/title']; ?></span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
                  </nav>

                  <p>
                    <?php echo $data['head_coach/2/description']; ?>
                  </p>
                </div>
              </a>
            </div>
          </div>

          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="<?php echo URLROOT;  ?>/pics/team-4.jpg">
                <div class="card-title-wrap">
                  <span class="card-title"><?php echo $data['assistant_coach/2/name']; ?></span> <span class="card-text"><?php echo $data['assistant_coach/1/title']; ?></span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
                  </nav>

                  <p>
                    <?php echo $data['assistant_coach/2/description'] ?>
                  </p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Team Section -->

<?php require APPROOT . '/views/inc/footer.php';?>