<nav class="navbar navbar-expand-lg mb-3 navigation">
    <div class="container">
        <!-- <a class="navbar-brand" href="<?php echo URLROOT ?>"><?php echo SITENAME ?> </a> -->
        <a href="<?php echo URLROOT ?>"><img class="logo" src="<?php  echo URLROOT ?>/public/img/smLogo.png" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span><svg onClick="moveUp()" class="hamburger" xmlns="http://www.w3.org/2000/svg" width="30" height="25"
                    viewBox="0 0 30 25">
                    <g id="Group_292" data-name="Group 292" transform="translate(-5 -7.5)">
                        <line id="Line_15" data-name="Line 15" x2="30" transform="translate(5 10)" fill="none"
                            stroke="#000" stroke-width="5" />
                        <line id="Line_16" data-name="Line 16" x2="30" transform="translate(5 20)" fill="none"
                            stroke="#000" stroke-width="5" />
                        <line id="Line_17" data-name="Line 17" x2="30" transform="translate(5 30)" fill="none"
                            stroke="#000" stroke-width="5" />
                    </g>
                </svg></span>
        </button>

        <div class="navbar">
            <ul class="navbar-nav user-nav">


            </ul>
            <ul class="navbar-nav mr-0 user-nav">
                <!-- PHP USED TO CHECK FOR SESSION VARIABLES 
                IF THEY EXIST REGISTER AND LOGIN LINKS WILL NOT BE PRESENT -->
                <?php if(isset($_SESSION['user_id'])): ?>
                <li class="nav-item ">
                    <a class="nav-link" href="#">How's it going? <?php echo $_SESSION['user_name'];?> </a>
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
                    <a class="nav-link" href="<?php echo URLROOT?>/users/register">Register User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT;?>/newplayers/register">Newplayers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT;?>/users/login">Login</a>
                </li>

                <?php endif; ?>
            </ul>

        </div>
    </div>
</nav>