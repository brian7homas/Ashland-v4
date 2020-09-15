<?php 
require APPROOT . '/views/inc/header.php';
?>
<img class="background" src="<?php URLROOT ?>/img/team.png" />
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-3">
            <?php 
                echo $data['title']."<br>";
                echo $data['description'] . "<br>";
                echo "teams page";
                
            ?>
        </h1>
        <p class="lead">
            <?php echo "version: " . APPVERSION; ?>
        </p>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php';?>