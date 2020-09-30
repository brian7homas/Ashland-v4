<?php 
require APPROOT . '/views/inc/header.php';

?>
<div class="content">    
        <div class="row">
            <?php flash('register_success'); ?>
            <div class="row">
                <h1 class="headline-text headline-text-center">Administrator Login</h1>
                <p class="headline-text-center">Fill in your creditentials</p>
            </div>
            <form class="user-form" action="<?php echo URLROOT; ?>/adminusers/login" method="POST">
                <div class="form-group">
                    <label for="ad_username">Username:
                        <sup class="fa" style="right:-2.9em; top: -1.3em;">*</sup>
                        <span class="invalid-feedback"><?php echo $data['ad_username_err'];?></span>
                    </label>
                    <input type="text" name="ad_username" class="user-form form-control" 
                        <?php echo(!empty($data['ad_username_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['ad_username'];?>" />
                </div>
                

                <div class="form-group">
                    <label for="ad_password">Password: 
                        <span class="invalid-feedback"><?php echo $data['ad_password_err'];?></span>
                    </label>
                    
                    <input type="password" name="ad_password" class="user-form form-control" 
                        <?php echo(!empty($data['ad_password_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['ad_password'];?>" />
                </div>

                <div class="form-group form-group__button">
                            <input type="button" value="Cancel" >
                            <input type="submit" value="Login">
                </div>
                
                    <a href="<?php echo URLROOT; ?>/users/register" class="reg-btn">No account?
                        REGISTER.</a>
            </form>
        </div>
    </div>

</div>
</div>


<?php require APPROOT . '/views/inc/footer.php';?>