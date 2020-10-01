<?php 
require APPROOT . '/views/inc/header.php';
?>

<div class="user-header">
    <img class="hero-img" src="<?php URLROOT ?>/img/team.png" />
    <div class="user-header__container-inner">
        <h1 class="user-header__headline">
            <?php 
                echo $data['title']."<br>";                
            ?>
        </h1>
        <p class="user-header__sub-headline">
            <?php
                echo $data['description'] . "<br>";
                echo "version: " . APPVERSION; 
            ?>
        </p>
    </div>
</div>
<section class="content">
    <div class="portfolio-grid">
        <div class="row">
            <div class="gird">
            
                <div class="card">
                    <img src="<?php URLROOT ?>/pics/ateam.jpg" />
                    <div class="card-block-text">
                        <h1>Bluedevils</h1>
                        <p>subheading</p>
                    </div>
                </div>
                
                <div class="card">
                    <img src="<?php URLROOT ?>/pics/bluedevils.jpg" />
                    <div class="card-block-text">
                        <h1>Bluedevils</h1>
                        <p>subheading</p>
                    </div>
                </div>
                
                <div class="card">
                    <img src="<?php URLROOT ?>/pics/dsc.jpg" />
                    <div class="card-block-text">
                        <h1>Bluedevils</h1>
                        <p>subheading</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php';?>