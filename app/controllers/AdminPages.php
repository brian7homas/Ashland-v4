<?php 

class AdminPages extends Controller{
    public function __construct(){
        if(!isset($_SESSION['adminid'])){
            redirect('adminusers/login');
        }
        $this->adminpageModel = $this->model('AdminPage');
        $this->adminModel = $this->model('AdminUser');
    }
    public function index(){
        $data = [
                'title' => 'Ashland admin',
                'description' => 'This is the admin page',
                ];        
        $this->view('adminpages/index', $data);
  }
  public function team(){
    $data = ['title' => 'Team Manager',
             'add' => 'Add players',
             'remove' => 'Remove players',
             'edit' => 'Edit player info',
            'description' => 'This page allows you to add/remove and view players on a specific team.',
            ];        
    $this->view('adminPages/team', $data);
}
public function player(){
    $data = ['title' => 'Player Manager',
             'add' => 'Add players',
             'remove' => 'Remove players',
             'edit' => 'Edit player info',
            'description' => 'This page allows you to edit/view the status of players as well as add new players to teams.',
            ];        
    $this->view('adminPages/player', $data);
}
public function games(){
    $data = ['title' => 'Game Manager',
             'add' => 'Add players',
             'remove' => 'Remove players',
             'edit' => 'Edit player info',
            'description' => 'This page allows you to add/edit games data.',
            ];        
    $this->view('adminPages/games', $data);
}
        public function createUserSession($user){
          //setting user id to session variable
            $_SESSION['adminid'] = $user->id;
            $_SESSION['ad_username'] = $user->username;
            $_SESSION['ad_fname'] = $user->name;
            redirect('adminpages');
        }
        public function logout(){
            unset($_SESSION['adminid']);
            unset($_SESSION['ad_username']);
            unset($_SESSION['ad_fname']);
            session_destroy();
            redirect('adminusers/login');
        }
            // Check Logged In
        public function isLoggedIn(){
            if(isset($_SESSION['adminid'])){
            return true;
            } else {
            return false;
            }
        }
}
