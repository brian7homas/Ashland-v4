<?php require APPROOT . '/views/inc/header.php'; 
?>




<div class="container text-center">
  <h2>
  <?php 
        echo $data['title'] . "<br>";
    ?>
  </h2>

  <h1>
    <a href="<?php echo URLROOT; ?>/adminpages/team">Team</a>
  </h1>
  <h1>
    <a href="<?php echo URLROOT; ?>/adminpages/player">Player</a>
  </h1>
  <h1>
    <a href="<?php echo URLROOT; ?>/adminpages/games">Games</a>
  </h1>
</div>
<?php 
    

?>


<!-- foreach had to be pasted in to work -->

<?php require APPROOT . '/views/inc/footer.php'; ?>