<?php 

class AdminUser{
    public $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function register($data){
        //query
        $this->db->query('INSERT INTO admin(adminid, ad_lname, ad_fname, ad_username, ad_password) VALUES(:adminid, :ad_lname, :ad_fname, :ad_username, :ad_password)');
        
        //bind
        $this->db->bind(':adminid', $data['adminid']);
        $this->db->bind(':ad_lname', $data['ad_lname']);
        $this->db->bind(':ad_fname', $data['ad_fname']);
        $this->db->bind(':ad_username', $data['ad_username']);
        $this->db->bind(':ad_password', $data['ad_password']);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    public function login($username, $password){
      $this->db->query('SELECT * FROM admin WHERE ad_username = :username');
      $this->db->bind(':ad_username', $username);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    public function findUserByUsername($username){
        
        $this->db->query('SELECT * FROM admin WHERE ad_username = :ad_username');
        
        //bind values
        $this->db->bind(':ad_username', $username);
  
        $row = $this->db->single();
  
        // Check row
        if($this->db->rowCount() > 0){
          return true;
        } else {
          return false;
        }
      }

}
           

        