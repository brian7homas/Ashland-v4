<?php 

class AdminPage{
    public $db;
      public function __construct(){
          $this->db = new Database;
      }
        // MOVE NEW PLAYERS TO PLAYERS TABLE
        public function moveNewPlayer($data){
        // store speciic values in $data
        $player = $data['newPlayerID'];
        $team = $data['newTeamID']->teamid; 
        // convert those values to ints
        // because they are returned in arrays
        $player = (int)$player;
        $team = (int)$team;
        //! TEST
         var_dump($player);
         var_dump($team);
        echo "inside move New player funciton";
        try{
        $this->db->query('INSERT INTO player (playerid, pla_lname, pla_fname, pla_phone, pla_par_lname, pla_par_fname, pla_add, pla_city, pla_state, pla_zip, pla_bdate, teamid)
                          SELECT '. $player . ', pla_lname, pla_fname, pla_phone, pla_par_lname, pla_par_fname, pla_add, pla_city, pla_state, pla_zip, pla_bdate,'. $team .
                          ' FROM new_player_tmp');
        $this->db->bind(':playerid', $data['team'][$player]->ID);
        var_dump($data['team'][$player]->ID);
        $this->db->bind(':pla_lname', $data['team'][$player]->pla_lname);
        $this->db->bind(':pla_fname', $data['team'][$player]->pla_fname);
        $this->db->bind(':pla_phone', $data['team'][$player]->pla_phone);
        $this->db->bind(':pla_par_lname', $data['team'][$player]->pla_par_lname);
        $this->db->bind(':pla_par_fname', $data['team'][$player]->pla_par_fname);
        $this->db->bind(':pla_add', $data['team'][$player]->pla_add);
        $this->db->bind(':pla_city', $data['team'][$player]->pla_city);
        $this->db->bind(':pla_state', $data['team'][$player]->pla_state);
        $this->db->bind(':pla_zip', $data['team'][$player]->pla_zip);
        $this->db->bind(':pla_bdate', $data['team'][$player]->pla_bdate);
        $this->db->bind(':teamid', $team);  
        
        if($this->db->execute()){
          return true;
        }else{
          return false;  
        } 
          }catch(Exception $e){
              echo $e->getMessage();
              echo "Catch block AdminPage.php line 43";
            }
      }//?end moveNewPlayer
        
      //TODO: add edit function copy move new player
      
