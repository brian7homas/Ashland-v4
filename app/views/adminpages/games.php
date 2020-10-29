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
                        foreach($gameid as $key=>$value){
                            $gamesid = $value->gameid;
                            $data['game_data'] = $this->adminpageModel->getSchedule($gamesid, $data['team']);
                            sort($data['game_data']);
                            var_dump($data['game_data']);
                            foreach($data['game_data'] as $key => $value){
                                array_push($data['game_data'], $value);
                                $data['game_data'] = $value->team_name;
                                // $data['game_date'] = $value->gm_date;
                                echo "<p>". $data['game_data'] ."</p>";
                                var_dump($data['game_data']);
                            }
                            
                        }
                        
                        
                        ?>
                        //TODO:Bring formated opponet and date of the game
                        //TODO: AdminPages currently is outputting opponet data and game date
                        //! Not ablle to pull it into this page tho
                        
                </form>
        </div>
    </div>

</section>
<?php 
    

?>


<!-- foreach had to be pasted in to work -->

<?php require APPROOT . '/views/inc/footer.php'; ?>