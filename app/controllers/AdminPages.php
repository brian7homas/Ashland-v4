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
                        'error' => 'general error'
                        ];        
                $this->view('adminpages/index', $data);
            }
            
            public function team(){
                $teams = $this->adminpageModel->getTeams();
                sort($teams);
                $data = [
                    // post values
                    'currentTeam' => trim($_POST['currentTeam']),
                    'newTeam' => trim($_POST['newTeam']),
                    'player' => trim($_POST['player[]']),
                    
                    // page data
                    'title' => 'Team Manager',
                    'description' => 'This page allows you to add/remove and view players on a specific team.',
                    'dropdown' => 'Select a Team',
                    'newPlayers' => '',
                    
                    // from the $teams array
                    'aardvarks' => $teams[0]->team_name,
                    'antelopes' => $teams[1]->team_name,
                    'boxers' => $teams[2]->team_name,
                    'broncos' => $teams[3]->team_name,
                    'buffalos' => $teams[4]->team_name,
                    'culdesacs' => $teams[5]->team_name,
                    'team_name' => $teams->team_name, 
                    
                    // Error values
                    'team_err' => '',
                    'error' => '',
                    ];
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                    echo $data['error'];
                    //check for player varialble checkboxes 
                    if(isset($_POST['player'])){
                            foreach($_POST['player'] as $playerid){
                                $teamid= $this->adminpageModel->getTeamID($data['newTeam']);
                                $this->adminpageModel->updatePlayer($playerid, $teamid->teamid);
                                if($_POST['delete']){
                                    $this->adminpageModel->deletePlayer($playerid);
                                }
                                
                            }
                        }
                    if(empty($data['currentTeam'])){
                        $data['team_err'] = "something went wrong";
                    }
                    if(empty($data['team_err']) && empty($data['error']) && !isset($data['currentTeam'])){                        
                        // $this->adminpageModel->getPlayer($playerid);
                        // $this->view('adminPages/team', $data);
                        if($this->adminpageModel->getTeam($data['currentTeam'])){
                            $this->view('adminPages/team', $data);
                        }else{
                            echo "getTeam function is on the fritz";
                            $this->view('adminPages/team', $data);         
                        }
                    }else{
                        echo "team_err is set";
                        $this->view('adminPages/team', $data);
                    }
                    echo "passed error validation";
                    $this->view('adminPages/team', $data);
                }else{
                    echo "welcome";
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
            public function moveSelection($newTeam){
                //setting newTeam variable in post tot asession var
                $_SESSION['newTeam'] = $_POST['newTeam'];

                return $newTeam;
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
