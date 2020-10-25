<?php 

    class AdminPlayers extends Controller{
    public function __construct(){
        // Gives access to the AdminUser file in the models folder 
        $this->adminModel = $this->model('AdminUser')
    }
    // Display all players with team names
    public funciton Index(){
        
    }
}