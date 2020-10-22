<?php require APPROOT . '/views/inc/header.php'; 
?>


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
<section id="content" class="container text-center">
     <h1 style="color:black" ><a href="<?php echo URLROOT; ?>/adminpages/">Home</a></h1>
     <ul>
        <li><a href="#"><?php echo $data['add'] ?></a></li>
        <li><a href="#"><?php echo $data['remove'] ?></a></li>
        <li><a href="#"><?php echo $data['edit'] ?></a></li>
     </ul>
</section>
<?php 
    

?>


<!-- foreach had to be pasted in to work -->

<?php require APPROOT . '/views/inc/footer.php'; ?>