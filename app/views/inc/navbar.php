<nav class="navbar">
    <div class="navbar__container-inner">
        <a href="<?php if($_SESSION['adminid']){echo URLROOT . "/adminpages/index";}else{echo URLROOT;} ?>"><img class="logo" src="<?php  echo URLROOT ?>/public/img/smLogo.png" /></a>
        <div class="user-nav">
            <ul class="user-nav-list">
                <?php if($_SESSION['adminid'] OR $_SESSION['user_name']): ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">How's it going? <?php echo $_SESSION['user_name']; echo $_SESSION['ad_username']; ?> </a>
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
                    <a class="nav-link" href="<?php 
                            if(isset($_SESSION)){
                                switch(true){
                                    case ($_SESSION['adminid']):
                                        echo URLROOT . "/adminusers/logout";
                                        break;
                                    case($_SESSION['user_name']):
                                        echo URLROOT . "/users/logout";
                                }
                            } 
                    ?>">Logout 
                    </a>
                </li>
                <?php else:?>
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
                <li class="nav-item">
                    <a class="user-nav-link" href="<?php echo URLROOT;?>/pages/teams">Teams</a>
                </li>
                <li class="nav-item">
                    <a class="user-nav-link" href="<?php echo URLROOT;?>/pages/action">Action</a>
                </li>
                <li class="nav-item">
                    <a class="user-nav-link" href="<?php echo URLROOT;?>/pages/schedule">Schedule</a>
                </li>
            </ul>
        </div>
    </div>
    <button class ="hamburger navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span><img src="<?php echo URLROOT;?>/img/menu.svg"</span>
    </button>
</nav>