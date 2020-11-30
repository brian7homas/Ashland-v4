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
                $teams = $this->adminpageModel->getTeams();
                        sort($teams);
                        
                $data = [
                            
                            // from the $teams array
                            'aardvarks' => $teams[0]->team_name,
                            'antelopes' => $teams[1]->team_name,
                            'boxers' => $teams[2]->team_name,
                            'broncos' => $teams[3]->team_name,
                            'buffalos' => $teams[4]->team_name,
                            'culdesacs' => $teams[5]->team_name,
                            // 'team_name' => $teams->team_name, 
                            
                            // Error values
                            'team_err' => '',
                            'error' => '',
                            'newTeamID' => ''
                            
                ];
                
                // POST REQUEST RECIEVEED
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                    
                    $data = [
                        'bg-img' => '/img/admin-team.jpg', 
                        'main-inst' => "This is where you can select what part of the database you can manipulate", 
                        // post values
                        'currentTeam' => trim($_POST['currentTeam']),
                        'newTeam' => trim($_POST['newTeam']),
                        'newTeamID' => '',
                        'newPlayerID' => '',
                        'pla_lname' => '',
                        'post_err' => '',
                        
                        'team_err' => '',
                        'playerid' => '',
                        'team' => ''
                    ];
                    
                    //?             ERROR CHECK FOR CURRRENT TEAM AND NEW TEAM
                    if(!empty($data['currentTeam']) && !empty($data['newTeam']) && $data['currentTeam'] === $data['newTeam']) {
                        $data['team_err'] = 'Current team selection is the same value as new team selction';
                    }
                    
                    
                    //?
                    //? IF NEWPLAYERS IS SELCTED
                    //?
                    if($data['currentTeam'] == 'newPlayers'){
                        
                        // ? IF NEW PLAYERS ARE SELECTED    
                        // GET ALL NEW PLAYERS
                        $data['team'] = $this->adminpageModel->getNewPlayers();
                        
                        // ERROR CHECK
                        if(empty($data['newTeam'])){
                            $data['team_err'] = "You'll need to select a new team also";
                        }
                        // If players are selected and there is a selection for the new team AND delete is not selected
                        //? New Players -> Selected players checkboxes -> New team is also selected
                        //? AND POST VALUE DELETE IS NOT SET
                        if(!empty($data['newTeam']) AND !isset($_POST['delete'])){ 
                            //$data['newTeam']  is holding selected playerid and new team id
                            // GET TEAM teamid FROM team_name
                            $data['newTeamID'] = $this->adminpageModel->getTeamID($data['newTeam']);
                            //?$data['newTeamID'] is set to an object containing the new team id
                            if(!empty($_POST['player'])){
                                $data['team_err'] = 'Players need to be selected';
                            }
                            
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
                        }
                        //? DELETE NEW PLAYER
                        elseif($_POST['player'] != '' AND $_POST['delete']){
                            unset($data['newTeam']);
                            foreach($_POST['player'] as $data['playerid']){
                                $this->adminpageModel->deleteNewPlayer($data['playerid']);
                            }
                            // keeps from needing to reload page to see delettion
                            $data['team'] = $this->adminpageModel->getNewPlayers();
                        }else{
                            
                            $this->view('adminpages/team', $data);
                        }
                        // ? DIRECTED BACK TO TEAM PAGE FROM EITHER DELETEING OR MOVING FROM THE NEW PLAYERS TABLE
                        $this->view('adminpages/team', $data);
                    }
                    else{
                        // ? IF A REGULAR TEAM IS SELECTED
                        // $this->adminpageModel->getTeam($data['currentTeam']);
                        //!  $data['team'] !!DO NOT REMOVE
                        $data['team'] =  $this->adminpageModel->getTeam($data['currentTeam']);
                        //? IF A REGULAR TEAM AND A NEW TEAM ARE SELECTED
                        if(!empty($_POST['player']) AND !empty($data['newTeam'])){ 
                            // GET TEAM teamid FROM team_name
                            $data['newTeamID'] = $this->adminpageModel->getTeamID($data['newTeam']);
                            // INSERT INTO SELECT foreach player selected
                            foreach($_POST['player'] as $data['newPlayerID']){
                                // return playerid's -- convert to int
                                $player = (int)$data['newPlayerID'];
                                $team = (int)$data['newTeamID']->teamid; 
                                $this->adminpageModel->updatePlayer($player, $team); 
                            } 
                            // Reset the newTeam and player $data variables the next selection wont be affected  
                            if(isset($_POST)){
                                //unset newTeam var
                                unset($data['newTeam']);
                                //unset player selections
                                unset($_POST['player']);
                            }
                            //?GETS THE CURRENT TEAM SO YOU DONT NEED TO REFRESH THE PAGE TO SEE PLAYER MOVED
                            $data['team'] =  $this->adminpageModel->getTeam($data['currentTeam']);
                        } //!            END SUCCESSFUL PLAYER MOVE
                        //? IF PLAYERS ARE SELECTED AND POST VALUE DELETE EXIST (DELEETE SUBMITTED)
                        elseif($_POST['player'] != '' AND $_POST['delete']){
                            // $player = (int)$_POST['player'];
                            // var_dump($_POST['player']);
                            foreach($_POST['player'] as $data['playerid']){
                                (int)$data['playerid'];
                                $this->adminpageModel->deletePlayer($data['playerid']);
                            }
                            // keeps from needing to reload page to see delettion
                            // var_dump($data['currentTeam']);
                            $data['team'] =  $this->adminpageModel->getTeam($data['currentTeam']);
                            $this->view('adminpages/team', $data);
                        }
                        else{
                            //!error block IF NEW PLAYER IS SELCTED AND NO PLAYERS OR NEW TEAM IS SELECTED 
                            // TODO: THIS IS THE DEFAULT STATE OF THE PAGE WHEN NEWPLAYERS ARE VIEWD 
                            // TODO: THIS BLOCK NEEDS TO RUN ONLY WHEN THE NEWPLAYERS EVENT IS FIRED
                            // IF POST PLAYER OR DATA NEWTEAM ARE NOT SET
                            // echo "post player is empty or newteam data is empty";
                            // echo "Select players and a new team";
                            // echo "else block line 173";
                            $this->view('adminpages/team', $data);
                        }
                    }
                    //reset newTeam var
                    $data['newTeam'] = '';
                    //reset player selections
                    $_POST['player'] = '';
                }
                //?DEFAULT PAGE DATA WHEN IT FIRST LOADS
                $data = [
                    'bg-img' => '/img/admin-team.jpg', 
                    'main-inst' => 'Select a team from the 1st dropdown, use checkboxes to select players and the last dropdown to move them.', 
                    'title' => 'Team Manager',
                    'description' => 'This page allows you to add/remove and view players on a specific team.',
                    'dropdown' => 'Select a Team',
                    'newPlayers' => 'New Players',
                    'team' => NULL
                ];
                $data['team'] =  $this->adminpageModel->getTeam($_POST['currentTeam']);
                // echo "bottom of team function line 188";
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
                                var_dump($data['edit_playerid']);
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