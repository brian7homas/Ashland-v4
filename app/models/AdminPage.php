<?php 

class AdminPage{
    public $db;
      public function __construct(){
          $this->db = new Database;
      }
      public function getTeams(){
        $this->db->query('SELECT team_name FROM team');
        $results = $this->db->resultSet();
        return $results;
      }
      public function getTeam($team){
      $this->db->query('SELECT pla_fname,pla_lname, pla_phone, playerid 
                        FROM player
                        JOIN team ON player.teamid=team.teamid
                        WHERE team.team_name = :team');
      $this->db->bind(':team', $team);
      $results = $this->db->resultSet();
      return $results;
    }
    public function getTeamID($team){
      var_dump($team);
      $this->db->query('SELECT teamid FROM team WHERE team_name = :team');
      $row = $this->db->bind(':team', $team);
      
      return $row;
    }
    public function getPlayer($player){
      
      echo "inside player function";
      $this->db->query('SELECT * FROM player WHERE playerid = :player');
      $row = $this->db->bind(':player', $player);
      
      
      return $row;
    }
    public function updatePlayer($playerid,  $newTeamID){
      // var_dump($playerid);
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
           

        