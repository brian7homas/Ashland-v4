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
                
                // var_dump($players);
                
                $data = [
                    // post values
                    'currentTeam' => trim($_POST['currentTeam']),
                    'newTeam' => trim($_POST['newTeam']),
                    'player' => trim($_POST['player[]']),
                    
                    // page data
                    'title' => 'Team Manager',
                    'description' => 'This page allows you to add/remove and view players on a specific team.',
                    'dropdown' => 'Select a Team',
                    'newPlayers' => 'New Players',
                    
                    
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
                //setting current team new team strings and player id
                // var_dump($data['currentTeam']);
                //? CURRENT TEAAM
                
                if(($data['currentTeam'])){
                    //KEEP THE PAGE FROM LOADING THE MOVE/DELETE PLAYER SECTION 
                    //ACCEPT THE POST REQUEST TO SELECT CURRENT TEAM
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                        
                        //? TEAM STRINGS NEW AND OLD
                        foreach($POST as $key => $value){
                            $teams = $value . '<br>';
                        }
                        //? PLAYER ID
                        foreach($_POST['player'] as $key=>$value){
                            $id = $value;
                            $teamid = $this->adminpageModel->getTeamID($data['newTeam']);
                                    $this->adminpageModel->updatePlayer($id, $teamid->teamid);
                                    if($_POST['delete']){
                                        $this->adminpageModel->deletePlayer($id);
                                    }
                        }
                        var_dump($teams);
                        var_dump($id);
                        // var_dump ($data['player']);
                        //check for player varialble checkboxes 
                        // if(($data['player']) != NULL ){
                        //     echo "TESTGIN";
                        //         foreach($_POST['player'] as $playerid){
                                    
                                    
                        //         }
                        //     }
                        if(empty($data['currentTeam'])){
                            $data['team_err'] = "something went wrong";
                        }
                        if($data['team_err'] = '' && $data['error'] == ''){                        
                            // $this->adminpageModel->getPlayer($playerid);
                            // $this->view('adminPages/team', $data);
                            echo `before currentTeam is checked`;
                            //returns team members
                            
                            if($data['currentTeam'] == 'newPlayers'){
                                $newPlayers = $this->adminpageModel->getNewPlayers();
                                echo "$data currentTeam == newPlayers";
                            }
                            if($this->adminpageModel->getTeam($data['currentTeam'])){
                                $this->view('adminPages/team', $data);
                            }else{
                                echo "getTeam function is on the fritz";
                                $this->view('adminPages/team', $data);         
                            }
                        }else{
                            echo "either team_err and error are set";
                            $this->view('adminPages/team', $data);
                        }
                        echo "passed error validation";
                        $this->view('adminPages/team', $data);
                    }
                    
                    //IF THE MOVE OR DELETE VARIABLES ARE NOT SET 
                    //KEEP THE CURRENT TEAM SET TO WHAT IT IS UNTIL THE MOVE 
                    //OR DELETE VARIABLES ARE CHANGED
                }else{
                    //LISTEN FOR PLAYER VARIABLE
                    //ONLY ACCEPT DATA FROM THE DELETE/MOVE FUNCITONS
                    //IF PLAYER VAR IS ACCECPTED 
                    //RESET CURRENT TEAM VAR
                    echo "currentTeam is set<br>";
                    $data['currentTeam'] = NULL;
                    var_dump($data['currentTeam']) ;
                    //? default state when page is first visted
                    echo "welcome";
                    $this->view('adminPages/team', $data);
                    }
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
