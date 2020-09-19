<?php 
require APPROOT . '/views/inc/header.php';

?>

<div id="content">
    <div >
        <div >
            <h2>Create An Admin Account</h2>
            <p>Pleasse fill out to regsiter</p>
            <form class="user-form" action="<?php echo URLROOT; ?>/adminusers/register" method="POST">

            <div class="form-group">
                    <label for="name">Admin ID: <sup class="fa">*</sup>
                    <input type="text" name="adminid" class="form-control form-control-lg 
                        <?php echo(!empty($data['adminid_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['adminid_err'];?>" />
                        </label>
                    <span class="invalid-feedback"><?php echo $data['ad_fname_err'];?></span>
                </div>

                <div class="form-group">
                    <label for="name">First Name: <sup class="fa">*</sup>
                    <input type="text" name="ad_fname" class="form-control form-control-lg 
                        <?php echo(!empty($data['ad_fname_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['ad_fname'];?>" />
                        </label>
                    <span class="invalid-feedback"><?php echo $data['ad_fname_err'];?></span>
                </div>

                <div class="form-group">
                    <label for="name">Last Name: <sup class="fa">*</sup>
                    <input type="text" name="ad_lname" class="form-control form-control-lg 
                        <?php echo(!empty($data['ad_lname_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['ad_lname'];?>" />
                        </label>
                    <span class="invalid-feedback"><?php echo $data['ad_lname_err'];?></span>
                </div>

                <div class="form-group">
                    <label for="name">Username: <sup class="fa">*</sup>
                    <input type="text" name="ad_username" class="form-control form-control-lg 
                        <?php echo(!empty($data['ad_username_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['ad_username'];?>" />
                        </label>
                    <span class="invalid-feedback"><?php echo $data['ad_username_err'];?></span>
                </div>

                
                <!-- PASSWORD -->
                <div class="form-group">
                    <label for="ad_password">Password: <sup class="fa">*</sup>
                    <input type="password" name="ad_password" class="form-control form-control-lg 
                        <?php echo(!empty($data['ad_password_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['ad_password'];?>" />
                        </label>
                    <span class="invalid-feedback"><?php echo $data['ad_password_err'];?></span>
                </div>
                <!-- CONFIRM PASSWORD -->
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup class="fa">*</sup>
                    <input type="password" name="ad_confirm_password" class="form-control form-control-lg
                        <?php echo(!empty($data['ad_confirm_password_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['ad_confirm_password'];?>" />
                        </label>
                    <span class="invalid-feedback"><?php echo $data['ad_confirm_password_err'];?></span>
                </div>

                <div class="form-group button__mt">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/adminusers/login" class="btn btn-ligh btn-block">Have an account?
                            LOGIN.</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php';?>