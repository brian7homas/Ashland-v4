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
                $teams = $this->adminpageModel->getTeams();
                sort($teams);
                
                //? outputs each team name 
                //! need to figure out how to put each into seperate variables (for loop?)
                // foreach ($teams as $key  => $object) {
                    
                //     $team = $object->team_name;
                //     echo $team;
                // }
                
                $data = ['title' => 'Team Manager',
                        'add' => 'Add players',
                        'remove' => 'Remove players',
                        'edit' => 'Edit player info',
                        'description' => 'This page allows you to add/remove and view players on a specific team.',
                        'dropdown' => 'Select a Team',
                        'aardvarks' => $teams[0]->team_name,
                        'antelopes' => $teams[1]->team_name,
                        'boxers' => $teams[2]->team_name,
                        'broncos' => $teams[3]->team_name,
                        'buffalos' => $teams[4]->team_name,
                        'culdesacs' => $teams[5]->team_name,
                        ];
                
                //when the form is submitted
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    
                    // echo 'inside post in adminpages controller';
                    $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                    $data = [
                        'title' => 'Team Manager',
                        'add' => 'Add players',
                        'remove' => 'Remove players',
                        'edit' => 'Edit player info',
                        'description' => 'This page allows you to add/remove and view players on a specific team.',
                        'dropdown' => 'Select a Team',
                        'aardvarks' => $teams[0]->team_name,
                        'antelopes' => $teams[1]->team_name,
                        'boxers' => $teams[2]->team_name,
                        'broncos' => $teams[3]->team_name,
                        'buffalos' => $teams[4]->team_name,
                        'culdesacs' => $teams[5]->team_name,
                        'team' => trim($_POST['team']), 
                        'team_err' => ''
                        ];
                    //check for input
                    if(empty($data['team'])){
                        $data['team_err'] = "something went wrong";
                    }
                    if(empty($data['team_err'])){
                        if($this->adminpageModel->getTeam($data['team'])){
                            flash("getTeams", 'hereyou go' );
                            $this->view('adminPages/team', $data);         
                        }else{
                            echo "getTeam function is on the fritz";
                            $this->view('adminPages/team', $data);         
                        }
                    }else{
                        echo "team_err is set";
                        $this->view('adminPages/team', $data);
                    }
                    $this->view('adminPages/team', $data);
                }else{
                    echo "post is NOT working";
                    $this->view('adminPages/team', $data);
                }
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
