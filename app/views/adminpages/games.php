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
            <form class="schedule" action="<?php echo URLROOT;?>/adminpages/games" method='POST'>      
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
            
            <!-- PHP CODE SORTING $DATA VARIABLE AND STORING THEIR VALUES INTO NEW ARRAYS -->
            <?php 
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
            <?php endforeach;
            
            
            $Field = array();
            foreach($data['field'] as $key=>$value):  
                    array_push($Field, $value);
                    //$Opp = $value;?>
                                <!-- //!test value -->
                    <!-- <p><?php //var_dump($Opp); ?></p> -->
            <?php 
            endforeach; 
            
            
            //! Team name
            $Opp = array();
            foreach($data['opp'] as $key=>$value):  
                    array_push($Opp, $value);
                    //$Opp = $value;?>
                                <!-- //!test value -->
                    <!-- <p><?php //var_dump($Opp); ?></p> -->
            <?php 
            endforeach; ?>
            
            <?php 
            
            // $TeamAsKey = array_combine($Opp, $Date);
            
            $container = array_merge($Opp,$Date, $Time);
            //!TEST VALUES
            // print_r($container);
            // var_dump($container);
            ?>
            <!-- END PHP CODE SORTING DATA VARIABLE -->
            <?php if($data['game_data']): ?>
                <form class="schedule" action="<?php echo URLROOT;?>/adminpages/games" method="POST">
                <div class="form-group">
                    <h1 class="headline-text headline-text-center"><?php if(isset($data['team'])){
                        echo $data['team'];
                    };?></h1>
                    <span><?php echo $data['team_err']; ?></span>
                </div>
                
                <div class="form-group">
                    <p class="align-center padding-1 subheadline__large">will be facing..</p>
                </div>
                
                <div class="row-flex">
                    <table>
                        <tr>
                            <th>
                                <label>Who?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Opp[0];?></label>
                            </td>
                            
                        </tr>
                        <tr>
                            <th>
                                <label>When?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Date[0]. " @ ". $Time[0]; ?></label>
                            </td>
                            
                        </tr>
                        <tr>
                            <th>
                                <label>Where?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Field[0]; ?></label>
                            </td>
                        </tr>
                    </table>

                    <table>
                        <tr>
                            <th>
                                <label>Who?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Opp[1];?></label>
                            </td>
                            
                        </tr>
                        <tr>
                            <th>
                                <label>When?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Date[1]. " @ ". $Time[1]; ?></label>
                            </td>
                            
                        </tr>
                        <tr>
                            <th>
                                <label>Where?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Field[1]; ?></label>
                            </td>
                        </tr>
                    </table>

                </div>
                
                <div class="row-flex">
                    
                    <table>
                        <tr>
                            <th>
                                <label>Who?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Opp[2];?></label>
                            </td>
                            
                        </tr>
                        <tr>
                            <th>
                                <label>When?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Date[2]. " @ ". $Time[2]; ?></label>
                            </td>
                            
                        </tr>
                        <tr>
                            <th>
                                <label>Where?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Field[2]; ?></label>
                            </td>
                        </tr>
                    </table>

                    <table>
                        <tr>
                            <th>
                                <label>Who?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Opp[3];?></label>
                            </td>
                            
                        </tr>
                        <tr>
                            <th>
                                <label>When?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Date[3]. " @ ". $Time[3]; ?></label>
                            </td>
                            
                        </tr>
                        <tr>
                            <th>
                                <label>Where?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Field[3]; ?></label>
                            </td>
                        </tr>
                    </table>

                </div>
                    
                <div class="row-flex">
                <table>
                        <tr>
                            <th>
                                <label>Who?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Opp[4];?></label>
                            </td>
                            
                        </tr>
                        <tr>
                            <th>
                                <label>When?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Date[4]. " @ ". $Time[4]; ?></label>
                            </td>
                            
                        </tr>
                        <tr>
                            <th>
                                <label>Where?</label>
                            </th>
                            <td>
                                <label for="opponent1"><?php echo $Field[4]; ?></label>
                            </td>
                        </tr>
                    </table>

                </div>
                
            </form>
            <?php endif;?>
            
        </div>
    </div>

</section>
<?php 
    

?>


<!-- foreach had to be pasted in to work -->

<?php require APPROOT . '/views/inc/footer.php'; ?>