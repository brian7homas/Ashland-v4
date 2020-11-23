<?php 
require APPROOT . '/views/inc/header.php';

?>

<div id="container">
    <div class="container-md">
        <h2 class="headline-text text-center">Register a New Player</h2>
        <p class="subheadline subheadline__large text-center mb-4">Please fill out to register</p>
        
        <form class="form p-2 mt-3" action="<?php echo URLROOT; ?>/newplayers/register" method="POST">
            <div class="form-group">
                <label for="pla_lname">Last Name: <sup class="fa">*</sup>
                </label>
                <input type="text" name="pla_lname" class="form-group__text form-control
                        <?php echo(!empty($data['pla_lname_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['pla_lname'];?>" />
                <span class="invalid-feedback"><?php echo $data['pla_lname_err'];?></span>
            </div>
            <div class="form-group">
                <label for="pla_fname">First Name: <sup class="fa">*</sup>
                </label>
                <input type="text" name="pla_fname" class="form-control form-control-lg
                        <?php echo(!empty($data['pla_fname_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['pla_fname'];?>" />
                <span class="invalid-feedback"><?php echo $data['pla_fname_err'];?></span>
            </div>
            <div class="form-group">
                <label for="pla_phone">Phone: <sup class="fa">*</sup>
                </label>
                <input type="tel" name="pla_phone" class="form-control form-control-lg
                        <?php echo(!empty($data['pla_phone_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['pla_phone'];?>" />
                <span class="invalid-feedback"><?php echo $data['pla_phone_err'];?></span>
            </div>
            <div class="form-group">
                <label for="pla_email">Email: <sup class="fa">*</sup>
                </label>
                <input type="email" name="pla_email" class="form-control form-control-lg
                        <?php echo(!empty($data['pla_email_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['pla_email'];?>" />
                <span class="invalid-feedback"><?php echo $data['pla_email_err'];?></span>
            </div>
            <div class="form-group">
                <label for="pla_par_lname">Parent Last Name: <sup class="fa">*</sup>
                </label>
                <input type="text" name="pla_par_lname" class="form-control form-control-lg
                        <?php echo(!empty($data['pla_par_lname_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['pla_par_lname'];?>" />
                <span class="invalid-feedback"><?php echo $data['pla_par_lname_err'];?></span>
            </div>
            <div class="form-group">
                <label for="pla_par_fname">Parent First Name: <sup class="fa">*</sup>
                </label>
                <input type="text" name="pla_par_fname" class="form-control form-control-lg
                        <?php echo(!empty($data['pla_par_fname_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['pla_par_fname'];?>" />
                <span class="invalid-feedback"><?php echo $data['pla_par_fname_err'];?></span>
            </div>
            <div class="form-group">
                <label for="pla_add">Address: <sup class="fa">*</sup>
                </label>
                <input type="text" name="pla_add" class="form-control form-control-lg
                        <?php echo(!empty($data['pla_add_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['pla_add'];?>" />
                <span class="invalid-feedback"><?php echo $data['pla_add_err'];?></span>
            </div>
            <div class="form-group">
                <label for="pla_city">City: <sup class="fa">*</sup>
                </label>
                <input type="text" name="pla_city" class="form-control form-control-lg
                        <?php echo(!empty($data['pla_city_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['pla_city'];?>" />
                <span class="invalid-feedback"><?php echo $data['pla_city_err'];?></span>
            </div>
            <div class="form-group">
                <label for="pla_state">State: <sup class="fa">*</sup>
                </label>
                <input type="text" name="pla_state" class="form-control form-control-lg
                        <?php echo(!empty($data['pla_state_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['pla_state'];?>" />
                <span class="invalid-feedback"><?php echo $data['pla_state_err'];?></span>
            </div>
            <div class="form-group">
                <label for="pla_zip">Zip: <sup class="fa">*</sup>
                </label>
                <input type="text" name="pla_zip" class="form-control form-control-lg
                        <?php echo(!empty($data['pla_zip_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['pla_zip'];?>" />
                <span class="invalid-feedback"><?php echo $data['pla_zip_err'];?></span>
            </div>
            <div class="form-group">
                <label for="pla_bdate">Date of Birth: <sup class="fa">*</sup>
                </label>
                <input type="date" name="pla_bdate" class="form-control form-control-lg
                        <?php echo(!empty($data['pla_bdate_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['pla_bdate'];?>" />
                <span class="invalid-feedback"><?php echo $data['pla_bdate_err'];?></span>
            </div>
            
            <div  class="form-group form-group__hidden" style="display: none">
                <label  for="date_added">Date Added: <sup class="fa">*</sup>
                    <input  type="hidden" name="date_added" class="form-control form-control-lg
                        <?php echo(!empty($data['date_added_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo date("Y-d-m");?>" />
                </label>
                <span class="invalid-feedback"><?php echo $data['date_added_err'];?></span>
            </div>
            
            <div class="form-group">
                <button class="btn w-50 btn-sm" id="clear" type="button" value="Cancel" >Clear Form</button>
                <button class="btn btn-sm" type="submit" value="Register">Register</button>
            </div>
            
        </form>
        
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php';?>