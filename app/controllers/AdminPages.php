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
                    'title' => 'Team Manager',
                    'description' => 'This page allows you to add/remove and view players on a specific team.',
                    'dropdown' => 'Select a Team',
                    'aardvarks' => $teams[0]->team_name,
                    'antelopes' => $teams[1]->team_name,
                    'boxers' => $teams[2]->team_name,
                    'broncos' => $teams[3]->team_name,
                    'buffalos' => $teams[4]->team_name,
                    'culdesacs' => $teams[5]->team_name,
                    'currentTeam' => trim($_POST['currentTeam']),
                    'newTeam' => trim($_POST['newTeam']),
                    'team_name' => $teams->team_name, 
                    'team_err' => '',
                    'player' => trim($_POST['player[]']),
                    'error' => 'something went south'
                ];
                
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                    $data = [
                        'title' => 'Team Manager',
                        'description' => 'This page allows you to add/remove and view players on a specific team.',
                        'dropdown' => 'Select a Team',
                        'aardvarks' => $teams[0]->team_name,
                        'antelopes' => $teams[1]->team_name,
                        'boxers' => $teams[2]->team_name,
                        'broncos' => $teams[3]->team_name,
                        'buffalos' => $teams[4]->team_name,
                        'culdesacs' => $teams[5]->team_name,
                        'currentTeam' => trim($_POST['currentTeam']),
                        'newTeam' => trim($_POST['newTeam']),
                        'team_name' => $teams->team_name, 
                        'team_err' => '',
                        'error' => '',
                        'player' => trim($_POST['player[]'])
                        ];
                    
                    
                    // var_dump(isset($_POST['currentTeam']));
                    // var_dump(isset($_POST['newTeam']));
                    // var_dump($_POST['newTeam']);
                    // var_dump(isset($_POST['player']));
                    // var_dump($data['player']);
                    echo $data['error'];
                    
                    
                    if(isset($_POST['player'])){
                            // var_dump(is_array($_POST['player']));
                            
                            foreach($_POST['player'] as $playerid){
                                // var_dump($data['newTeam']);

                                $teamid= $this->adminpageModel->getTeamID($data['newTeam']);
                                var_dump($teamid->teamid);
                                $this->adminpageModel->updatePlayer($playerid, $teamid->teamid);
                                
                            }
                        }
                    // echo 'inside post in adminpages controller';
                    
                    //check for input
                    if(empty($data['currentTeam'])){
                        $data['team_err'] = "something went wrong";
                    }
                    
                    if(empty($data['team_err']) && empty($data['error'])){                        
                        // $this->adminpageModel->getPlayer($playerid);
                        $this->view('adminPages/team', $data);
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
                    $this->view('adminPages/team', $data);
                }else{
                    echo "post request is NOT working";
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
