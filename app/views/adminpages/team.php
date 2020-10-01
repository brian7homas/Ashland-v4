<?php require APPROOT . '/views/inc/header.php'; 
?>


<div class="header jumbotron-fluid text-center">
    
    <div class="container">
        <h1 style="color: black"class="display-4">
        <?php 
                echo $data['title'] . "<br>";
            ?>
        </h1>
        <p class="subheadline__large">
            <?php 
                echo $data['description'] . "<br>";
            ?>
        </p>
    </div>
</div>

<section class="content">
    <div class="row">
        <div class="section">
            <h1 class="headline-text">Team menu</h1>
        </div>
    </div>
    <div class="row">
        <div class="section">
            <form class="user-form">
                <div class="form-group">
                    <label>Team</label>
                    
                    <div class="dropdown">
                    <button class="dropbtn">Dropdown</button>    
                        <div class="dropdown-content">
                            <a href="#"><?php echo $data['aardvarks']; ?></a>
                            <a href="#"><?php echo $data['antelopes']; ?></a>
                            <a href="#"><?php echo $data['boxeers']; ?></a>
                            <a href="#"><?php echo $data['broncos']; ?></a>
                            <a href="#"><?php echo $data['buffalos']; ?></a>
                            <a href="#"><?php echo $data['culdesacs']; ?></a>
                        </div>
                    </div>
                </div>            
            </form>
        </div>
    </div>
</section>
    <ul>
    <li><a href="#"><?php echo $data['add'] ?></a></li>
    <li><a href="#"><?php echo $data['remove'] ?></a></li>
    <li><a href="#"><?php echo $data['edit'] ?></a></li>
    </ul>





<?php require APPROOT . '/views/inc/footer.php'; ?>