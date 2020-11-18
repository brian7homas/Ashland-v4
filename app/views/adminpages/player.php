<?php 
require APPROOT . '/views/inc/header.php'; 
var_dump($data['edit_pla_fname']);
echo $data['edit_pla_fname'];
echo $data['edit_pla_lname'];
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
        
        <section class="">
                <table class="table table-responsive">
                    <tr class="d-table-row"> <!-- This is the first row -->
                        <th class="col-3  text-center">Player ID</th>
                        <th class="col-3  text-center">Team</th>
                        <th class="col-3  text-center">First Name</th>
                        <th class="col-3  text-center">Last Name</th>
                    </tr>
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
                    <form action="<?php echo URLROOT; ?>/adminpages/player" class="" method='POST'>

                    <tr class="">
                        <th scope="row" >
                            <input readonly class="text-center" type="text" name="edit_playerid" value="<?php echo $id; ?>">
                        </th>
                        <td class="text-center ">
                            <input readonly class="text-center" type="text" name="edit_pla_fname" value="<?php echo $firstName; ?>">
                        </td>
                        <td class="text-center">
                            <input readonly class="text-center" type="text" name="edit_pla_lname" value="<?php echo $lastName; ?>">
                        </td>
                        <td class="text-center">
                            <input readonly class="text-center" type="text" name="edit_pla_team" value="<?php echo $team_name; ?>">
                        </td>
                        <td class=""><button  class="btn" name="delete" type="submit" value="<?php echo $id; ?>" >Delete</button></td>
                        <td><button class="btn" name="edit" type="submit" value="<?php echo $id; ?>" >Edit</button>    </td>
                    </tr>
                    
                    

                    <!-- <input  type="text" name="playerid" value="<?php //echo $id; ?>" style="display: none; visibility: hidden;">         -->
                    <input  type="text" name="edit_team_name" value="<?php echo $team_name; ?>" style="display: none; visibility: hidden;">
                    <input  type="text" name="edit_teamid" value="<?php echo $teamid; ?>" style="display: none; visibility: hidden;">
                    <input  type="text" name="edit_pla_fname" value="<?php echo $firstName;?>" style="display: none; visibility: hidden;">                                <!-- lastName -->
                    <input  type="text" name="edit_pla_lname" value="<?php echo $lastName; ?>" style="display: none; visibility: hidden;">
                    <input  type="text" name="edit_pla_phone" value="<?php echo $phone; ?>" style="display: none; visibility: hidden;">
                    <input  type="text" name="edit_pla_par_fname" value="<?php echo $par_fname; ?>" style="display: none; visibility: hidden;">
                    <input  type="text" name="edit_pla_par_lname" value="<?php echo $par_lname; ?>" style="display: none; visibility: hidden;">
                    <input  type="text" name="edit_pla_add" value="<?php echo $add; ?>" style="display: none; visibility: hidden;">
                    <input  type="text" name="edit_pla_city" value="<?php echo $city; ?>" style="display: none; visibility: hidden;">
                    <input  type="text" name="edit_pla_state" value="<?php echo $state; ?>" style="display: none; visibility: hidden;">
                    <input  type="text" name="edit_pla_zip" value="<?php echo $zip; ?>" style="display: none; visibility: hidden;">
                    <input  type="text" name="edit_pla_bdate" value="<?php echo $bdate; ?>" style="display: none; visibility: hidden;">
                    </form>

                <?php endforeach;?>
                </table>
        </section>
    </div>
</section>


<?php require APPROOT . '/views/inc/footer.php'; ?>