      // GET ALL NEW PLAYERS
      public function getNewPlayers(){
        $this->db->query('SELECT * FROM new_player_tmp');
        $results = $this->db->resultSet();
        return $results;
      }
    // get team name
      public function getTeams(){
        $this->db->query('SELECT team_name FROM team');
        $results = $this->db->resultSet();
        return $results;
      }
      // get team members
      public function getTeam($team){
      $this->db->query('SELECT pla_fname,pla_lname, pla_phone, playerid
                        FROM player
                        JOIN team ON player.teamid=team.teamid
                        WHERE team.team_name = :team');
      $this->db->bind(':team', $team);
      $results = $this->db->resultSet();
      return $results;
    }
    // returns team id
    public function getTeamID($team){
      $this->db->query('SELECT teamid FROM team WHERE team_name = :team');
      $this->db->bind(':team', $team);
      $row = $this->db->single();
      return $row;
    }//end getTeamID
    
    // get specifc player based on playerid 
    public function getPlayer($player){
      // var_dump($player);
      // echo "inside player function";
      $this->db->query('SELECT * FROM player WHERE playerid = :player');
      $row = $this->db->bind(':player', $player);
      return $row;
      // var_dump($row);
    }
    // update player -- move player to new team 
    public function updatePlayer($playerid,  $newTeamID){
      
      try{
        var_dump($playerid);
        var_dump($newTeamID);
        $this->db->query('UPDATE player SET teamid = :newTeamID WHERE playerid = :playerid');
        $this->db->bind(':playerid', $playerid);
        $this->db->bind(':newTeamID', $newTeamID);
        if($this->db->execute()){
          return true;
        }else{
          return false;
        }
      }catch(Exception $e){
        echo $e->getMessage();
      }      
    }//end updataPlayer
    
    // delete player 
    public function deletePlayer($playerid){
      try{
        var_dump($playerid);
      $this->db->query('DELETE FROM player WHERE playerid = :playerid');
      $this->db->bind(':playerid', $playerid);
      if($this->db->execute()){
        return true;
        } else {
          return false;
        }
      }catch(Exception $e){
        echo $e->getMessage();
      }
      
    }//end deletePlayer
    
    public function deleteNewPlayer($playerid){
      try{
      // var_dump($playerid);
      $this->db->query('DELETE FROM new_player_tmp WHERE ID =' . $playerid);
      $this->db->bind(':ID', $playerid);
      if($this->db->execute()){
        return true;
        } else {
        return false;
        }
      }catch(Exception $e){
        echo $e->getMessage();
      }
      
    }//end deleteNewPlayer
    
    public function getAllPlayers(){
        $this->db->query('SELECT * FROM player JOIN team ON team.teamid=player.teamid');
        $results = $this->db->resultSet();
        return $results;
    }
    //returns the gameid from team_game table
    public function getGameID($teamid){
      try{
        $this->db->query('SELECT gameid FROM team_game WHERE teamid = :teamid');
        $this->db->bind(':teamid', $teamid);
        $results = $this->db->resultSet();
        return $results;
      }catch(Excecption $e){
        $e->getMessage();
      }
      
    }//end getGameID
    
    public function getTeamByGameID($gameid){
      try{
        $this->db->query('SELECT teamid FROM team_game WHERE gameid = :gameid');
        $this->db->bind(':gameid', $gameid);
        $results = $this->db->resultSet();
        return $results;
      }catch(Excecption $e){
        $e->getMessage();
      }
    }//end getTeamByGameID
    


    public function getTeamByTeamID($teamid){
      // var_dump($teamid);
      try{
        $this->db->query('SELECT team_name FROM team WHERE teamid = :teamid');
        $this->db->bind(':teamid', $teamid);
        $results = $this->db->resultSet();
        // var_dump($results);
        return $results;
      }catch(Excecption $e){
        $e->getMessage();
      }
    }//end getTeamByGameID
    
    //return all teamid with the same gameid
    //! getSchedule needs to have unique gamesid variable to pull each opponent and game date
    //! getSchedule also needs to have a currentTeam selected
    public function getSchedule($gamesid, $currentTeam){
      // var_dump($currentTeam);
      try{
        $this->db->query('SELECT *
                        FROM team
                        JOIN team_game ON team_game.teamid=team.teamid
                        JOIN game ON game.gameid = team_game.gameid
                        JOIN field ON field.fieldid=game.fieldid
                        WHERE game.gameid = :gameid AND team.team_name != :team_name');
        $this->db->bind(':gameid', $gamesid);
        $this->db->bind(':team_name', $currentTeam);
        $results = $this->db->resultSet();
        return $results;
      }catch(Excecption $e){
        $e->getMessage();
      }
      
    }
    
    
    public function editPlayer($data){
        // echo "player ID: ";
        // var_dump($data['edit_playerid']);
        // echo '<br>';
        // print_r($data['edit_playerid']);
        
        
          try{
            $this->db->query('UPDATE player 
                              SET pla_lname = ' . '"'. $data['edit_pla_lname'] .'"' .
                              ', pla_fname=' . '"'. $data['edit_pla_fname'] .'"' .
                              ', pla_phone='.'"' .$data['edit_pla_phone'].'"' .
                              ', pla_par_lname='.'"' .$data['edit_pla_par_lname'].'"' . 
                              ', pla_par_fname='.'"' .$data['edit_pla_par_fname'].'"' .
                              ', pla_add='.'"' .$data['edit_pla_add'].'"' .
                              ', pla_city='.'"' .$data['edit_pla_city'].'"' . 
                              ', pla_state='.'"' .$data['edit_pla_state'].'"' .
                              ', pla_zip='.'"' .$data['edit_pla_zip'].'"' .
                              ', pla_bdate='.'"' .$data['edit_pla_bdate'].'"' .
                              ', teamid='.'"' .$data['edit_pla_team'].'"' .
                              ' WHERE playerid='.'"' .$data['edit_playerid'].'"');
            
            $this->db->bind(':playerid', $data['edit_playerid']);
            $this->db->bind(':pla_lname', $data['edit_pla_lname']);
            $this->db->bind(':pla_fname', $data['edit_pla_fname']);
            $this->db->bind(':pla_phone', $data['edit_pla_phone']);
            $this->db->bind(':pla_par_lname', $data['edit_pla_par_lname']);
            $this->db->bind(':pla_par_fname', $data['edit_pla_par_fname']);
            $this->db->bind(':pla_add', $data['edit_pla_add']);
            $this->db->bind(':pla_city', $data['edit_pla_city']);
            $this->db->bind(':pla_state', $data['edit_pla_state']);
            $this->db->bind(':pla_zip', $data['edit_pla_zip']);
            $this->db->bind(':pla_bdate', $data['edit_pla_bdate']);
            $this->db->bind(':teamid', $data['edit_pla_team']);  
          
            if($this->db->execute()){
              return true;
            }else{
              return false;  
          } 
            }catch(Exception $e){
              echo $e->getMessage();
              echo "Catch block AdminPage.php line 258";
            }
      
    }
  }
