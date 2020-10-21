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
                    // page data
                    'title' => 'Team Manager',
                    'description' => 'This page allows you to add/remove and view players on a specific team.',
                    'dropdown' => 'Select a Team',
                    'newPlayers' => 'New Players',
                    'team' => '',
                    
                    
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
                
                    // POST REQUEST RECIEVEED
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                        $data = [
                            // post values
                            'currentTeam' => trim($_POST['currentTeam']),
                            'newTeam' => trim($_POST['newTeam']),
                            'player' => trim($_POST['player[]']),
                            'newTeamID' => '',
                            'newPlayerID' => '',
                            'pla_lname' => ''
                        ];
                        
                        //! ADD ERROR CHECKS SET VARIABLES 
                        // echo $data['currentTeam'];
                        // echo "<br>";
                        // echo $data['newTeam'];
                        // echo "<br>";
                        //! var_dump($_POST['player']);
                        
                        // ADD CONDITIONALS 
                        
                        // IF CURRENT TEAM  IS SET TO NEW PLAYERS
                        if($data['currentTeam'] == 'newPlayers'){
                            // ? IF NEW PLAYERS ARE SELECTED
                            
                            
                            //! TEAM VARIABLE HAS TO BE SET
                            // DISPLAY ALL NEW PLAYERS 
                            $data['team'] = $this->adminpageModel->getNewPlayers();
                            
                            //HOW TO ACCESS SEPERATE DATA POINTS IN THE TEAM VAR
                            // var_dump($data['team'][42]->pla_fname);
                            
                            
                            
                            
                            // CHECK FOR PLAYER POST VALUE 
                            if($_POST['player'] != '' AND $data['newTeam'] != ''){
                                
                                //GET TEAM ID FROM TEAM NAME
                                $data['newTeamID'] = $this->adminpageModel->getTeamID($data['newTeam']);
                                // echo "new TEam ID";
                                // var_dump($data['newTeamID']);
                                
                                // for($i =0; $i< count($_POST[player]); $i++){
                                //     $this->adminpageModel->moveNewPlayer($data);       
                                // }
                                
                                foreach($_POST['player'] as $data['newPlayerID']){
                                    $this->adminpageModel->moveNewPlayer($data); 
                                } 
                                
                                $this->view('adminPages/team', $data);
                            }else{
                                // IF POST PLAYER OR DATA NEWTEAM ARE NOT SET
                                echo "post player is empty or newteam data is empty";
                                $this->view('adminPages/team', $data);
                            }
                            // ? DIRECTED BACK TO TEAM PAGE
                            $this->view('adminPages/team', $data);
                        }else{
                            // ? IF A REGULAR TEAM IS SELECTED
                            $this->adminpageModel->getTeam($data['currentTeam']);
                            $data['team'] =  $this->adminpageModel->getTeam($data['currentTeam']);
                        }
                        //reset newTeam var
                        $data['newTeam'] = '';
                        $_POST['player'] = '';
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
