<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleas eenter email';
        } else {
          // Check database for email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';
          }
        }

        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Pleae enter name';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Pleae enter password';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Pleae confirm password';
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // Validated
          //1 way hash algo password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          //register user
          if($this->userModel->register($data)){
            flash('register_success', "You are registered and can log in");
            redirect('users/login');
          }else{
              die("something went wrong in the Users file");
          }
        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }
      } else {
        // Init data
        $data =[
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];
        // Load view
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'ad_username' => trim($_POST['ad_username']),
          'ad_password' => trim($_POST['ad_password']),
          'ad_username_err' => '',
          'ad_password_err' => '',
        ];

        // Validate Email
        if(empty($data['ad_username'])){
          $data['ad_username_err'] = 'Pleae enter email';
        }

        // Validate Password
        if(empty($data['ad_password'])){
          $data['ad_password_err'] = 'Please enter password';
        }

// Check for user/email
//        if($this->userModel->findUserByUsername($data['ad_username'])){
//          //user found
//          echo 'user found';

//        }else{
//          $data['ad_username_err'] = "No user found";
//        }

        // Make sure errors are empty
        if(empty($data['ad_username_err']) && empty($data['ad_password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->adminLogin($data['ad_username'], $data['ad_password']);
          if($loggedInUser){
            //create session vars
            $this->createUserSession($loggedInUser);
          }else{

            $data['ad_password_err'] = 'Password incorrect';
            $this->view('users/login', $data);
          }
        } else {

          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'ad_username' => '',
          'ad_password' => '',
          'ad_username_err' => '',
          'ad_password_err' => '',
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }



    public function createUserSession($user){
      //setting user id to session variable
      $_SESSION['user_id'] =$user->id;
      $_SESSION['user_email'] =$user->email;
      $_SESSION['user_name'] =$user->name;
      redirect('posts');
    }
    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }

    
  }