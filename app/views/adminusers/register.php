<?php 
require APPROOT . '/views/inc/header.php';

?>
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="section-title"><?php echo $data['title']; ?></h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4">

                <div class="info">
                    <div>
                        <i class="fa fa-map-marker"></i>
                        <p>A108 Adam Street<br>New York, NY 535022</p>
                    </div>

                    <div>
                        <i class="fa fa-envelope"></i>
                        <p>info@example.com</p>
                    </div>

                    <div>
                        <i class="fa fa-phone"></i>
                        <p>+1 5589 55488 55s</p>
                    </div>

                </div>

            </div>

            <div class="col-lg-5 col-md-8">
                <div>
                    <form action="<?php echo URLROOT; ?>/adminusers/register" method="post" role="form">

                        <div class="form-group">
                            
                            <input type="hidden" name="adminid" class="form-control form-control-lg 
                            <?php echo(!empty($data['adminid_err'])) ? 'is-invalid': ''; ?>"
                            value="<?php echo $data['adminid_err'];?>" />
                            <div class="validate"></div>
                        </div>

                        <div class="form-group">
                            <label for="name">First Name: <sup class="fa">*</sup></label>
                            <input type="text" name="ad_fname" class="form-control form-control-lg 
                                <?php echo(!empty($data['ad_fname_err'])) ? 'is-invalid': ''; ?>"
                                value="<?php echo $data['ad_fname'];?>" />
                                <span class="invalid-feedback"><?php echo $data['ad_fname_err'];?></span>
                                <div class="validate"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="name">Last Name: <sup class="fa">*</sup></label>
                            <input type="text" name="ad_lname" class="form-control form-control-lg 
                                <?php echo(!empty($data['ad_lname_err'])) ? 'is-invalid': ''; ?>"
                                value="<?php echo $data['ad_lname'];?>" />
                                
                            <span class="invalid-feedback"><?php echo $data['ad_lname_err'];?></span>
                        </div>
                        
                        <div class="form-group">
                            <label for="name">Username: <sup class="fa">*</sup></label>
                            <input type="text" name="ad_username" class="form-control form-control-lg 
                                <?php echo(!empty($data['ad_username_err'])) ? 'is-invalid': ''; ?>"
                                value="<?php echo $data['ad_username'];?>" />
                            <span class="invalid-feedback"><?php echo $data['ad_username_err'];?></span>
                        </div>
                        
                        <div class="form-group">
                            <label for="ad_password">Password: <sup class="fa">*</sup></label>
                            <input type="password" name="ad_password" class="form-control form-control-lg 
                                <?php echo(!empty($data['ad_password_err'])) ? 'is-invalid': ''; ?>"
                                value="<?php echo $data['ad_password'];?>" />
                            <span class="invalid-feedback"><?php echo $data['ad_password_err'];?></span>
                        </div>
                        <!-- CONFIRM PASSWORD -->
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password: <sup class="fa">*</sup></label>
                            <input type="password" name="ad_confirm_password" class="form-control form-control-lg
                                <?php echo(!empty($data['ad_confirm_password_err'])) ? 'is-invalid': ''; ?>"
                                value="<?php echo $data['ad_confirm_password'];?>" />                                
                            <span class="invalid-feedback"><?php echo $data['ad_confirm_password_err'];?></span>
                        </div>


                        <div class="mb-3">

                        </div>
                        <div class="text-center">
                            <button class="btn" type="submit">Register</button>
                            <a href="<?php echo URLROOT; ?>/adminusers/login" class="btn btn-sm">Have an account? Login
                                here.</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section><!-- End Contact Section -->

<?php require APPROOT . '/views/inc/footer.php';?>