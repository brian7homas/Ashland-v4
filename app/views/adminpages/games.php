<?php require APPROOT . '/views/inc/header.php'; 
?>

<section id="">
    <div class="container">
        <div class="row">    
            <div class="col-12 text-center">
                <h2 class="display-2">
                    <?php 
                            echo $data['title'] . "<br>";
                        ?>
                </h2>
                <h4 class="h4">
                    <?php 
                        echo $data['description'] . "<br>";
                    ?>
                </h4>
            </div>
            <a href="<?php echo URLROOT; ?>/adminpages/index">&lt&ltBack</a>
        </div>
        
        <section class="row justify-content-center">
            <div class="container">
                <div class="form py-5">
                    <form class="" action="<?php echo URLROOT;?>/adminpages/games" method='POST'>      
                        <?php
                            foreach($data['teams'] as $key => $value): 
                                $team = $value->team_name;
                            ?>
                                <div class="text-center m-2 py-2">
                                    <label for="team" class="w-">
                                        <input id="team" name="team" type="submit" class="display-4" style="cursor: hover; color: black; border:none" value='<?php echo $team?>'/>
                                    </label>    
                                </div>
                            <?php endforeach;?>    
                    </form>
                    
                    <!-- PHP CODE SORTING $DATA VARIABLE AND STORING THEIR VALUES INTO NEW ARRAYS -->
                    <!-- TIME GAME DATE FIELD OPP  = NEW ARRAYS TO STROE VALUES TO BE DISPLAYED -->
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
                        endforeach;  
                        // $TeamAsKey = array_combine($Opp, $Date);
                        $container = array_merge($Opp,$Date, $Time);
                        //!TEST VALUES
                        // print_r($container);
                        // var_dump($container);
                    ?>
                    <!-- END PHP CODE SORTING DATA VARIABLE -->
                    <?php if($data['game_data']): 
                            // foreach($Opp as $var){
                            //     echo $var;
                            //     echo "<br>";
                            // }
                            // foreach($Date as $date){       
                            //     echo $date; 
                            //     echo "<br>";
                            // }
                            // foreach($Field as $field){       
                            //     echo $field; 
                            //     echo "<br>";
                            // }
                            // foreach($Time as $time){       
                            //     echo $time; 
                            //     echo "<br>";
                            // }
                    ?>
                    
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col-md-12 text-center">
                                <p class="pt-5">The..</p>
                                <h1 class="display-1">
                                    <?php if(isset($data['team'])){
                                        echo $data['team'];
                                    };?>
                                    </h1>
                                <span><?php echo $data['team_err']; ?></span>
                                <p class="py-4">will be facing..</p>
                            </div>
                        </div>
                        <form class="form" action="<?php echo URLROOT;?>/adminpages/games" method="POST">
                        
                            <div class="row-flex">
                                <table class="table-responsive table-bordered games-table">
                                    <tbody class="d-flex row-cols-sm-4">
                                            <tr class="col">                
                                                    <!-- WHO -->
                                                    <th class="text-center">
                                                        <label>Who?</label>
                                                    </th>
                                                    <?php foreach($Opp as $opp):?>
                                                    <td class="text-center pl-0" >
                                                        <label  for="opponent1"><?php echo $opp;?></label>
                                                    </td>
                                                    <?php endforeach; ?>
                                            </tr>

                                            <tr class="col">
                                                <!-- WHEN -->
                                                
                                                    <th class="text-center">
                                                        <label>Date?</label>
                                                    </th>
                                                    <?php foreach($Date as $date): ?>
                                                    <td class="pl-0 text-center">
                                                        <label for="opponent1"><?php echo $date; ?></label>
                                                    </td>
                                                    <?php endforeach; ?>
                                                    
                                                
                                            </tr>
                                        
                                        
                                            <!-- WHEN -->
                                            <tr class="col">
                                                <th class="text-center">
                                                    <label>Time?</label>
                                                </th>
                                                <?php foreach($Time as $time): ?>
                                                <td class="pl-0 text-center">
                                                    <label for="opponent1"><?php echo $time; ?></label>
                                                </td>
                                                <?php endforeach; ?>
                                                
                                            </tr>
                                        
                                        
                                            <!-- WHERE -->
                                            <tr class="col">
                                                <th class="text-center">
                                                    <label class="">Where?</label>
                                                </th>
                                                <?php foreach($Field as $field): ?>
                                                <td class="pl-0 text-center">
                                                    <label for="opponent1"><?php echo $field; ?></label>
                                                </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <?php endif;?>
                    
                </div>
            </div>

        </section>
    
    </div>
</section>


<!-- foreach had to be pasted in to work -->

<?php require APPROOT . '/views/inc/footer.php'; ?>