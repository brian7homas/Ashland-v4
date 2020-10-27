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
<section class="content">
    <div class="row">
        <div class="row-flex-column row-flex-column-center">
            <h1 class="headline-text headline-text-center">All Players</h1>
                <form class="user-form margin-1 padding-1" method='POST'>      
                    <?php
                        foreach($data['teams'] as $key => $value): 
                            $team = $value->team_name;
                        ?>
                            <div class="align-center">
                                <label for="team" class="color-pd id"><a href=""><?php echo $team; ?></a></label>
                                <input id="team" name="team" type="submit" style="display:none"/>
                            </div>
                            
                            
                        <?php endforeach;
                    ?>
                </form>
        </div>
    </div>

</section>
<?php 
    

?>


<!-- foreach had to be pasted in to work -->

<?php require APPROOT . '/views/inc/footer.php'; ?>