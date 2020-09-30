<?php 
require APPROOT . '/views/inc/header.php';
?>

<div class="user-header">
    <img class="hero-img" src="<?php URLROOT ?>/pics/maps-cover.jpg" />
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
    <div class="row">
        <h1 class="headline-text">Maps</h1>
    </div>
    <div class="row">
    <h1 class="headline-text">Locations</h1>
    </div>
    <div class="row">
    <h1 class="headline-text">Directions</h1>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php';?>