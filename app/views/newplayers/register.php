<?php 
require APPROOT . '/views/inc/header.php';

?>

<!-- <div class="row"> -->
<div id="main-wrapper">
    <!-- <div class="col-md-6 mx-auto"> -->
    <div id="content">
        <!-- <div class="card card-body bg-light"> -->
        <div>
            <h2>Register a New Player</h2>
            <p>Please fill out to register</p>
            <form class="user-form" action="<?php echo URLROOT; ?>/newplayers/register" method="POST">
                <div class="form-group">
                
                    <label for="pla_lname">Last Name: <sup class="fa">*</sup>
                        <input type="text" name="pla_lname" class="form-control form-control-lg
                            <?php echo(!empty($data['pla_lname_err'])) ? 'is-invalid': ''; ?>"
                            value="<?php echo $data['pla_lname'];?>" />
                    </label>
                    <span class="invalid-feedback"><?php echo $data['pla_lname_err'];?></span>
                </div>

                <div class="form-group">
                    <label for="pla_fname">First Name: <sup class="fa">*</sup>
                        <input type="text" name="pla_fname" class="form-control form-control-lg
                            <?php echo(!empty($data['pla_fname_err'])) ? 'is-invalid': ''; ?>"
                            value="<?php echo $data['pla_fname'];?>" />
                    </label>
                    <span class="invalid-feedback"><?php echo $data['pla_fname_err'];?></span>
                </div>
                <div class="form-group">
                    <label for="pla_phone">Phone: <sup class="fa">*</sup>
                        <input type="tel" name="pla_phone" class="form-control form-control-lg
                            <?php echo(!empty($data['pla_phone_err'])) ? 'is-invalid': ''; ?>"
                            value="<?php echo $data['pla_phone'];?>" />
                    </label>
                    <span class="invalid-feedback"><?php echo $data['pla_phone_err'];?></span>
                </div>
                <div class="form-group">
                    <label for="pla_email">Email: <sup class="fa">*</sup>
                        <input type="email" name="pla_email" class="form-control form-control-lg
                            <?php echo(!empty($data['pla_email_err'])) ? 'is-invalid': ''; ?>"
                            value="<?php echo $data['pla_email'];?>" />
                    </label>
                    <span class="invalid-feedback"><?php echo $data['pla_email_err'];?></span>
                </div>
                <div class="form-group">
                    <label for="pla_par_lname">Parent Last Name: <sup class="fa">*</sup>
                        <input type="text" name="pla_par_lname" class="form-control form-control-lg
                            <?php echo(!empty($data['pla_par_lname_err'])) ? 'is-invalid': ''; ?>"
                            value="<?php echo $data['pla_par_lname'];?>" />
                    </label>
                    <span class="invalid-feedback"><?php echo $data['pla_par_lname_err'];?></span>
                </div>
                <div class="form-group">
                    <label for="pla_par_fname">Parent First Name: <sup class="fa">*</sup>
                        <input type="text" name="pla_par_fname" class="form-control form-control-lg
                            <?php echo(!empty($data['pla_par_fname_err'])) ? 'is-invalid': ''; ?>"
                            value="<?php echo $data['pla_par_fname'];?>" />
                    </label>
                    <span class="invalid-feedback"><?php echo $data['pla_par_fname_err'];?></span>
                </div>
                <div class="form-group">
                    <label for="pla_add">Address: <sup class="fa">*</sup>
                        <input type="text" name="pla_add" class="form-control form-control-lg
                            <?php echo(!empty($data['pla_add_err'])) ? 'is-invalid': ''; ?>"
                            value="<?php echo $data['pla_add'];?>" />
                    </label>
                    <span class="invalid-feedback"><?php echo $data['pla_add_err'];?></span>
                </div>
                <div class="form-group">
                    <label for="pla_city">City: <sup class="fa">*</sup>
                        <input type="text" name="pla_city" class="form-control form-control-lg
                            <?php echo(!empty($data['pla_city_err'])) ? 'is-invalid': ''; ?>"
                            value="<?php echo $data['pla_city'];?>" />
                    </label>
                    <span class="invalid-feedback"><?php echo $data['pla_city_err'];?></span>
                </div>
                <div class="form-group">
                    <label for="pla_state">State: <sup class="fa">*</sup>
                        <input type="text" name="pla_state" class="form-control form-control-lg
                            <?php echo(!empty($data['pla_state_err'])) ? 'is-invalid': ''; ?>"
                            value="<?php echo $data['pla_state'];?>" />
                    </label>
                    <span class="invalid-feedback"><?php echo $data['pla_state_err'];?></span>
                </div>
                <div class="form-group">
                    <label for="pla_zip">Zip: <sup class="fa">*</sup>
                        <input type="text" name="pla_zip" class="form-control form-control-lg
                            <?php echo(!empty($data['pla_zip_err'])) ? 'is-invalid': ''; ?>"
                            value="<?php echo $data['pla_zip'];?>" />
                    </label>
                    <span class="invalid-feedback"><?php echo $data['pla_zip_err'];?></span>
                </div>
                <div class="form-group">
                    <label for="pla_bdate">Date of Birth: <sup class="fa">*</sup>
                        <input type="date" name="pla_bdate" class="form-control form-control-lg
                            <?php echo(!empty($data['pla_bdate_err'])) ? 'is-invalid': ''; ?>"
                            value="<?php echo $data['pla_bdate'];?>" />
                    </label>
                    <span class="invalid-feedback"><?php echo $data['pla_bdate_err'];?></span>
                </div>
                <div class="form-group">
                    <div class="button button__position">
                        <input type="submit" value="Register" class="user-btn" />
                    </div>
                </div>
                <div class="form-group form-group__hidden">
                    <label for="date_added">Date Added: <sup class="fa">*</sup>
                        <input  name="date_added" class="form-control form-control-lg
                            <?php echo(!empty($data['date_added_err'])) ? 'is-invalid': ''; ?>"
                            value="<?php echo date("Y-d-m");?>" />
                    </label>
                    <span class="invalid-feedback"><?php echo $data['date_added_err'];?></span>
                </div>
                </form>
        </div>

    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php';?>