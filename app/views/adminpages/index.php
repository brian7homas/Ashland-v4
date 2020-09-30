<?php require APPROOT . '/views/inc/header.php'; 
?>

<?php flash('post_message'); ?>
<div class="header jumbotron-fluid text-center">    
    <div class="container">
        <h1 style="color: black" class="display-2">
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
<section id="content" class="container container__margin-top text-center">
    <div class="portfolio-grid">
        <h1 style="color:black" ><a href="<?php echo URLROOT; ?>/adminpages/team">Team Manager</a></h1>
        <h1 style="color:black" ><a href="<?php echo URLROOT; ?>/adminpages/player">Player Manager</a></h1>
        <h1 style="color:black" ><a href="<?php echo URLROOT; ?>/adminpages/games">Game Manager</a></h1>
    </div>
</section>
<?php 
    

?>


<!-- foreach had to be pasted in to work -->

<?php require APPROOT . '/views/inc/footer.php'; ?>