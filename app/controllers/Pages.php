<?php 
    //default controller
class Pages extends Controller{
    public function __construct(){
        // How we load models 
        // $this->postModel = $this->model('Post');
        $this->adminpageModel = $this->model('AdminPage');
        
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
                'dropdown' => true,
                
                //team data
                'head_coach/1/name' => 'Mary Bruce',
                'head_coach/1/title' => 'Head Coach',
                'head_coach/1/description' => 'Mary spent time playing professional soccar as a player on the Portland Timbers.Head Coach',
                
                
                'assistant_coach/1/name' => 'Kelly Jorden',
                'assistant_coach/1/title' => 'Assistant Coach', 
                'assistant_coach/1/description' => "Kelly is a 3rd year college student who was just nominated as MVP on her school's soccar team.",
                
                'head_coach/2/name' => 'John Smith',
                'head_coach/2/title' => 'Head Coach',
                'head_coach/2/description' => 'John is a former 8th grade science teacher with a passion for passing on his leadership skills',
                
                'assistant_coach/2/name' => 'Alex Summers',
                'assistant_coach/2/title' => 'Assistant Coach',
                'assistant_coach/2/description' => 'Alex brings charisma and personality. Oh and also some serious soccar skills',
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
            'bg-img' => '/pics/maps-cover.jpg',
            
            'team' => trim($_POST['team']),
            'team_err' =>''
            
        ];
        
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            
            //check for team variable 
            if(empty($data['team'])){
                $data['team_err'] = 'Please select a team';
            }
            
            
            if($data['team'] != NULL && empty($data['team_err'])){
                // echo $data['team'];
                $teamid = $this->adminpageModel->getTeamID($data['team']);
                if($teamid){
                    $gameid = $this->adminpageModel->getGameID($teamid->teamid);
                    if(!empty($teamid) && !empty($gameid)){
                        //! use these arrays to bring game data to front end
                        $teamNames = array();
                        $gameDay = array();
                        $gameTime = array();
                        $field = array();
                        //! provides gameid's to get game_data
                        foreach($gameid as $key=>$value){
                            //returns every gameid matching the currently selected team 
                            $gamesid = $value->gameid;   
                            $data['game_data']= $this->adminpageModel->getSchedule($gamesid, $data['team']);
                            sort($data['game_data']);
                            foreach($data['game_data'] as $key => $value){
                                $teamNames[] = $value->team_name;
                                $gameDay[] = $value->gm_date;
                                $gameTime[] = $value->gm_time;
                                $field[] = $value->fld_name;
                                
                                // $data['game_data'] = $value->team_name;
                                $data['game_date'] = $value->gm_date;
                            }
                            // var_dump($data['game_data']);
                            //? PASS THE VALUES IN TEAMNAMES TO GAME DATA ARRAY
                            $data['game_date'] = $gameDay;
                            //? PASS THE VALUES IN TEAMNAMES TO GAME DATA ARRAY
                            $data['opp'] = $teamNames;
                            //? PASS THE VALUES IN TEAMNAMES TO GAME DATA ARRAY
                            $data['field'] = $field;
                            
                            
                            // var_dump($field);
                            // var_dump($gameTime);
                            $data['game_time'] = $gameTime; 
                            $data['field'] = $field; 
                        }
                    }
                }
                $this->view('pages/schedule', $data);
            }
            // DATA['TEAM'] IS NULL
            $this->view('pages/schedule', $data);
        }
        //DEFAULT PAGE LOAD 
        // POST FAILD/ NOT INITIATED
        $this->view('pages/schedule', $data);
    }


}