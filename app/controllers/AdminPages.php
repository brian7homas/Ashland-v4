<?php 

class AdminPages extends Controller{
            public function __construct(){
                if(!isset($_SESSION['adminid'])){
                    redirect('adminusers/login');
                }
                $this->adminpageModel = $this->model('Adminpage');
                $this->adminModel = $this->model('Adminuser');
            }
            public function index(){
                $data = [
                        'bg-img' => '/img/admin-index.jpg', 
                        'main-inst' => "This is where you can select what part of the database you can manipulate", 
                        
                        'title' => 'Ashland admin',
                        'description' => 'This is the admin page',
                        'error' => 'general error'
                        ];        
                $this->view('adminpages/index', $data);
            }
            public function team(){
                $data = [
                    'bg-img' => '/img/admin-team.jpg', 
                    'main-inst' => 'Select a team from the 1st dropdown, use checkboxes to select players and the last dropdown to move them.', 
                    'default-team' => 'No team is selected', 
                    'btn-text-currentTeam' => 'select',
                    'btn-text-newSelection' => '',
                ];
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                    
                    $data = [
                        'bg-img' => '/img/admin-team.jpg', 
                        'main-inst' => 'Select a team from the 1st dropdown, use checkboxes to select players and the last dropdown to move them.', 
                        'btn-text-newSelection' => 'Select new current team',
                        // from the $teams array
                        'aardvarks' => $teams[0]->team_name,
                        'antelopes' => $teams[1]->team_name,
                        'boxers' => $teams[2]->team_name,
                        'broncos' => $teams[3]->team_name,
                        'buffalos' => $teams[4]->team_name,
                        'culdesacs' => $teams[5]->team_name,

                        'error' => '',
                        'newTeamID' => '',
                        
                        'currentTeam' => trim($_POST['currentTeam']),
                        'newTeam' => trim($_POST['newTeam']),
                        'team_err' => '', 
                    ];
                    
                    //switch check for what value is stored inside of currentTeam selction
                    //will load newplayers table or team teable based on selection
                    try{
                        switch (true) {
                            case (!empty($data['currentTeam'] AND $data['currentTeam'] != 'newPlayers')):
                                $data['team'] =  $this->adminpageModel->getTeam($data['currentTeam']);
                                $reloadTeam = TRUE;
                                break;
                            case (!empty($data['currentTeam'] and $data['currentTeam'] == 'newPlayers')):
                                $data['team'] = $this->adminpageModel->getNewPlayers();
                                $reloadNewplayers = TRUE;
                                break;
                        }
                    }catch(Exception $e){
                        echo $e->getMessage();
                        $data['team_err'] = 'Something went wrong';
                    }
                    
                    // if delete is selected
                    // in_array checks for Delete selcted string.. value in the team.php input element
                    if(in_array('Delete selected', $_REQUEST, TRUE)){
                        foreach($_POST['player'] as $data['playerid']){
                            if($data['currentTeam'] != 'newPlayers'){
                                $this->adminpageModel->deletePlayer($data['playerid']);
                                $reloadNewplayers = FALSE;
                                }elseif($data['currentTeam'] == 'newPlayers'){
                                    $this->adminpageModel->deleteNewPlayer($data['playerid']);
                                    $reloadTeam = FALSE;
                            }
                        }
                        // Reload currentTeam without having to reload page
                        if($reloadNewplayers == TRUE){
                            $data['team'] = $this->adminpageModel->getNewPlayers();
                        }
                        if($reloadTeam == TRUE){
                            $data['team'] = $this->adminpageModel->getTeam($data['currentTeam']);
                        }
                        $this->view('adminpages/team', $data);
                    }
                    
                    
                    if(in_array("Move player", $_REQUEST, TRUE)){
                        if(empty($data['newTeam'])){
                            $data['team_err'] = "select players";
                        }
                        
                        $data['newTeamID'] = $this->adminpageModel->getTeamID($data['newTeam']);
                        foreach($_POST['player'] as $data['newPlayerID']){
                            if($data['currentTeam'] != 'newPlayers'){
                                $player = (int)$data['newPlayerID'];
                                $team = (int)$data['newTeamID']->teamid; 
                                $this->adminpageModel->updatePlayer($player, $team); 
                            }elseif($data['currentTeam'] == 'newPlayers'){
                                $this->adminpageModel->moveNewPlayer($data); 
                                $player = $data['newPlayerID'];
                                $player = (int)$player;
                                $this->adminpageModel->deleteNewPlayer($player);    
                            }
                            
                        }
                        if($reloadNewplayers == TRUE){
                            $data['team'] = $this->adminpageModel->getNewPlayers();
                        }
                        if($reloadTeam == TRUE){
                            $data['team'] = $this->adminpageModel->getTeam($data['currentTeam']);
                        }
                        $this->view('adminpages/team', $data);
                    }
                    
                }//end of post request
                
