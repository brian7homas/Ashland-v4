<?php require APPROOT . '/views/inc/header.php'; 
if(isset($_SESSION['adminid'])) echo "set";
$admin = $_SESSION['ad_fname'];
?>

<?php flash('post_message'); ?>
<div class="header jumbotron-fluid text-center">
    
    <div class="container">
        <h1 class="display-3">
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
<h1 style="color: black"class="display-4"><?php var_dump($admin) ?><Nmae</h1>

<!-- foreach had to be pasted in to work -->

<?php require APPROOT . '/views/inc/footer.php'; ?>