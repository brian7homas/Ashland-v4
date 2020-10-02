<?php require APPROOT . '/views/inc/header.php'; 
?>


<div class="user-header">    
    <div class="user-header__container-inner">
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

<div class="content">
    <div class="row">
        <div class="row-flex row-flex-column row-flex-column-center">
            <h1 class="subheadline__med">Select a Team to modify it</h1>    
            <form class="user-form section__half padding-1" action="<?php echo URLROOT;?>/adminpages/team" method="POST">
                <label class="subheadline__sm" for="team" ><?php echo $data['dropdown'];?>
                </label>            
                <select name="team">
                    <option selected value="aardvarks"><?php echo $data['aardvarks']; ?></option>
                    <option  value="antelopes"><?php echo $data['antelopes']; ?></option>
                    <option   value="boxers"><?php echo $data['boxers']; ?></option>
                    <option  value="broncos"><?php echo $data['broncos']; ?></option>
                    <option  value="buffalos"><?php echo $data['buffalos']; ?></option>
                    <option  value="culdesacs"><?php echo $data['culdesacs']; ?></option>
                </select>
                <input class="color-pd width-half row" type="submit" value="select team"/>            
                <span><?php 
                    if(isset($data['team_err'])){
                        echo $data['team_err'];
                }; ?></span>                
            </form>
        </div>
    </div>  
    <div class="row">
        <div class="row">
            <?php  
                $players = $this->adminpageModel->getTeam($data['team']);
                foreach($players as $key  => $object):?>
                    <?php
                    $playerFirstName = $object->pla_fname;
                    $playerLastName = $object->pla_lname;
                    $playerPhone = $object->pla_phone;
                    ?>
                    <div class="row-flex row-flex-column-center">
                        <p class="color-pd"><?php echo $playerFirstName; ?></p>
                        <p class="color-pd"><?php echo $playerLastName; ?></p>
                        <p class="color-pd"><?php echo $playerPhone; ?></p>
                    </div>
                <?php endforeach;?>
        </div>
    </div>
</div>
    <ul class="content">
        <li><a href="#"><?php echo $data['add'] ?></a></li>
        <li><a href="#"><?php echo $data['remove'] ?></a></li>
        <li><a href="#"><?php echo $data['edit'] ?></a></li>
    </ul>





<?php require APPROOT . '/views/inc/footer.php'; ?>