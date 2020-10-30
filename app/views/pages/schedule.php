<?php 
require APPROOT . '/views/inc/header.php';
?>

<div class="user-header">
    <img class="hero-img" src="<?php URLROOT ?>/pics/maps-cover.jpg" />
    <div class="user-header__container-inner">
        <h1 class="user-header__headline">
            <?php 
                echo $data['title']."<br>";                
            ?>
        </h1>
        <p class="user-header__sub-headline">
            <?php
                echo $data['description'] . "<br>";
                echo "version: " . APPVERSION; 
            ?>
        </p>
    </div>
</div>

<section class="content">
    <div class="row">
        <form class="schedule">
            <div class="form-group">
                <label>the <strong class="subheadline__med">Aardvarks</strong></label>
                <input class="dropdown" value=""/>
                <span>span</span>
            </div>
            
            <div class="form-group">
                <p class="align-center padding-1 subheadline__large">will be facing..</p>
            </div>
            
            <div class="row-flex">
                <table>
                    <tr>
                        <th>
                            <label>Who?</label>
                        </th>
                        <td>
                            <label for="opponent1">Broncos</label>
                        </td>
                        
                    </tr>
                    <tr>
                        <th>
                            <label>When?</label>
                        </th>
                        <td>
                            <label for="opponent1">July 1st</label>
                        </td>
                        
                    </tr>
                    <tr>
                        <th>
                            <label>Where?</label>
                        </th>
                        <td>
                            <label for="opponent1">Whalburg Park</label>
                        </td>
                    </tr>
                </table>
                
                <table>
                    <tr>
                        <th>
                            <label>Who?</label>
                        </th>
                        <td>
                            <label for="opponent1">Aardvarks</label>
                        </td>
                        
                    </tr>
                    <tr>
                        <th>
                            <label>When?</label>
                        </th>
                        <td>
                            <label for="opponent1">July 11th</label>
                        </td>
                        
                    </tr>
                    <tr>
                        <th>
                            <label>Where?</label>
                        </th>
                        <td>
                            <label for="opponent1">Shicct's creek</label>
                        </td>
                    </tr>
                </table>
            
            </div>
            <div class="row-flex">
                <table>
                    <tr>
                        <th>
                            <label>Who?</label>
                        </th>
                        <td>
                            <label for="opponent1">Broncos</label>
                        </td>
                        
                    </tr>
                    <tr>
                        <th>
                            <label>When?</label>
                        </th>
                        <td>
                            <label for="opponent1">July 1st</label>
                        </td>
                        
                    </tr>
                    <tr>
                        <th>
                            <label>Where?</label>
                        </th>
                        <td>
                            <label for="opponent1">Whalburg Park</label>
                        </td>
                    </tr>
                </table>
                
                <table>
                    <tr>
                        <th>
                            <label>Who?</label>
                        </th>
                        <td>
                            <label for="opponent1">Aardvarks</label>
                        </td>
                        
                    </tr>
                    <tr>
                        <th>
                            <label>When?</label>
                        </th>
                        <td>
                            <label for="opponent1">July 11th</label>
                        </td>
                        
                    </tr>
                    <tr>
                        <th>
                            <label>Where?</label>
                        </th>
                        <td>
                            <label for="opponent1">Shicct's creek</label>
                        </td>
                    </tr>
                </table>
            
            </div>
        </form>
    </div>
    
    <div class="section row-flex-column">
        <h1 class="subheadline__med align-center">Maps</h1>
        <h1 class="subheadline__med align-center">Locations</h1>
        <h1 class="subheadline__med align-center">Directions</h1>
    </div>
    
        
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php';?>