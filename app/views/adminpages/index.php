<?php require APPROOT . '/views/inc/header.php'; 
?>

<?php flash('post_message'); ?>

<div class="user-header">    
    <div class="user-header__container-inner">
        <h1 style="color: black"class="display-4">
        <?php 
                echo $data['title'] . "<br>";
            ?>
        </h1>
        <p class="subheadline__large">
            <?php 
                echo $data['description'] . "<br>";
            ?>
        </p>
    </div>
</div>

<section class="content">
    <div class="row-flex-column-center">
        <h1 class="align-center"><a class="color-pd" href="<?php echo URLROOT; ?>/adminpages/team">Team Manager</a></h1>
        <h1 class="align-center"><a class="color-pd" href="<?php echo URLROOT; ?>/adminpages/player">Player Manager</a></h1>
        <h1 class="align-center"><a class="color-pd" href="<?php echo URLROOT; ?>/adminpages/games">Game Manager</a></h1>
    </div>
</section>
<?php 
    

?>


<!-- foreach had to be pasted in to work -->

<?php require APPROOT . '/views/inc/footer.php'; ?>