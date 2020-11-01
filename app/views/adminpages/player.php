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
                                foreach($data['player'] as $key => $value): 
                                    $firstName = $value->pla_fname;
                                    $lastName = $value->pla_lname;
                                    $teamid = $value->team_name;
                                ?>
                                    <div class="form-group">
                                    <label class="color-pd name"><?php echo $teamid; ?></label>
                                        <label class="color-pd name"><?php echo $firstName . ' ' . $lastName; ?></label>
                                        <input name="delete" class="color-pd" type="submit" value="delete" />
                                        <input name="edit" class="color-pd" type="submit" value="edit" />
                                    </div>
                                    
                                    
                                <?php endforeach;?>
                        
                </form>
        </div>
    </div>

</section>


<!-- foreach had to be pasted in to work -->

<?php require APPROOT . '/views/inc/footer.php'; ?>