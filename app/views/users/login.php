<?php 
require APPROOT . '/views/inc/header.php';
?>
<div class="row">
    <img class="login" src="<?php URLROOT?>/img/login-bg.png" />
    <div class="col-md-6 mx-auto">
        <div class="login-card">




            <?php flash('register_success'); ?>
            <h2>Login to your Account</h2>
            <p>Pleasse fill in your creditentials</p>
            <form action="<?php echo URLROOT; ?>/users/login" method="POST">

                <div class="form-group">
                    <label for="ad_username">Username:
                        <sup class="fa" style="right:-2.9em; top: -1.3em;">*</sup>
                    </label>
                    <input type="text" name="ad_username" class="user-form form-control form-control-lg
                        <?php echo(!empty($data['ad_username_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['ad_username'];?>" />
                    <span class="invalid-feedback"><?php echo $data['ad_username_err'];?></span>
                </div>

                <div class="form-group">
                    <label for="ad_password">Password: <sup class="fa" style="right:-5em; top: -1.3em;">*</sup></label>
                    <input type="password" name="ad_password" class="user-form form-control form-control-lg
                        <?php echo(!empty($data['ad_password_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['ad_password'];?>" />
                    <span class="invalid-feedback"><?php echo $data['ad_password_err'];?></span>
                </div>

                <div class="form-group">

                    <input type="submit" value="Cancel" class="cancel-btn">


                    <input type="submit" value="Login" class="login-btn">


                    <a href="<?php echo URLROOT; ?>/users/register" class="reg-btn">No account?
                        REGISTER.</a>


                </div>
            </form>
        </div>
    </div>

</div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php';?>