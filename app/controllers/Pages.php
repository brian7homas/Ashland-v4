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
            redirect('adminpages/index');
        }
        $data = ['title' => 'Ashland',
                'description' => 'Welcome to the Ashland Valley Soccer League Web Site - Your source for complete information on League game schedules, registration, field directions, and photos of recent games and teams.',
                'teams' => 'Teams',
                'action' => 'Action',
                'maps' => 'Maps',
                'signup' => 'Register',
                // 'admin' => 'Admin'
                'bg-img' => '/pics/cover.jpg',
                'dropdown' => true
                ];        
        $this->view('pages/index', $data);
    }
    public function teams(){
        $data = [
            'title' => 'Teams',
            'description' => 'Modify team data here.',
            
            //dropdown only appears on pages not page/index
            'dropdown' => false,
            //dynamic hero img
            'bg-img' => '/pics/main.jpg'
        ];
        $this->view('pages/teams', $data);
    }
    public function action(){
        $data = [
            'title' => 'ACTION',
            'description' => 'See some of the action!!',
            
            'dropdown' => false,
            'bg-img' => '/pics/action_cover.jpg'
        ];
        $this->view('pages/action', $data);
    }

    public function maps(){
        $data = [
            'title' => 'Maps',
            'description' => 'Find Where Your Next Game Is',
            
            'dropdown' => false,
            'bg-img' => '/pics/maps-cover.jpg'
        ];
        $this->view('pages/maps', $data);
    }

    public function schedule(){
        $data = [
            'title' => 'Schedules',
            'description' => 'Find specific information about each game here.',
            
            'dropdown' => false,
            'bg-img' => '/pics/maps-cover.jpg'
            
        ];
        $this->view('pages/schedule', $data);
    }


}