<?php 
require APPROOT . '/views/inc/header.php'; 

?>

<section id="">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="section-title">
                    <?php echo $data['title'] ?>
                </h2>
                <h4>
                    <?php echo $data['description']; ?>
                </h4>
                <h1 class="">All Players</h1>
            </div>
        </div>
        
        
                <table role="table">
                    
                    <thead role="rowgroup">
                        <tr role="row" >
                            <th role='columnheader' class="">Player ID</th>
                            <th role='columnheader' class=" ">Team</th>
                            <th role='columnheader' class=" ">First Name</th>
                            <th role='columnheader' class=" ">Last Name</th>
                        </tr> <!-- This is the first row -->
                    </thead>
                    
                    <?php
                    // var_dump($data['player'][0]);
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
                        $team_name = $value->team_name;
                        $teamid = $value->teamid;
                    ?>
                    
                        <!-- ! MOBILE html strucure -->
                    <thead role="rowgroup">
                        <tr role="row" >
                            <th role='columnheader' class="">Player ID</th>
                            <th role='columnheader' class=" ">Team</th>
                            <th role='columnheader' class=" ">First Name</th>
                            <th role='columnheader' class=" ">Last Name</th>
                        </tr> <!-- This is the first row -->
                    </thead>
                    <form action="<?php echo URLROOT; ?>/adminpages/player" class="" method='POST'>
                    <tbody role="rowgroup">
                    <tr role='row'  class="">
                        <td role="cell" class="">
                            <?php echo $id; ?>
                        </td>
                        <td role="cell" class=" ">
                            <?php echo $team_name; ?>
                        </td>
                        <td role="cell" class="">
                            <?php echo $firstName; ?>
                        </td>
                        <td role="cell" class="">
                        <?php echo $lastName; ?>
                        </td>
                        <td role="cell" class="py-3">
                            <button  class="btn" name="delete" type="" value="<?php echo $id; ?>" >Delete</button>
                            <button class="btn" name="edit" type="submit" value="<?php echo $id; ?>" >Edit</button>    
                        </td>
                        
                    </tr>
                    
                    <input readonly class="" type="hidden" name="edit_playerid" value="<?php echo $id; ?>" style="display: none; visibility: hidden;">
                    <input readonly class="" type="hidden" name="edit_pla_fname" value="<?php echo $team_name; ?>" style="display: none; visibility: hidden;">
                    <input readonly class="" type="hidden" name="edit_pla_lname" value="<?php echo $firstName; ?>" style="display: none; visibility: hidden;">
                    <input readonly class="" type="hidden" name="edit_pla_team" value="<?php echo $lastName; ?>" style="display: none; visibility: hidden;">
                    
                    <input  type="hidden" name="edit_team_name" value="<?php echo $team_name; ?>" style="display: none; visibility: hidden;">
                    <input  type="hidden" name="edit_teamid" value="<?php echo $teamid; ?>" style="display: none; visibility: hidden;">
                    <input  type="hidden" name="edit_pla_fname" value="<?php echo $firstName;?>" style="display: none; visibility: hidden;">                                <!-- lastName -->
                    <input  type="hidden" name="edit_pla_lname" value="<?php echo $lastName; ?>" style="display: none; visibility: hidden;">
                    <input  type="hidden" name="edit_pla_phone" value="<?php echo $phone; ?>" style="display: none; visibility: hidden;">
                    <input  type="hidden" name="edit_pla_par_fname" value="<?php echo $par_fname; ?>" style="display: none; visibility: hidden;">
                    <input  type="hidden" name="edit_pla_par_lname" value="<?php echo $par_lname; ?>" style="display: none; visibility: hidden;">
                    <input  type="hidden" name="edit_pla_add" value="<?php echo $add; ?>" style="display: none; visibility: hidden;">
                    <input  type="hidden" name="edit_pla_city" value="<?php echo $city; ?>" style="display: none; visibility: hidden;">
                    <input  type="hidden" name="edit_pla_state" value="<?php echo $state; ?>" style="display: none; visibility: hidden;">
                    <input  type="hidden" name="edit_pla_zip" value="<?php echo $zip; ?>" style="display: none; visibility: hidden;">
                    <input  type="hidden" name="edit_pla_bdate" value="<?php echo $bdate; ?>" style="display: none; visibility: hidden;">
                    </form>
                </tbody>
                <?php endforeach;?>
                
                </table>
        </section>
    </div>
</section>


<?php require APPROOT . '/views/inc/footer.php'; ?>