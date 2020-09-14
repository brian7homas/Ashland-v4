<?php
  class Newplayer {
    public function __construct(){
      $this->db = new Database;
    }
      public function add_tmp_player($Last_Name, $First_Name, $Phone, $Email, $Parent_Last_Name, $Parent_First_Name, $Address, $City, $State, $Zip, $DOB){
          $todays = date('Y-m-d');
          $query = "insert into new_player_tmp(pla_lname, pla_fname, pla_phone, pla_email,  pla_par_lname, pla_par_fname, pla_add, pla_city, pla_state, pla_zip, pla_bdate, date_added)values( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          //the two following lines should be unquoted to troubleshoot the SQL statement if the
          //player is not being added to the db by pasting the query string into the SQL tab in phpMyAdmin
          // echo $query;
          
          try {
              $result = $this->db->prepare($query);
              $result->bindvalue(1, $Last_Name, PDO::PARAM_STR);
              $result->bindValue(2, $First_Name, PDO::PARAM_STR);
              $result->bindValue(3, $Phone, PDO::PARAM_INT);
              $result->bindValue(4, $Email, PDO::PARAM_STR);
              $result->bindValue(5, $Parent_Last_Name, PDO::PARAM_STR);
              $result->bindValue(6, $Parent_First_Name, PDO::PARAM_STR);
              $result->bindValue(7, $Address, PDO::PARAM_STR);
              $result->bindValue(8, $City, PDO::PARAM_STR);
              $result->bindValue(9, $State, PDO::PARAM_STR);
              $result->bindValue(10, $Zip, PDO::PARAM_INT);
              $result->bindValue(11, $DOB, PDO::PARAM_STR);
              $result->bindValue(12, $todays, PDO::PARAM_STR);
              $result->execute();
          } catch (Exception $e) {
              echo "ERROR:" . $e->getMessage() . "<br />";
              return false;
              echo "testing froom the add tmp player function";
          }
          
          return true;

      }


    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM new_player_tmp WHERE pla_email = :pla_email');
      //bind values
      $this->db->bind(':pla_email', $email);

      $row = $this->db->single();
      // var_dump($this->db->single());
      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }



    public function getAllNewPlayers($data){
      echo "hello";
      $this->db->query('SELECT * FROM new_player_tmp');
      if(getAll($data)){
        echo "helo";
      }
      echo "goodbye";
    }

  }