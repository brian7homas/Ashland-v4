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
                </form>
                    
                        <?php 
                        //! Team name
                        $Opp = array();
                        foreach($data['opp'] as $key=>$value):  
                                array_push($Opp, $value);
                                //$Opp = $value;?>
                                            <!-- //!test value -->
                                <!-- <p><?php //var_dump($Opp); ?></p> -->
                        <?php 
                        endforeach; 
                        
                        
                        //!Game time
                        $Time = array(); 
                        foreach($data['game_time'] as $key=>$value):
                            array_push($Time, $value);
                            //$Time = $value;?>
                                        <!-- //!test value -->
                                <!-- <p><?php //var_dump($Time); ?></p> -->
                        <?php endforeach;
                        
                        
                        //!Game date
                        $Date = array(); 
                        foreach($data['game_date'] as $key=>$value): 
                            array_push($Date, $value);
                            //$Date = $value; ?>
                                        <!-- //!test value -->
                                        <!-- <p><?php // var_dump($Date); ?></p> -->
                        <?php endforeach;?>
                        <table style=" width: 100%; height: 300px;">
                            <!-- TEAM COLUMN -->
                                <td>
                                    <ul>
                                        <?php foreach($Opp as $key=>$team):?>
                                            <li class="color: color-pd"><?php echo $team; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                            <!-- DATE COLUMN -->
                                <td>
                                    <ul>
                                        <?php foreach($Date as $key=>$date):?>
                                            <li class="color: color-pd"><?php echo $date; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                            <!-- TIME COLUMN -->
                                <td>
                                    <ul>
                                        <?php foreach($Time as $key=>$time):?>
                                            <li class="color: color-pd"><?php echo $time; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>                              
                    </table>
              
        </div>
    </div>

</section>
<?php 
    

?>


<!-- foreach had to be pasted in to work -->

<?php require APPROOT . '/views/inc/footer.php'; ?>