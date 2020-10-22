<?php 

require APPROOT . '/views/inc/header.php'; 
// var_dump($data['team']);
// var_dump($data['newTeam']);
// foreach(($data['player']) as $key->$value){
//     echo $value;
// };
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

<div class="content">
    <div class="row">
        <div class="row-flex row-flex-column row-flex-column-center">
            <h1 class="subheadline__med">Select a Team to modify it</h1>    
            <span style="color:red"><?php   if(isset($data['post_err'])){echo $data['post_err'];}; ?></span>
            <form class="user-form  padding-1" action="<?php echo URLROOT;?>/adminpages/team" method="POST">
                <span style="color:red"><?php   if(isset($data['team_err'])){echo $data['team_err'];}; ?></span>
                <label class="subheadline__sm align-center margin-1" for="currentTeam" >
                        Select a team
                </label>
                            
                <select name="currentTeam">
                    <option <?php if($data['currentTeam'] == 'aardvarks'){
                        echo "selected";
                    } ?> value="aardvarks">
                        Aardvarks
                    </option>
                    <option <?php if($data['currentTeam'] == 'antelopes'){echo "selected";} ?> value="antelopes">
                        Antelopes
                    </option>
                    <option <?php if($data['currentTeam'] == 'boxers'){echo "selected";} ?>  value="boxers">
                        Boxers
                    </option>
                    <option <?php if($data['currentTeam'] == 'broncos'){echo "selected";} ?> value="broncos">
                        Broncos
                    </option>
                    <option <?php if($data['currentTeam'] == 'buffalos'){echo "selected";} ?> value="buffalos">
                        Buffalos
                    </option>
                    <option <?php if($data['currentTeam'] == 'culdesacs'){echo "selected";} ?> value="culdesacs">
                        Culdesacs
                    </option>
                    <option <?php if($data['currentTeam'] == 'newPlayers'){echo "selected";} ?> value="newPlayers">
                        New Players
                    </option>
                </select>
                <input class="color-pd row margin-2 input-width" type="submit" value="See the team"/>       
                    <!-- PLAYERS DISPLAYED BELOW -->
                <span style="color: blue"><?php   if(isset($data['pla_info'])){echo $data['pla_info'];}; ?></span>
                <h1 class="color-pd"><?php echo $data['currentTeam'];?></h1> 
                <div class="row row-flex-column-center">
                    <?php
                // CHECK FOR TEAM DATA 
                if(count($data['team']) > 0){
                    foreach($data['team'] as $key  => $object):?>
                        <?php
                        $playerFirstName = $object->pla_fname;
                        $playerLastName = $object->pla_lname;
                        $playerPhone = $object->pla_phone;
                        $playerid = $object->playerid;
                        // REPLACED THE PLAYERID TO ID FOR NEWPLAYERS TABLE
                        if(!isset($playerid)){
                            $playerid = $object->ID;
                        }
                        ?>
                        <div class="row-flex row-flex-column-center section">
                            <input type="checkbox" id="player" name="player[]" value="<?php echo $playerid; ?>">
                            <label  class="color-pd" for="pla_fname" ><?php echo $playerFirstName; ?></label><br>
                            <label  class="color-pd" for="pla_lname" ><?php echo $playerLastName; ?></label><br>
                            <label  class="color-pd" for="pla_phone" ><?php echo $playerPhone; ?></label><br>
                            <label  class="color-pd" for="pla_phone" ><?php echo $playerid; ?></label><br>
                        </div>
                        <div class="row-flex row-flex-column-center section">
                            <input type="checkbox" id="player" name="player[]" value="<?php echo $playerid; ?>">
                            <label  class="color-pd" for="pla_fname" ><?php echo $playerFirstName; ?></label><br>
                            <label  class="color-pd" for="pla_lname" ><?php echo $playerLastName; ?></label><br>
                            <label  class="color-pd" for="pla_phone" ><?php echo $playerPhone; ?></label><br>
                            <label  class="color-pd" for="pla_phone" ><?php echo $playerid; ?></label><br>
                        </div>
                    <?php endforeach;
                        }else{
                            echo "<p>". "no players on this team" . "</p>" ;
                        } ?>
                </div>
                <?php 
                    if(isset($_POST['currentTeam'])){ ?>
                    <div class="content">
                    <p class="color-pd">Select players from above to move them to a selcted team below</p>
                    <ul class="section section__justify-around">
                        <li>
                            <label class="subheadline__sm align-center margin-1" for="team" >
                                Team to move player to
                            </label>            
                            <select name="newTeam">
                                <option value="">Select a new team</option>
                                <option  <?php if($data['newTeam'] == 'aardvarks'){echo "selected";} ?> value="aardvarks">Aardvarks</option>
                                <option  <?php if($data['newTeam'] == 'antelopes'){echo "selected";} ?> value="antelopes">Antelopes</option>
                                <option  <?php if($data['newTeam'] == 'boxers'){echo "selected";} ?> value="boxers">Boxers</option>
                                <option  <?php if($data['newTeam'] == 'broncos'){echo "selected";} ?> value="broncos">Broncos</option>
                                <option  <?php if($data['newTeam'] == 'buffalos'){echo "selected";} ?> value="buffalos">Buffalos</option>
                                <option  <?php if($data['newTeam'] == 'culdesacs'){echo "selected";} ?> value="culdesacs">Culdesacs</option>
                            </select>
                            <input class="color-pd" type="submit" value="Move player"/>   
                        </li>
                        <li>
                            <input name="delete" class="color-pd" type="submit" value="Delete selected" href="#">
                        </li>
                    </ul>
                </div>
                    <?php };
                    
                    
                ?>
                
            </form>
        </div>
    </div>  
    <!-- PLAYER OUTPUT -->
</div>







<?php require APPROOT . '/views/inc/footer.php'; ?>