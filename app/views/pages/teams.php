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

<?php require APPROOT . '/views/inc/footer.php';?>