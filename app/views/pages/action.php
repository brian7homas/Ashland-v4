<?php 
require APPROOT . '/views/inc/header.php';
?>

<div class="user-header">
<img class="hero-img" src="<?php URLROOT ?>/pics/action_cover.jpg" />
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
            <div class="gird-full">
                <div class="card">
                    <img src="<?php URLROOT ?>/pics/dit.jpg" />
                </div>
                
                <div class="card">
                    <img src="<?php URLROOT ?>/pics/jsc.jpg" />
                </div>
                
                <div class="row-flex">
                    <div class="card">
                        <img src="<?php URLROOT ?>/pics/krst.jpg" />
                    </div>
                    <div class="card">
                        <img src="<?php URLROOT ?>/pics/kath.jpg" />
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php';?>