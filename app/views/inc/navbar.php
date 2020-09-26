<nav class="navbar navbar-expand-lg mb-3 navigation">
    <div class="container">
        <!-- <a class="navbar-brand" href="<?php echo URLROOT ?>"><?php echo SITENAME ?> </a> -->
        <a href="<?php echo URLROOT ?>"><img class="logo" src="<?php  echo URLROOT ?>/public/img/smLogo.png" /></a>
        <div class="navbar user-nav">
            <!-- <ul class="navbar-nav ">
            </ul> -->
            <ul class="user-nav-list navbar-nav">
                <!-- PHP USED TO CHECK FOR SESSION VARIABLES 
                IF THEY EXIST REGISTER AND LOGIN LINKS WILL NOT BE PRESENT -->
                <?php if(is_null($_SESSION['adminid'])): ?>
                <li class="nav-item ">
                    <a class="nav-link" href="#">How's it going? <?php echo $_SESSION['ad_username'];?> </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">More</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="<?php echo URLROOT;?>/pages/teams">Teams</a>
                        <a class="dropdown-item" href="<?php echo URLROOT; ?>/pages/action">Action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?php echo URLROOT?>/users/logout">Logout </a>
                </li>
                <?php else:?>
                <li class="nav-item ">
                    <a class="user-nav-link" href="<?php echo URLROOT?>/users/register">Register User</a>
                </li>
                <li class="nav-item ">
                    <a class="user-nav-link" href="<?php echo URLROOT?>/adminusers/register">Register Admin User</a>
                </li>
                <li class="nav-item">
                    <a class="user-nav-link" href="<?php echo URLROOT;?>/newplayers/register">New players</a>
                </li>
                <li class="nav-item">
                    <a class="user-nav-link" href="<?php echo URLROOT;?>/users/login">Users Login</a>
                </li>
                <li class="nav-item">
                    <a class="user-nav-link" href="<?php echo URLROOT;?>/adminusers/login">Admin Login</a>
                </li>

                <?php endif; ?>
            </ul>

        </div>
    </div>
    <button class ="hamburger navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span><img src="<?php echo URLROOT;?>/img/menu.svg"</span>
        </button>
</nav>