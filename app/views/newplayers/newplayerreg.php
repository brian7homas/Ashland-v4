<?php 
require APPROOT . '/views/inc/header.php';

?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>You have registered <?php echo $data["pla_fname"] ?></h2>
                <p>You will be hearing from our team shotly at <?php echo $data['pla_email'];?></p>
                <p>Click <a href="<?php echo URLROOT; ?>">here</a> to return to homepage</p>
            </div>

        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php';?>