                if(isset($_POST)){
                    //unset newTeam var
                    unset($data['newTeam']);
                    //unset player selections
                    unset($_POST['player']);
                }
                
                // $data = [
                //     'bg-img' => '/img/admin-team.jpg', 
                //     'main-inst' => 'Select a team from the 1st dropdown, use checkboxes to select players and the last dropdown to move them.', 
                //     // from the $teams array
                //     'aardvarks' => $teams[0]->team_name,
                //     'antelopes' => $teams[1]->team_name,
                //     'boxers' => $teams[2]->team_name,
                //     'broncos' => $teams[3]->team_name,
                //     'buffalos' => $teams[4]->team_name,
                //     'culdesacs' => $teams[5]->team_name,

                //     'error' => '',
                //     'newTeamID' => '',
                    
                //     'currentTeam' => trim($_POST['currentTeam']),
                //     'newTeam' => trim($_POST['newTeam']),
                //     'team_err' => '', 
                // ];
                $teams = $this->adminpageModel->getTeams();
                        sort($teams);
                $this->view('adminpages/team', $data);
            }
            public function player(){
                $allTeams = $this->adminpageModel->getAllPlayers();
                $data = [
                        // page values
                        'bg-img' => '/img/admin-player.jpg', 
                        'main-inst' => 'Select a team from the 1st dropdown, use checkboxes to select players and the last dropdown to move them.', 
                        'title' => 'Player Manager',
                        'add' => 'Add players',
                        'remove' => 'Remove players',
                        'description' => 'This page allows you to edit/view specifics of players personal profile.',
                        'player' => $allTeams,
                        'editTitle' => 'Edit Player',
                        'editInfo' => 'Edit specific player values',
                        
                        'team_name' => $teamNames,
                        
                        
                        // edit page
                        'edit_playerid' => trim($_POST['edit_playerid']),
                        'edit_team_name' => trim($_POST['edit_team_name']),
                        'edit_teamid' => trim($_POST['edit_teamid']),
                        'edit_pla_fname' => trim($_POST['edit_pla_fname']),
                        'edit_pla_lname' => trim($_POST['edit_pla_lname']),
                        'edit_pla_phone' => trim($_POST['edit_pla_phone']),
                        'edit_pla_par_fname' => trim($_POST['edit_pla_par_fname']),
                        'edit_pla_par_lname' => trim($_POST['edit_pla_par_lname']),
                        'edit_pla_add' => trim($_POST['edit_pla_add']),
                        'edit_pla_city' => trim($_POST['edit_pla_city']),
                        'edit_pla_state' => trim($_POST['edit_pla_state']),
                        'edit_pla_zip' => trim($_POST['edit_pla_zip']),
                        'edit_pla_bdate' => trim($_POST['edit_pla_bdate']),
                        
                        
                        
                        'pla_zip' => trim($_POST['pla_zip']),
                        'pla_bdate' => trim($_POST['pla_bdate']),
                        
                        'team_name' => trim($_POST['team_name']),
                        'teamid' => trim($_POST['teamid']),
                        'delete' => trim($_POST['delete']),
                        'edit' => trim($_POST['edit']),
                        
                        'teamids' => ''
                        ];
                
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);  
                            
                            
                            //? FROM THE PLAYER PAGE IF THE EDIT BUTTON IS SELECTED 
                            if($data['edit']){        
                                if($this->adminpageModel->getPlayer((int)$data['playerid'])){
                                    
                                    $this->view('adminpages/editPlayer', $data);
                                    redirect('adminpages/editPlayer', $data);
                                    die();
                                }else{
                                    echo "did not get player";
                                    $this->view('adminpages/editPlayer', $data);
                                    die();
                                }
                                
                            }
                            if($data['delete']){
                                // var_dump($data['edit_playerid']);
                                $this->adminpageModel->deletePlayer((int)$data['edit_playerid']);
                                $this->view('adminpages/player', $data);
                            }
                            
                            //? FROM THE EDIT PLAYER PAGE
                            echo "default page load";
                            if($data['edit_pla_fname']){
                                $this->view('adminpages/player', $data);
                            }
                            
                            
                        }
                //? Default page load
                $this->view('adminpages/player', $data);
            }
            public function editPlayer(){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                    
                    $allTeams = $this->adminpageModel->getAllPlayers();
                    $data = [
                        // edit page
                        'edit_playerid' => trim($_POST['edit_playerid']),
                        'edit_pla_team' => trim($_POST['edit_pla_teamid']),
                        'edit_pla_fname' => trim($_POST['edit_pla_fname']),
                        'edit_pla_lname' => trim($_POST['edit_pla_lname']),
                        'edit_pla_phone' => trim($_POST['edit_pla_phone']),
                        'edit_pla_par_fname' => trim($_POST['edit_pla_par_fname']),
                        'edit_pla_par_lname' => trim($_POST['edit_pla_par_lname']),
                        'edit_pla_add' => trim($_POST['edit_pla_add']),
                        'edit_pla_city' => trim($_POST['edit_pla_city']),
                        'edit_pla_state' => trim($_POST['edit_pla_state']),
                        'edit_pla_zip' => trim($_POST['edit_pla_zip']),
                        'edit_pla_bdate' => trim($_POST['edit_pla_bdate']),
                        ];
                    
                    if(isset($data['edit_pla_fname'])){
                        
                        // add changes to the player
                        $this->adminpageModel->editPlayer($data);
                        
                        // $this->view("adminpages/player", $data);
                        redirect('adminpages/player');
                    }
                }
                $this->view('adminpages/player', $data);
            }
            public function games(){
                $teams = $this->adminpageModel->getTeams();
                sort($teams);
                $data = [
                        'bg-img' => '/img/admin-game.jpg', 
                        'main-inst' => 'See game data pulled in from the MySQL database.', 
                        'title' => 'Game Manager',
                        'add' => 'Add players',
                        'remove' => 'Remove players',
                        'edit' => 'Edit player info',
                        'description' => 'This page is a read only to see game details stored within the MySQL Database.',
                        'hero-button-text' => '',
                        'hero-button-path' => '/newplayers/register',
                        
                        'aardvarks' => $teams[0]->team_name,
                        'antelopes' => $teams[1]->team_name,
                        'boxers' => $teams[2]->team_name,
                        'broncos' => $teams[3]->team_name,
                        'buffalos' => $teams[4]->team_name,
                        'culdesacs' => $teams[5]->team_name,
                        'team_name' => $teams->team_name, 
                        'teams' => $teams,
                        
                        'team' => trim($_POST['team']),
                        'teams' => $teams,
                        'team_err' =>'',
                        
                        'game_data' => '',
                        
                        'game_date' => '',
                        'opp' => '',
                        'game_time' => '',
                        'field' => ''
                    ];
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                        if($_POST['team']){
                            if(!$data['team_err']){
                                if($this->adminpageModel->getTeamID($data["team"])){
                                    //get the selected team id 
                                    $teamid = $this->adminpageModel->getTeamID($data["team"]);
                                    //use that teamid to return gameid's from team_game
                                    //that have the same assigned teamid
                                    $gameid = $this->adminpageModel->getGameID($teamid->teamid);
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
                            }else{
                                echo "Team Err is set";
                            }
                        }
                    }
                $this->view('adminpages/games', $data);
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