<?php 
// Load config
require_once 'config/config.php';
//Load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/newplayer_helper.php';

// Auto Load core Libraries
spl_autoload_register(function($className){
    require_once 'libaries/' . $className . '.php';
});