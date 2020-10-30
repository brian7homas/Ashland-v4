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
            <h1 class="headline-text headline-text-center"><?php if(isset($data['team'])){
                echo $data['team'];
            };?></h1>
            <span><?php echo $data['team_err']; ?></span>
                <form class="user-form margin-1 padding-1" method='POST'>      
                    <?php
                        foreach($data['teams'] as $key => $value): 
                            $team = $value->team_name;
                        ?>
                            <div class="align-center">
                                <label for="team" class="color-pd id">
                                    <input id="team" name="team" type="submit" style="cursor: hover; color: black; border:none" value='<?php echo $team?>'/>
                                </label>    
                            </div>
                        <?php endforeach;?>    
                        
                        <?php 
                            //? test Values coming from controllor (AdminPages.php)
                            
                            // var_dump($teamNames);
                            // var_dump($value);
                            // var_dump($data['game_data']);
                            // var_dump($data['game_date']);
                            var_dump($data['game_time']);
                            foreach($data['game_date'] as $key=>$value){
                                $date = $value; 
                            }
                            foreach($data['game_time'] as $key=>$value){
                                $time = $value; 
                            }
                            foreach($data['field'] as $key=>$value){
                                $field = $value; 
                            }
                            foreach($data['opp'] as $key=>$value):
                                $opp = $value;?>
                                <div class="align-center">
                                    <label for="team" class="color-pd id">
                                        <p><?php echo $opp; ?></p>
                                        <p><?php echo $date; ?></p>
                                        <p><?php echo $time; ?></p>
                                        <p><?php echo $field; ?></p>
                                    </label>    
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