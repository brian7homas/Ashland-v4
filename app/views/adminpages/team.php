<?php 

require APPROOT . '/views/inc/header.php'; 
?>
<!-- ======= Contact Section ======= -->
<section id="contact" class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="display-4"><?php echo $data['title']; ?></h2>
                <h4 class="h4"><?php echo $data['description']; ?></h4>
            </div>
            <a href="<?php echo URLROOT; ?>/adminpages/index">&lt&ltBack</a>
        </div>

        <div class="row justify-content-center ">
            <div class=" ">
                <div class="form text-center">

                    <form action="<?php echo URLROOT; ?>/adminpages/team" method="POST" role="form" class="py-5">
                        <div class="form-group">
                            <label for="currentTeam"><p>Current Team</p></label>
                            <select name="currentTeam" class="custom-select-lg w-50 m-3">
                                <option <?php if($data['currentTeam'] == 'aardvarks'){echo "selected";} ?> value="aardvarks">
                                    Aardvarks
                                </option>
                                <option <?php if($data['currentTeam'] == 'antelopes'){echo "selected";} ?> value="antelopes">
                                    Antelopes
                                </option>
                                <option <?php if($data['currentTeam'] == 'boxers'){echo "selected";} ?> value="boxers">
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
                            <div class="text-center">
                                <button id="currentTeam" class="btn my-2" type="submit" value="currentTeam">
                                    <?php 
                                            
                                            if(empty($data['btn-text-newSelection'])){
                                                echo $data['btn-text-currentTeam'];
                                            }else{
                                                echo $data['btn-text-newSelection'];
                                            }
                                    ?>
                                </button>
                            </div>
                            <span
                                style="color: blue"><?php   if(!empty($data['team_err'])){echo $data['team_err'];}; ?></span>
                            <div class="validate"></div>
                        </div>


                        <h1 class="color-pd text-capitalize display-4">
                            <?php 
                                if(empty($data['currentTeam'])){
                                    echo $data['main-inst'];
                                }else{
                                    echo $data['currentTeam'];
                                }
                            ?>
                        </h1>

                        <div class="row p-5 justify-content-center ">
                            <?php
                        
                        if(count($data['team']) > 0 ){
                            foreach($data['team'] as $key  => $object):
                            ?>
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


                            <table  id="" class="table admin-team">
                                <tbody>
                                    <tr class="">
                                        <th class=''>
                                            <input class="admin-team__checkbox" type="checkbox" id="player" name="player[]" value="<?php echo $playerid; ?>" />
                                            <div class="admin-team__player-info">
                                                <label  class="" for="pla_fname"><?php echo $playerFirstName; ?></label>
                                                <label  class="" for="pla_lname"><?php echo $playerLastName; ?></label>
                                                <label  class="" for="pla_phone"><?php echo $playerPhone; ?></label>
                                                <label  class="" for="pla_phone"><?php echo $playerid; ?></label>
                                            </div>
                                            
                                        </th>
                                    </tr>
                                </tbody>
                            </table>

                            <?php endforeach;
                          }
                          else if(empty($data['team'])){
                            echo '<label class="text-danger"> No players on this team</label>';
                          } ?>
                        </div>
                        <?php 
                      
                    if(!empty($data['currentTeam'])):?>

                        <label class="text-center">Select players from above to move them to a selcted team
                            below</label>

                        <div class="form-group">

                            <ul class="py-3">
                                <li>
                                    <label class="mb-4" for="team">
                                        <p>New Team</p>
                                    </label>
                                    <select class="w-50 custom-select text-center" name="newTeam">
                                        <option value="">Select a new team</option>
                                        <option <?php if($data['newTeam'] == 'aardvarks'){echo "selected";} ?>
                                            value="aardvarks">Aardvarks</option>
                                        <option <?php if($data['newTeam'] == 'antelopes'){echo "selected";} ?>
                                            value="antelopes">Antelopes</option>
                                        <option <?php if($data['newTeam'] == 'boxers'){echo "selected";} ?>
                                            value="boxers">Boxers</option>
                                        <option <?php if($data['newTeam'] == 'broncos'){echo "selected";} ?>
                                            value="broncos">Broncos</option>
                                        <option <?php if($data['newTeam'] == 'buffalos'){echo "selected";} ?>
                                            value="buffalos">Buffalos</option>
                                        <option <?php if($data['newTeam'] == 'culdesacs'){echo "selected";} ?>
                                            value="culdesacs">Culdesacs</option>
                                    </select>

                                </li>
                                <li>
                                    <button class="btn" name="move" type="submit" value="Move player">Move Player</button>
                                    <!-- <input name="move" class="btn btn-sm bg-primary color-pd" type="submit"
                                        value="Move player" /> -->
                                    <input name="delete" class="btn bg-dark color-pd" type="submit"
                                        value="Delete selected" href="#">
                                </li>
                            </ul>
                        </div>

                    </form>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section><!-- End Contact Section -->

<?php 
    require APPROOT . '/views/inc/footer.php'; 
?>