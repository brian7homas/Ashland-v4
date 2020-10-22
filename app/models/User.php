<?php
  class User {
    public $db;
    public function __construct(){
      $this->db = new Database;
    }
    //register
    public function register($data){
      try{
        var_dump($data['password']);
        $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
        //Bind values
        
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        //execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
      }catch(Exception $e){
        echo $e->getMessage(); 
      }
        
    }

    // Login User
    public function login($email, $password){
      try{
        $this->db->query('SELECT * FROM users WHERE name = :name');
      $this->db->bind(':name', $email);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
        
      }catch(Exception $e){
        echo $e->getMessage();
      }
      
    }

    //Login admin user
      public function adminLogin($ad_username, $password){
        try{
          // var_dump($password);
          $this->db->query('SELECT * FROM users WHERE name =  :ad_username');
          $this->db->bind(':ad_username', $ad_username);
          $row = $this->db->single();
          var_dump($row);
          $hashed_password = $row->password;
          $var = password_verify($password, $hashed_password);
          // var_dump($var);
          // var_dump($hashed_password);
          if(password_verify($password, $hashed_password)){
            return $row;
          } else {
            return false;
          }
        }catch(Exception $e){
          echo $e->getMessage();
        }
      }


    // Find user by email
    public function findUserByUsername($username){
      try{
        $this->db->query('SELECT * FROM users WHERE name = :username');
      //bind values
      $this->db->bind(':username', $username);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
      }catch(Exception $e){
        echo $e->getMessage();
      }
      
    }//end findUserByUsername
    
    // user by id
    public function getUserById($id){
      $this->db->query('SELECT * FROM users WHERE id = :id');
      //bind values
      $this->db->bind(':id', $id);

      $row = $this->db->single();

     
      return $row;
    }

    
  }