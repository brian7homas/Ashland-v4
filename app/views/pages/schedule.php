<?php 
require APPROOT . '/views/inc/header.php';
?>

<section class="container">
    <div class="form">
        <form class="grid" action="<?php echo URLROOT; ?>/pages/schedule" method="POST">

            <div class="form-group text-center">
                <label><strong class="display-3 text-capitalize"><?php echo $data['team']; ?></strong></label>
                <p class="py-4">Select a team to dynamically see what teams will be facing off</p>
            </div>

            <div class="row form-group text-center py-3 justify-content-center">
                <select name="team" id="" class="custom-select-sm">
                    <option value="" selected disabled class="custom-select">Choose here</option>
                    <option value="aardvarks">
                        Aardvarks
                    </option>
                    <option value="antelopes">
                        Antelopes
                    </option>
                    <option value="boxers">
                        Boxers
                    </option>
                    <option value="broncos">
                        Broncos
                    </option>
                    <option value="buffalos">
                        Buffalos
                    </option>
                    <option value="culdesacs">
                        Culdesacs
                    </option>

                </select>
            </div>

            <div class="form-group row justify-content-center">
                <button class="btn">View team schedule</button>
            </div>

            <?php 
                    //!Game time
                    $Time = array(); 
                    // $newKey = 'time';
                    foreach($data['game_time'] as $data['game_time'][$key]=>$value):
                        
                        // $Time[$newKey] = $Time[$key];
                        // unset($Time[$key]);
                        
                        // $Time[$newKey] = $value; 
                        array_push($Time, $value);
                        //$Time = $value;?>
            <!-- //!test value -->
            <!-- <p><?php //var_dump($Time); ?></p> -->
            <?php endforeach;
                    // var_dump($Time);
                    
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
                        endforeach;  
                        
                        // $TeamAsKey = array_combine($Opp, $Date);
                        // COMBINE ALL ARRAYS
                        $container = array_merge($Opp,$Date, $Time, $Field);
                        
                        // ARRAY_CHUNK SEGMENTS THE ARRAYS BASED ON THE NUMBER OF VALUES IN THE $OPP ARRAY
                        // var_dump(array_chunk($container, count($Opp), true));
                        $container = array_chunk($container, count($Opp));
                        
                        //!TEST VALUES
                        // print_r($container);
                        // CONTAINER NOW CAN ACCESS VALUES IN A PARALLEL FASHION
                        // 0 = TEAM NAME
                        // var_dump($container[0][0]);
                        // // 1 = DATE
                        // var_dump($container[1][0]);
                        // // 2 = TIME
                        // var_dump($container[2][0]);
                        // // 3 = FIELD
                        // var_dump($container[3][0]);
                        
                        // var_dump($container[0][1]);
                    ?>
            <?php if($data['game_data']): ?>
            <div class="container">

                <?php
                    $rev = 0; 
                    // var_dump(count($Opp));
                    $count = count($Opp);
                    while($count > 0 ):
                        $count--; 
                        // echo $count;
                        for($row=0; $row<= 3;): 
                        ?>

                <table class="table">
                    <tr>
                        <th>
                            <label>Who?</label>
                        </th>

                        <td>
                            <label for="opponent1"><?php echo $container[$row++][$rev];  ?></label>
                        </td>

                    </tr>

                    <tr>
                        <th>
                            <label>When?</label>
                        </th>
                        <td>
                            <label for="opponent1"><?php echo $container[$row++][$rev]; ?> @
                                <?php echo $container[$row++][$rev] ?></label>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <label>Where?</label>
                        </th>

                        <td>
                            <label for="opponent1"><?php echo $container[$row++][$rev]; ?></label>
                        </td>
                    </tr>

                </table>
                <?php 
                        $rev++;
                        endfor;
                    endwhile;  
                    ?>
            </div>
            <?php endif;?>


        </form>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php';?>