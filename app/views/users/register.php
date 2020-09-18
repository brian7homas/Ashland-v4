<?php 
require APPROOT . '/views/inc/header.php';

?>

<div id="content">
    <div >
        <div >
            <h2>Create Account</h2>
            <p>Pleasse fill out to regsiter</p>
            <form class="user-form" action="<?php echo URLROOT; ?>/users/register" method="POST">
                <div class="form-group">

                    <label for="name">Name: <sup class="fa">*</sup>
                    <input type="text" name="name" class="form-control form-control-lg 
                        <?php echo(!empty($data['name_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['name'];?>" />
                        </label>
                    <span class="invalid-feedback"><?php echo $data['name_err'];?></span>
                </div>

                <div class="form-group">
                    <label for="email">Email: <sup class="fa">*</sup>
                    <input type="email" name="email" class="form-control form-control-lg 
                        <?php echo(!empty($data['email_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['email'];?>" />
                        </label>
                    <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup class="fa">*</sup>
                    <input type="password" name="password" class="form-control form-control-lg 
                        <?php echo(!empty($data['password_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['password'];?>" />
                        </label>
                    <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup class="fa">*</sup>
                    <input type="password" name="confirm_password" class="form-control form-control-lg
                        <?php echo(!empty($data['confirm_password_err'])) ? 'is-invalid': ''; ?>"
                        value="<?php echo $data['confirm_password'];?>" />
                        </label>
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err'];?></span>
                </div>
                <div class="form-group button__mt">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-ligh btn-block">Have an account?
                            LOGIN.</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php';?>