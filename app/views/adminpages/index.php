<?php require APPROOT . '/views/inc/header.php'; 
?>

<?php flash('post_message'); ?>

<div class="user-header">    
    <div class="container">
        <h1 class="headline-text">
            <?php 
                echo $data['title']."<br>";
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
    <div class="row">
        <div class="section">
            <form class="user-form">
                <div class="form-group">
                    <h1> lable</h1>
                </div>
                
            </form>
        </div>
    </div>
</section>
        <h1><a class="color-pd" href="<?php echo URLROOT; ?>/adminpages/team">Team Manager</a></h1>
        <h1><a class="color-pd" href="<?php echo URLROOT; ?>/adminpages/player">Player Manager</a></h1>
        <h1><a class="color-pd" href="<?php echo URLROOT; ?>/adminpages/games">Game Manager</a></h1>
    

<?php 
    

?>


<!-- foreach had to be pasted in to work -->

<?php require APPROOT . '/views/inc/footer.php'; ?>