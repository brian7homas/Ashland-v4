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

</section>

<?php require APPROOT . '/views/inc/footer.php';?>