<?php 

class AdminPage{
    public $db;
      public function __construct(){
          $this->db = new Database;
      }
      // get all new players
      public function moveNewPlayer($data){
        $player = $data['newPlayerID'];
        // var_dump($player);
        $player = (int)$player;
        $player--;
        
        $team = $data['newTeamID']->teamid; 
        // var_dump($team);
        $team = (int)$team;
        // var_dump(is_int($team));
        // $data['newTeamID'] = (int)$data['newTeamID'];
        // var_dump($team);
        // echo "MOVING PLAYER";
        // $playerid = (int)$playerid;        
        // echo "<br>";
        // var_dump($playerid);
        // echo "<br>";
        // $newTeam = (int)$newTeam;
        // echo "<br>";
        // var_dump($newTeam);
        
        $this->db->query('INSERT INTO player (playerid, pla_lname, pla_fname, pla_phone, pla_par_lname, pla_par_fname, pla_add, pla_city, pla_state, pla_zip, pla_bdate, teamid)
                                SELECT  ID, pla_lname, pla_fname, pla_phone, pla_par_lname, pla_par_fname, pla_add, pla_city, pla_state, pla_zip, pla_bdate
                          FROM new_player_tmp');
      $this->db->bind(':playerid', $player);
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
      // echo "<br>";
      // echo "after binds";
      // var_dump($this->db->execute());
      // if($this->db->execute()){
      //   return true;
      // }else{
      //   return false;  
      //   }
      
      }
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
      //! DEBUG
      //! var_dump($team);
      $this->db->query('SELECT teamid FROM team WHERE team_name = :team');
      $this->db->bind(':team', $team);
      $row = $this->db->single();
      return $row;
    }
    // get specifc player based on playerid 
    public function getPlayer($player){
      echo "inside player function";
      $this->db->query('SELECT * FROM player WHERE playerid = :player');
      $row = $this->db->bind(':player', $player);
      return $row;
    }
    // update player -- move player to new team 
    public function updatePlayer($playerid,  $newTeamID){
      // var_dump($newTeamID);
      $this->db->query('UPDATE player SET teamid = :newTeamID WHERE playerid = :playerid');
      $this->db->bind(':playerid', $playerid);
      $this->db->bind(':newTeamID', $newTeamID);
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }
    // delete player 
    public function deletePlayer($playerid){
      $this->db->query('DELETE FROM player WHERE playerid = :playerid');
      $this->db->bind(':playerid', $playerid);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }
//     public function register($data){
//         //query
//         $this->db->query('INSERT INTO admin(adminid, ad_lname, ad_fname, ad_username, ad_password) VALUES(:adminid, :ad_lname, :ad_fname, :ad_username, :ad_password)');
        
//         //bind
//         $this->db->bind(':adminid', $data['adminid']);
//         $this->db->bind(':ad_lname', $data['ad_lname']);
//         $this->db->bind(':ad_fname', $data['ad_fname']);
//         $this->db->bind(':ad_username', $data['ad_username']);
//         $this->db->bind(':ad_password', $data['ad_password']);
        
//         if($this->db->execute()){
//             return true;
//         }else{
//             return false;
//         }
        
//     }

//     public function login($username, $password){
//       // echo "<br>inside login function adminuser.php";
//       $this->db->query('SELECT * FROM admin WHERE ad_username = :ad_username');
//       $this->db->bind(':ad_username', $username);
//       $row = $this->db->single();
//       var_dump($row);
//       $hashed_password = $row->ad_password;
//       var_dump($hashed_password);
//       var_dump($password);
//       if(password_verify($password, $hashed_password)){
//         return $row;
//       } else {
//         echo "<br><br><br>false";
//         return false;
//       }
//     }



// }
           

        