<?php 

require APPROOT . '/views/inc/header.php'; 

?>
<!-- ======= Contact Section ======= -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="section-title"><?php echo $data['title']; ?></h2>
        <h4><?php echo $data['description']; ?></h4>
      </div>
      <a href="<?php echo URLROOT; ?>/adminpages/index">&lt&ltBack</a>
    </div>

    <div class="row justify-content-center">
      <!-- <div class="col-lg-3 col-md-4">
        <div class="info">
          <div>
            <i class="fa fa-map-marker"></i>
            <p>A108 Adam Street<br>New York, NY 535022</p>
          </div>

          <div>
            <i class="fa fa-envelope"></i>
            <p>info@example.com</p>
          </div>

          <div>
            <i class="fa fa-phone"></i>
            <p>+1 5589 55488 55s</p>
          </div>

        </div>
      </div> -->

      <div class="col-lg-5 col-md-8">
        <div class="form">
        
          <form action="<?php echo URLROOT; ?>/adminpages/team" method="post" role="form">
            <span style="color:red"><?php   if(isset($data['team_err'])){echo $data['team_err'];}; ?></span>
            <label class="subheadline__sm align-center margin-1" for="currentTeam" >
              Select a team
            </label>
            
            <div class="form-group">
                <select name="currentTeam">
                  <!-- <option value="" selected disabled hidden>Choose here</option> -->
                  <option <?php if($data['currentTeam'] == 'aardvarks'){echo "selected";} ?> value="aardvarks">
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
                
                <input class="" type="submit" value="See the team"/>   
                
                <span style="color: blue"><?php   if(isset($data['pla_info'])){echo $data['pla_info'];}; ?></span>
              <div class="validate"></div>
            </div>
            
            <h1 class="color-pd"><?php echo $data['currentTeam'];?></h1> 
              
            <div class="form-group text-center">
              <?php
                // CHECK FOR TEAM DATA 
                // var_dump($data['team']);
                if(count($data['team']) != '' ){
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
                        <div class="row">
                            <input type="checkbox" id="player" name="player[]" value="<?php echo $playerid; ?>">
                            <label  class="color-pd" for="pla_fname" ><?php echo $playerFirstName; ?></label><br>
                            <label  class="color-pd" for="pla_lname" ><?php echo $playerLastName; ?></label><br>
                            <label  class="color-pd" for="pla_phone" ><?php echo $playerPhone; ?></label><br>
                            <label  class="color-pd" for="pla_phone" ><?php echo $playerid; ?></label><br>
                        </div>
                        
                    <?php endforeach;
                        }else if($data[player] != ''){
                          echo 'player moved';
                        }
                        else{
                            echo '<label> no players on this team</label>'  ;
                        } ?>
            </div>
            
            <?php if(isset($_POST['currentTeam'])):?>
            <label class="text-center">Select players from above to move them to a selcted team below</label>
            
            <div class="form-group">
              
              <ul class="">
                <li>
                    <label class="" for="team" >
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
            <?php endif; ?>
            
            
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section><!-- End Contact Section -->

<?php 
    require APPROOT . '/views/inc/footer.php'; 
?>