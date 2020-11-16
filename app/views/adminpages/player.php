<?php require APPROOT . '/views/inc/header.php'; 
?>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="section-title">
                    <?php echo $data['title'] ?>
                </h2>
                <h4>
                    <?php echo $data['description']; ?>
                </h4>
            </div>
        </div>
    </div>
</section>

<section class="row justify-content-center">
    <div class="col-lg-5 col-md-8">
        
                <h1 class="">All Players</h1>
                <div class="form">
                    <form action="<?php echo URLROOT; ?>/adminpages/player" class="" method='POST'>
                <?php
                // var_dump($data['player'][0]->pla_par_fname);
                foreach($data['player'] as $key => $value): 
                    $id = $value->playerid; 
                    $firstName = $value->pla_fname;
                    $lastName = $value->pla_lname;
                    $phone = (int)$value->pla_phone;
                    $par_fname = $value->pla_par_fname; 
                    $par_lname = $value->pla_par_lname; 
                    $add = $value->pla_add; 
                    $city = $value->pla_city; 
                    $state = $value->pla_state;
                    $zip = $value->pla_zip;
                    $bdate = $value->pla_bdate;
                    $teamid = $value->team_name;
                ?>
                    <div class="form-group">
                            <table class="container-fluid ">
                                <tr> <!-- This is the first row -->
                                    <th>Player ID</th>
                                    <th>Team</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                </tr>
                                <tr> <!-- This is the second row -->
                                    <td><label  for="playerid"><?php echo $id; ?></label></td>
                                    <td><label   for='teamid'><?php echo $teamid; ?></label></td>
                                    <td><label  for="pla_fname"><?php echo $firstName?></label></td>
                                    <td><label  for="pla_lname"><?php echo $lastName?></label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <button  class="btn" name="delete" type="submit" value="<?php echo $id; ?>" >Delete</button>
                                    </td>
                                    <td>
                                        <button class="btn" name="edit" type="submit" value="<?php echo $id; ?>" >Edit</button>
                                    </td>
                                    
                                </tr>
                                
                            </table>
                                
                        
                        
                                
                            <input  type="text" name="playerid" value="<?php echo $id; ?>" style="display: none">        
                            <input  type="text" name="teamid" value="<?php echo $teamid; ?>" style="display: none">
                            <input  type="text" name="pla_fname" value="<?php echo $firstName;?>" style="display: none">                                <!-- lastName -->
                            <input  type="text" name="pla_lname" value="<?php echo $lastName; ?>" style="display: none">
                            <input  type="text" name="phone" value="<?php echo $phone; ?>" style="display: none">
                            <input  type="text" name="pla_par_fname" value="<?php echo $par_fname; ?>" style="display: none">
                            <input  type="text" name="pla_par_lname" value="<?php echo $par_lname; ?>" style="display: none">
                            <input  type="text" name="pla_add" value="<?php echo $add; ?>" style="display: none">
                            <input  type="text" name="pla_city" value="<?php echo $city; ?>" style="display: none">
                            <input  type="text" name="pla_state" value="<?php echo $state; ?>" style="display: none">
                            <input  type="text" name="pla_zip" value="<?php echo $zip; ?>" style="display: none">
                            <input  type="text" name="pla_bdate" value="<?php echo $bdate; ?>" style="display: none">
                        </div>
                    
                
                <?php endforeach;?>
                </form>    
            </div>
        </div>
    </div>

</section>


<?php require APPROOT . '/views/inc/footer.php'; ?>