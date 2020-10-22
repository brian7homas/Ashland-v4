<?php 
require APPROOT . '/views/inc/header.php';

?>

<div id="content">
    <div >
        <div >
            <h2 class="headline-text headline-text-center">Create Account</h2>
            <p class="headline-text-center">Pleasse fill out to regsiter</p>
            <form class="user-form" action="<?php echo URLROOT; ?>/users/register" method="POST">
                <div class="form-group">
                    <label for="name">Name: <sup class="fa">*</sup>
                        <span class="invalid-feedback"><?php echo $data['name_err'];?></span>
                    </label>
                    <input type="text" name="name" class="form-control form-control-lg 
                        <?php echo(!empty($data['name_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['name'];?>" />
                </div>

                <div class="form-group">
                    <label for="email">Email: <sup class="fa">*</sup>
                        <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
                    </label>
                    <input type="email" name="email" class="form-control form-control-lg 
                        <?php echo(!empty($data['email_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['email'];?>" />
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup class="fa">*</sup>
                        <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
                    </label>
                    <input type="password" name="password" class="form-control form-control-lg 
                        <?php echo(!empty($data['password_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['password'];?>" />
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup class="fa">*</sup>
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err'];?></span>
                    </label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg
                        <?php echo(!empty($data['confirm_password_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['confirm_password'];?>" />
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Register" class="form-group form-group__button">
                </div>
                <a href="<?php echo URLROOT; ?>/users/login" class="">Have an account? LOGIN.</a>
            </form>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php';?>