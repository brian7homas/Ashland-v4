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
            'title' => 'Welcome to the Ashland website login to see more information.',
            'description' => 'teams'
        ];
        $this->view('pages/teams', $data);
    }
    public function action(){
        $data = [
            'title' => 'Welcome to the Action Page',
            'description' => 'Action!!!'
        ];
        $this->view('pages/action', $data);
    }

    public function maps(){
        $data = [
            'title' => 'Find Where Your Next Game Is',
            'description' => 'Maps'
        ];
        $this->view('pages/maps', $data);
    }

    public function schedule(){
        $data = [
            'title' => 'Schedules',
            'description' => 'Find the directions you need'
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