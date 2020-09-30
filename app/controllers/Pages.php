<?php 
    //default controller
class Pages extends Controller{
    public function __construct(){
        // How we load models 
        // $this->postModel = $this->model('Post');
        

    }
    //defualt method
    public function index(){
        if(isLoggedIn()){
            redirect('posts');
        }
        $data = ['title' => 'Ashland',
                'description' => 'Welcome to the Ashland Valley Soccer League Web Site - Your source for complete information on League game schedules, registration, field directions, and photos of recent games and teams.',
                'teams' => 'Teams',
                'action' => 'Action',
                'maps' => 'Maps',
                'signup' => 'Register',
                // 'admin' => 'Admin'

                ];        
        $this->view('pages/index', $data);
    }
    public function teams(){
        $data = [
            'title' => 'Teams',
            'description' => 'Modify team data here.'
        ];
        $this->view('pages/teams', $data);
    }
    public function action(){
        $data = [
            'title' => 'ACTION',
            'description' => 'See some of the action!!'
        ];
        $this->view('pages/action', $data);
    }

    public function maps(){
        $data = [
            'title' => 'Maps',
            'description' => 'Find Where Your Next Game Is'
        ];
        $this->view('pages/maps', $data);
    }

    public function schedule(){
        $data = [
            'title' => 'Schedules',
            'description' => 'Find specific information about each game here.'
        ];
        $this->view('pages/schedule', $data);
    }

    // public function admin(){
    //     $data = [
    //         'title' =>'Admin',
    //         'description' => 'Signup for an admin profile here'    
    //     ];
    //     $this->view('adminUsers/register', $data);
    // }

}