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
      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="<?php echo URLROOT; ?>/pages/teams"  data-gall="portfolioGallery"><img alt="" src="<?php echo URLROOT;  ?>/pics/teams.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    Teams
                  </h3>

                  <p class="card-text">
                    See all our teams
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
            <a href="<?php URLROOT ?>/pages/action"  data-gall="portfolioGallery"><img alt="" src="<?php echo URLROOT;  ?>/pics/action.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    Action
                  </h3>

                  <p class="card-text">
                    See some action and teamwork on gameday
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
          <a href="<?php URLROOT ?>/pages/maps"  data-gall="portfolioGallery"><img alt="" src="<?php echo URLROOT;  ?>/pics/maps.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    Maps
                  </h3>

                  <p class="card-text">
                    Find our facilities, fields and more
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
          <a href="<?php URLROOT ?>/pages/newplayers/register"  data-gall="portfolioGallery"><img alt="" src="<?php echo URLROOT;  ?>/pics/signup.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    Sign up
                  </h3>

                  <p class="card-text">
                    There is always room for more
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
          <a href="<?php URLROOT ?>/pages/schedule"  data-gall="portfolioGallery"><img alt="" src="<?php echo URLROOT;  ?>/pics/gm-schedule-cover.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    Schedule
                  </h3>

                  <p class="card-text">
                    Find when and where your next game is
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
          <a href="<?php URLROOT ?>/pages/scheudle"  data-gall="portfolioGallery"><img alt="" src="<?php echo URLROOT;  ?>/pics/gm-schedule-cover.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    The Dude Rockin'
                  </h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
          <a href="<?php URLROOT ?>/pages/scheudle"  data-gall="portfolioGallery"><img alt="" src="<?php echo URLROOT;  ?>/pics/gm-schedule-cover.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    The Dude Rockin'
                  </h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="card card-block">
          <a href="<?php URLROOT ?>/pages/scheudle"  data-gall="portfolioGallery"><img alt="" src="<?php echo URLROOT;  ?>/pics/gm-schedule-cover.jpg">
              <div class="portfolio-over">
                <div>
                  <h3 class="card-title">
                    The Dude Rockin'
                  </h3>

                  <p class="card-text">
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
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
              <a href="#"><img alt="" class="team-img" src="assets/img/team-1.jpg">
                <div class="card-title-wrap">
                  <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
                  </nav>

                  <p>
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </a>
            </div>
          </div>

          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="assets/img/team-2.jpg">
                <div class="card-title-wrap">
                  <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
                  </nav>

                  <p>
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </a>
            </div>
          </div>

          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="assets/img/team-3.jpg">
                <div class="card-title-wrap">
                  <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
                  </nav>

                  <p>
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </a>
            </div>
          </div>

          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="assets/img/team-4.jpg">
                <div class="card-title-wrap">
                  <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
                  </nav>

                  <p>
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Team Section -->

<?php require APPROOT . '/views/inc/footer.php';?>