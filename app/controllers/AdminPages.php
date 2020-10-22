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
                            'pla_lname' => '',
                            'post_err' => '',
                            'pla_info' => '',
                            'team_err' => '',
                            'playerid' => ''
                        ];
                        
                        //! ADD ERROR CHECKS SET VARIABLES 
                        
                        //? MAKE SURE THE CURRENT TEAM IS NOT THE NEW TEAM 
                        if($data['currentTeam'] === $data['newTeam']) {
                            $data['team_err'] = 'Player cannot be moved to the same team';
                        }
                        
                        //? IF PLAYERS ARE NOT SELECTED 
                        if(!isset($_POST['player'])){
                            $data['pla_info'] = 'Select Player(s) to move from ..';
                        }
                        //? MAIN FORK (LAYER 1)
                        // IF CURRENT TEAM  IS SET TO NEW PLAYERS
                        if($data['currentTeam'] == 'newPlayers'){
                            // ? IF NEW PLAYERS ARE SELECTED    
                            //! TEAM VARIABLE HAS TO BE SET
                            // STORE ALL NEW PLAYERS 
                            //!  $data['team'] !!DO NOT REMOVE
                            $data['team'] = $this->adminpageModel->getNewPlayers();
                            //// HOW TO ACCESS SEPERATE DATA POINTS IN THE TEAM VAR
                            ////  var_dump($data['team'][42]->pla_fname);
                            // If players are selected and there is a selection for the new team
                            //? ANOTHER FORK IF NEW PLYAERS ARE SELECT AND A NEW TEAM IS SELECTED (LAYER 2)
                            //? AND POST VALUE DELETE IS NOT SET
                            if($_POST['player'] != '' AND $data['newTeam'] != '' AND !isset($_POST['delete'])){ 
                                // GET TEAM teamid FROM team_name
                                $data['newTeamID'] = $this->adminpageModel->getTeamID($data['newTeam']);
                                // INSERT INTO SELECT foreach player selected
                                foreach($_POST['player'] as $data['newPlayerID']){
                                    $this->adminpageModel->moveNewPlayer($data); 
                                    $player = $data['newPlayerID'];
                                    $player = (int)$player;
                                    $this->adminpageModel->deleteNewPlayer($player);
                                } 
                                // If the $_POST variable is set 
                                if(isset($_POST)){
                                    //unset newTeam var
                                    unset($data['newTeam']);
                                    //unset player selections
                                    unset($_POST['player']);
                                }
                                $data['team'] = $this->adminpageModel->getNewPlayers();
                            }//? IF PLAYERS ARE SELECTED AND DELETE VALUE EXISTS IN POST VARIABLE
                            elseif($_POST['player'] != '' AND $_POST['delete']){
                                // $player = (int)$_POST['player'];
                                // var_dump($_POST['player']);
                                unset($data['newTeam']);
                                foreach($_POST['player'] as $data['playerid']){
                                    $this->adminpageModel->deleteNewPlayer($data['playerid']);
                                }
                                // keeps from needing to reload page to see delettion
                                $data['team'] = $this->adminpageModel->getNewPlayers();
                            }else{
                                //!error block IF NEW PLAYER IS SELCTED AND NO PLAYERS OR NEW TEAM IS SELECTED 
                                // TODO: THIS IS THE DEFAULT STATE OF THE PAGE WHEN NEWPLAYERS ARE VIEWD 
                                // TODO: THIS BLOCK NEEDS TO RUN ONLY WHEN THE NEWPLAYERS EVENT IS FIRED
                                // IF POST PLAYER OR DATA NEWTEAM ARE NOT SET
                                echo "post player is empty or newteam data is empty";
                                $this->view('adminPages/team', $data);
                            }
                            // ? DIRECTED BACK TO TEAM PAGE
                            $this->view('adminPages/team', $data);
                        }else{
                            // ? IF A REGULAR TEAM IS SELECTED
                            // $this->adminpageModel->getTeam($data['currentTeam']);
                            //!  $data['team'] !!DO NOT REMOVE
                            $data['team'] =  $this->adminpageModel->getTeam($data['currentTeam']);
                            //? IF A REGULAR TEAM AND A NEW TEAM ARE SELECTED
                            if($_POST['player'] != '' AND $data['newTeam'] != ''){ 
                                // GET TEAM teamid FROM team_name
                                $data['newTeamID'] = $this->adminpageModel->getTeamID($data['newTeam']);
                                // INSERT INTO SELECT foreach player selected
                                foreach($_POST['player'] as $data['newPlayerID']){
                                    // convert to int
                                    $player = (int)$data['newPlayerID'];
                                    $team = (int)$data['newTeamID']->teamid; 
                                    $this->adminpageModel->updatePlayer($player, $team); 
                                } 
                                
                                // If the $_POST variable is set 
                                if(isset($_POST)){
                                    //unset newTeam var
                                    unset($data['newTeam']);
                                    //unset player selections
                                    unset($_POST['player']);
                                }
                                $data['team'] =  $this->adminpageModel->getTeam($data['currentTeam']);
                            }
                            //? IF PLAYERS ARE SELECTED AND POST VALUE DELETE EXIST (DELEETE SUBMITTED)
                            elseif($_POST['player'] != '' AND $_POST['delete']){
                                // $player = (int)$_POST['player'];
                                // var_dump($_POST['player']);
                                foreach($_POST['player'] as $data['playerid']){
                                    (int)$data['playerid'];
                                    $this->adminpageModel->deletePlayer($data['playerid']);
                                }
                                // keeps from needing to reload page to see delettion
                                $data['team'] =  $this->adminpageModel->getTeam($data['currentTeam']);
                            }else{
                                //!error block IF NEW PLAYER IS SELCTED AND NO PLAYERS OR NEW TEAM IS SELECTED 
                                // TODO: THIS IS THE DEFAULT STATE OF THE PAGE WHEN NEWPLAYERS ARE VIEWD 
                                // TODO: THIS BLOCK NEEDS TO RUN ONLY WHEN THE NEWPLAYERS EVENT IS FIRED
                                // IF POST PLAYER OR DATA NEWTEAM ARE NOT SET
                                echo "post player is empty or newteam data is empty";
                                $this->view('adminPages/team', $data);
                            }
                        }
                        
                        //reset newTeam var
                        $data['newTeam'] = '';
                        //reset player selections
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
