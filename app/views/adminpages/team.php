<?php 

require APPROOT . '/views/inc/header.php'; 
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
            <form class="user-form  padding-1" action="<?php echo URLROOT;?>/adminpages/team" method="POST">
                <label class="subheadline__sm align-center margin-1" for="currentTeam" >Select a team
                </label>            
                <select name="currentTeam">
                <option selected="<?php echo $data['currentTeam'];?>"  value="aardvarks"><?php echo $data['aardvarks']; ?></option>
                    <option  value="antelopes"><?php echo $data['antelopes']; ?></option>
                    <option  value="boxers"><?php echo $data['boxers']; ?></option>
                    <option  value="broncos"><?php echo $data['broncos']; ?></option>
                    <option  value="buffalos"><?php echo $data['buffalos']; ?></option>
                    <option  value="culdesacs"><?php echo $data['culdesacs']; ?></option>
                    <option  value="newPlayers"><?php echo $data['newPlayers']; ?></option>
                </select>
                <input class="color-pd row margin-2 input-width" type="submit" value="See the team"/>            
                <span><?php 
                    if(isset($data['team_err'])){
                        echo $data['team_err'];
                }; ?></span>
                <h1 class="color-pd"><?php echo $data['currentTeam'];?></h1> 
                <div class="row row-flex-column-center">
                    <?php
                    // PUT THE PLAYER DATA INTO VARIABLES TO BE ECHOED OUT
                    foreach($data['player'] as $key  => $object):?>
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
                    <?php endforeach;?>
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
                                <option selected value="aardvarks"><?php echo $data['aardvarks']; ?></option>
                                <option  value="antelopes"><?php echo $data['antelopes']; ?></option>
                                <option  value="boxers"><?php echo $data['boxers']; ?></option>
                                <option  value="broncos"><?php echo $data['broncos']; ?></option>
                                <option  value="buffalos"><?php echo $data['buffalos']; ?></option>
                                <option  value="culdesacs"><?php echo $data['culdesacs']; ?></option>
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