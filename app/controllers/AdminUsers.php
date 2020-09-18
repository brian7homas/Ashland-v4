<?php 

class AdminUsers extends Controller{
    public function __construct(){
        $this->adminModel = $this->model('AdminUser');
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo "testing start";
            //?SANITIZE POST DATA
        $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        //?INIT DATA/SET ERROR VARS
        $data =[
            'ad_fname' => trim($_POST['ad_fname']),
            'ad_lname' => trim($_POST['ad_lname']),
            'ad_username' => trim($_POST['ad_username']),
            'ad_password' => trim($_POST['ad_password']),
            'ad_confirm_password' => trim($_POST['ad_confirm_password']),

            'ad_fname_err' => '',
            'ad_lname_err' => '',
            'ad_username_err' => '',
            'ad_username_err' =>'',
            'ad_password_err' => '',
            'ad_confirm_password_err' => ''
          ];
          
        //?VALIDATE FIRST NAME
        if(empty($data['ad_fname'])){
            $data['ad_fname_err'] = 'Pleae enter name';
          }
          
          //?VALIDATE LAST NAME
        if(empty($data['ad_lname'])){
            $data['ad_lname_err'] = 'Pleae enter name';
          }
          
        if(empty($data['ad_username'])){
            $data['ad_username_err'] = 'Please enter a username';
          }else{
              //?CHECK DATABASE FOR MATCHING USERNAME       
              if($this->adminModel->findUserByUsername($data['ad_username'])){
                  $data['ad_username_err'] ='Username is already taken';
              }
          }
  
          //? Validate Password
          
          if(empty($data['ad_password'])){
            $data['ad_password_err'] = 'Pleae enter password';
          } elseif(strlen($data['ad_password']) < 6){
            $data['ad_password_err'] = 'Password must be at least 6 characters';
          }
  
          // Validate Confirm Password
          if(empty($data['ad_confirm_password'])){
            $data['ad_confirm_password_err'] = 'Pleae confirm password';
            
          } else {
            if($data['ad_password'] != $data['ad_confirm_password']){
              $data['ad_confirm_password_err'] = 'Passwords do not match';
            }
          }        
          
         var_dump($data['ad_username_err']);
         var_dump($data['ad_fname_err']);
         var_dump($data['ad_lname_err']);
         var_dump($data['ad_password_err']);
         var_dump($data['ad_confirm_password_err']);
        
        echo "hello";
           // Make sure errors are empty
           if(empty($data['ad_username_err']) && empty($data['ad_fname_err']) && empty($data['ad_lname_err']) && empty($data['ad_password_err']) && empty($data['ad_confirm_password_err'])){
            
            
            // Validated
            //1 way hash algo password
            $data['ad_password'] = password_hash($data['ad_password'], PASSWORD_DEFAULT);
            
            
            //register user
            if($this->adminModel->register($data)){
                flash('register_success', "You are registered and can log in");
                
                echo "testing";
                $this->view('adminusers/login', $data);
                redirect('adminusers/login');
            }else{
                die("something went wrong in the AdminUsers file ");
            }
          }
        }
         else {
            // Load view with errors
            // echo "else block load with errors";
            $data =[
                'ad_fname' => '',
                'ad_lname' => '',
                'ad_username' => '',
                'ad_password' => '',
                'ad_confirm_password' => '',
    
                'ad_fname_err' => '',
                'ad_lname_err' => '',
                'ad_username_err' => '',
                'ad_username_err' =>'',
                'ad_password_err' => '',
                'ad_confirm_password_err' => ''
              ];
            $this->view('adminUsers/register', $data);
          }


        //? MAKE SURE ERROR VARS ARE EMPTY


    }
    
}