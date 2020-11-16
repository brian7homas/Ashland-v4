<?php 
require APPROOT . '/views/inc/header.php'; 
echo "editPlayer.php";
var_dump($data['pla_phone']);
?>


<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="section-title">
                    <?php echo $data['editTitle'] ?>
                </h2>
                <h4>
                    <?php echo $data['editInfo']; ?>
                </h4>
            </div>
        </div>
    </div>
</section>

<section class="row justify-content-center">
    
        <div class="col-lg-5 col-med-8">
            <h1 class="headline-text headline-text-center">Edit <?php echo $data['pla_fname']; ?></h1>
            <div class="form">
                <form id="form" class="" method='POST' role="form">     
                <div class="form-group">
                    <label for="">First Name: </label>
                    <input type="text" name="pla_fname" class="form-control" id="pla_fname" placeholder="<?php echo $data['pla_fname'] ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="">Last Name: </label>
                    <input type="text" class="form-control" name="pla_lname" id="pla_lname" placeholder="<?php echo $data['pla_lname']; ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="">Phone: </label>
                    <input type="text" class="form-control" name="pla_phone" id="pla_phone" placeholder="<?php echo $data['pla_phone']; ?>" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="">Parent First Name: </label>
                    <input type="text" class="form-control" name="pla_par_fname" id="pla_par_fname" placeholder="<?php echo $data['pla_par_fname']; ?>" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="">Parent Last Name: </label>
                    <input type="text" class="form-control" name="pla_par_lname" id="pla_par_lname" placeholder="<?php echo $data['pla_par_lname']; ?>" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="">Address: </label>
                    <input type="text" class="form-control" name="pla_add" id="pla_add" placeholder="<?php echo $data['pla_add']; ?>" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="">City: </label>
                    <input type="text" class="form-control" name="pla_city" id="pla_city" placeholder="<?php echo $data['pla_city']; ?>" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="">State: </label>
                    <input type="text" class="form-control" name="pla_state" id="pla_state" placeholder="<?php echo $data['pla_state']; ?>" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="">Zip: </label>
                    <input type="text" class="form-control" name="pla_zip" id="pla_zip" placeholder="<?php echo $data['pla_zip']; ?>" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="">Date Of Birth: </label>
                    <input type="text" class="form-control" name="pla_bdate" id="pla_bdate" placeholder="<?php echo $data['pla_bdate']; ?>" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                </div>
                
                
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5"  data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="mb-3">
                  <!-- <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div> -->
                </div>
                <div class="text-center">
                    <button type="reset" id='clear'>Reset</button>
                    <button type="submit">Submit Changes</button>
                </div>
                    
                </form>
            </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; 
?>
