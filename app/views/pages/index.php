<?php 
require APPROOT . '/views/inc/header.php';

?>
<!-- <div class="overlay"></div> -->
<div class="header jumbotron-fluid text-center">
    <img class="background" src="<?php URLROOT ?>/img/bg.png" />
    <img class="hero-img" src="<?php URLROOT ?>/img/cover@2x.png" />
    <div class="container">
        <h1 class="display-3">
            <?php 
                echo $data['title']."<br>";
                
            ?>
        </h1>
        <p class="lead">
            <?php 
                echo $data['description'] . "<br>";
            ?>
        </p>
    </div>
</div>
<section class="" id="content" class="container text-center">
    <div class='portfolio-grid'>
        <!-- TEAM PAGE LINK -->
        <div class="row">
            <div class="bt-cards container-fluid  col-sm-6 col-xs-12">
                <div class="card card-block">
                    <a class="team-img" href="<?php echo URLROOT?>/pages/teams"><img alt="img" src="pics/teams.jpg">
                    </a>

                    <h1 class="card-title">
                        Teams
                    </h1>
                    <p class-"card-text">
                    </p>

                </div>

                <div class="card card-block">
                    <a href="<?php URLROOT?>/pages/action"><img alt="img" src="pics/action.jpg">
                    </a>

                    <h1 class="card-title">
                        Action
                    </h1>
                    <p class-"card-text">
                    </p>

                </div>

                <div class="card card-block">
                    <a href="<?php echo URLROOT;?>/pages/maps"><img alt="img" src="pics/maps.jpg">
                    </a>
                    <h1 class="card-title">
                        Maps
                    </h1>
                    <p class-"card-text">
                    </p>

                </div>

                <div class="card card-block">
                    <a href="<?php echo URLROOT?>/pages/schedule"><img alt="img" src="pics/gm-schedule-cover.jpg">
                    </a>
                    <h1 class="card-title">
                        Schedule
                    </h1>
                    <p class-"card-text">
                    </p>
                </div>

</section>

<!-- loops through the posts in the tmvc table -->


<?php require APPROOT . '/views/inc/footer.php';?>