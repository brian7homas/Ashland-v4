</div>
</main>
<!-- ======= Footer ======= -->
<footer class="site-footer">
    <div class="bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-xs-12 text-lg-left text-center">
            <span class="copyright-text">
              <a href="<?php echo URLROOT; ?>">&copy; Copyright <strong>Ashland</strong></a>. All Rights Reserved
            </span>
            <div class="credits">
              <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bell
            -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>

          <div class="col-lg-6 col-xs-12 text-lg-right text-center">
            <ul class="list-inline">
                
              <li class="list-inline-item">
                <a href="<?php echo URLROOT; ?>">Home</a>
              </li>

              <li class="list-inline-item">
                <a href="#about">About Us</a>
              </li>

              <li class="list-inline-item">
                <a href="#features">Features</a>
              </li>

              <li class="list-inline-item">
                <a href="#portfolio">Portfolio</a>
              </li>

              <li class="list-inline-item">
                <a href="#team">Team</a>
              </li>
              <li class="list-inline-item">
                <a href="#contact">Contact</a>
              </li>
              <?php if($_SESSION['adminid']): ?>
                <li class="list-inline-item">
                    <a href="<?php echo URLROOT;?>/adminusers/logout">Admin Logout</a>
                </li>
              <?php endif; ?>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>
  
    <script src="<?php echo URLROOT;  ?>/js/gsap.min.js"></script>
    <script src="<?php echo URLROOT;  ?>/js/ScrollTrigger.min.js"></script>
    <!-- <script src="bundled.js"></script> -->
    <script  src="<?php echo URLROOT; ?>/assets/bundled.js"></script>
    
  <!-- Vendor JS Files -->
  <script src="<?php echo URLROOT; ?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/vendor/tether/js/tether.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/vendor/lockfixed/jquery.lockfixed.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/vendor/superfish/superfish.min.js"></script>
  <script src="<?php echo URLROOT; ?>/assets/vendor/hoverIntent/hoverIntent.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo URLROOT; ?>/assets/js/main.js"></script>
  

</body>

</html>