<?php 
require APPROOT . '/views/inc/header.php';
?>

<img id="main__img" src="<?php URLROOT ?>/img/bg.png" />
<!-- <div class="overlay"></div> -->
<div class="user-header">
    <img class="hero-img" src="<?php URLROOT ?>/img/cover@2x.png" />
    <div class="user-header__container-inner">
        <h1 class="user-header__headline">
            <?php 

                echo $data['title']."<br>";
                
            ?>
        </h1>
        <p class="user-header__sub-headline">
            <?php 
                echo $data['description'] . "<br>";
            ?>
        </p>
    </div>
</div>

<section id="" class="content">
    <div class='portfolio-grid'>
        <!-- TEAM PAGE LINK -->
        <div class="row">
            <div class="grid">
                <div class="card card-block" style="background-color: transparent" >
                    <a class="card-title" href="<?php echo URLROOT?>/pages/teams"><img alt="img" src="pics/teams.jpg">
                    </a>

                    <h1>
                        Teams
                    </h1>
                    <p class="card-text">
                    </p>

                </div>

                <div class="card card-block" style="background-color: transparent">
                    <a class="card-title" href="<?php URLROOT?>/pages/action"><img alt="img" src="pics/action.jpg">
                    </a>

                    <h1>
                        Action
                    </h1>
                    <p class-"card-text">
                    </p>

                </div>

                <div class="card card-block" style="background-color: transparent">
                    <a class="card-title" href="<?php echo URLROOT?>/pages/schedule"><img alt="img" src="pics/gm-schedule-cover.jpg">
                    </a>
                    <h1>
                        Schedule
                    </h1>
                    <p class-"card-text">
                    </p>
                </div>

</section>

<!-- loops through the posts in the tmvc table -->


<?php require APPROOT . '/views/inc/footer.php';?>