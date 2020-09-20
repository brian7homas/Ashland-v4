<?php 
require APPROOT . '/views/inc/header.php';
?>
<div class="content">
    <!-- <img class="login" src="<?php URLROOT?>/img/login-bg.png" /> -->
    <div>
        <div class="login-card login-card__position">
            <?php flash('register_success'); ?>
            <h2>Login to your Account</h2>
            <p>Pleasse fill in your creditentials</p>
            <form class="user-form user-form__login" action="<?php echo URLROOT; ?>/users/login" method="POST">
                <div class="form-group form-group__login">
                    <label for="ad_username">Username:
                        <sup class="fa" style="right:-2.9em; top: -1.3em;">*</sup>
                    <input type="text" name="ad_username" class="user-form form-control form-control-lg
                        <?php echo(!empty($data['ad_username_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['ad_username'];?>" />
                        </label>
                    <span class="invalid-feedback"><?php echo $data['ad_username_err'];?></span>
                </div>

                <div class="form-group">
                    <label for="ad_password">Password: <sup class="fa" style="right:-5em; top: -1.3em;">*</sup>
                    <input type="password" name="ad_password" class="user-form form-control form-control-lg
                        <?php echo(!empty($data['ad_password_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['ad_password'];?>" />
                        </label>
                    <span class="invalid-feedback"><?php echo $data['ad_password_err'];?></span>
                </div>

                <div class="form-group form-group__button">
                            <input type="submit" value="Cancel" >
                            <input type="submit" value="Login">
                </div>
                    <a href="<?php echo URLROOT; ?>/users/register" class="reg-btn">No account?
                        REGISTER.</a>
            </form>
        </div>
    </div>

</div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php';?>