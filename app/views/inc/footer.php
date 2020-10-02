</main>

<footer id="footer" >
    <div class="footer-wrapper ">
        <div class="footer-links">
            <h4>
                <a href="#"><strong>Ashland</strong> Soccer</a>
            </h4>
            <p><a href="#">555.555.5555</a></p>
            <div>
                <div class="footer-nav">
                    <h3>Administrator</h3>
                    <nav>
                        <ul class="footer-list">
                        <?php if($_SESSION['adminid']): ?>
                                <li><a href="<?php echo URLROOT;?>/adminusers/logout">Admin Logout</a></li>
                            <?php else:?>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Sign-In</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        

    </div>
    <div class="footer-contact">
        <ul>
            <li>About</li>
            <li>Press</li>
            <li>Developers</li>
            <li>Channels</li>
            <li>Sport</li>
            <li>Culture</li>
            <li>Privacy</li>
        </ul>
    </div>


</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script> 
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script> -->

<script src="<?php echo URLROOT;  ?>/js/gsap.min.js"></script>
<script src="<?php echo URLROOT;  ?>/js/ScrollTrigger.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/ScrollTrigger.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/EasePack.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/CSSRulePlugin.min.js"></script>

<!-- <script src="<?php echo URLROOT;  ?>/js/bundled.js"></script> -->
<script src="<?php echo URLROOT;  ?>/js/main.js"></script>
</body>

</html>