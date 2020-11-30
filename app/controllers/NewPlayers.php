<?php


class NewPlayers extends Controller {
    public function __construct(){
        $this->newplayerModel = $this->model('Newplayer');
    }
    public function register(){
        //check for post request
        $data = [
                // page data
                'hero-button-text' => 'newplayer',
                'hero-button-path' => '',                
                
                
                
                'pla_lname' => trim($_POST['pla_lname']),
                'pla_fname' => trim($_POST['pla_fname']),
                'pla_phone' => trim($_POST['pla_phone']),
                'pla_email' => trim($_POST['pla_email']),
                'pla_par_lname' => trim($_POST['pla_par_lname']),
                'pla_par_fname' => trim($_POST['pla_par_fname']),
                'pla_add' => trim($_POST['pla_add']),
                'pla_city' => trim($_POST['pla_city']),
                'pla_state' => trim($_POST['pla_state']),
                'pla_zip' => trim($_POST['pla_zip']),
                'pla_bdate' => trim($_POST['pla_bdate']),
                'date_added' => trim($_POST['date_added']),
                'pla_lname_err' => '',
                'pla_fname_err' => '',
                'pla_phone_err' => '',
                'pla_email_err' => '',
                'pla_par_lname_err' => '',
                'pla_par_fname_err' => '',
                'pla_add_err' => '',
                'pla_city_err' => '',
                'pla_state_err' => '',
                'pla_zip_err' => '',
                'pla_bdate_err' => ''
                ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $First_Name = trim(filter_input(INPUT_POST, 'pla_fname', FILTER_SANITIZE_STRING));
            $Last_Name = trim(filter_input(INPUT_POST, 'pla_lname', FILTER_SANITIZE_STRING));
            $DOB = trim(filter_input(INPUT_POST, 'pla_bdate', FILTER_SANITIZE_STRING));
            $Address = trim(filter_input(INPUT_POST, 'pla_add', FILTER_SANITIZE_STRING));
            $City =  trim(filter_input(INPUT_POST, 'pla_city', FILTER_SANITIZE_STRING));
            $State = trim(filter_input(INPUT_POST, 'pla_state', FILTER_SANITIZE_STRING));
            $Zip = trim(filter_input(INPUT_POST, 'pla_zip', FILTER_SANITIZE_NUMBER_INT));
            $Phone = trim(filter_input(INPUT_POST, 'pla_phone', FILTER_SANITIZE_NUMBER_INT));
            $Parent_First_Name = trim(filter_input(INPUT_POST, 'pla_par_fname', FILTER_SANITIZE_STRING));
            $Parent_Last_Name = trim(filter_input(INPUT_POST, 'pla_par_lname', FILTER_SANITIZE_STRING));
            $Email = trim(filter_input(INPUT_POST, 'pla_email', FILTER_SANITIZE_STRING));

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(empty($data['pla_lname'])){
                $data['pla_lname_err'] = "please enter the player's last name";
            }
            if(empty($data['pla_fname'])){
                $data['pla_fname_err'] = "please enter the player's first name";
            }
            if(empty($data['pla_phone'])){
                $data['pla_phone_err'] = "please enter the player's phone number";
            }
            if(empty($data['pla_email'])){
                $data['pla_email_err'] = "please enter the player's email";
            }else if($this->newplayerModel->findUserByEmail($data['pla_email'])){
                $data['pla_email_err'] = "Email is already registerd";
            }
            if(empty($data['pla_par_lname'])){
                $data['pla_par_lname_err'] = "please enter the parent's last name";
            }
            if(empty($data['pla_par_fname'])){
                $data['pla_par_fname_err'] = "please enter the parent's first name";
            }
            if(empty($data['pla_add'])){
                $data['pla_add_err'] = "please enter your address";
            }
            if(empty($data['pla_state'])){
                $data['pla_state_err'] = "please re-select state";
            }
            if(empty($data['pla_zip'])){
                $data['pla_zip_err'] = "please enter the zip code for confirmation";        }
                if(empty($data['pla_city'])){
                    $data['pla_city_err'] = "please enter the city your child will be playing in";
                }
                if(empty($data['pla_bdate'])){
                    $data['pla_bdate_err'] = "please enter the player's age";
                }
                //check to see if errors are empty
                
                if(empty($data['pla_lname_err']) && empty($data['pla_fname_err']) && empty($data['pla_phone_err']) && empty($data['pla_email_err']) && empty($data['pla_par_lname_err']) && empty($data['pla_par_fname_err']) && empty($data['pla_add_err']) && empty($data['pla_city_err']) && empty($data['pla_state_err']) && empty($data['pla_zip_err']) && empty($data['pla_bdate_err'])){
                    
                    $this->newplayerModel->add_tmp_player($Last_Name, $First_Name, $Phone, $Email, $Parent_Last_Name, $Parent_First_Name, $Address, $City, $State, $Zip, $DOB);
                    flash('register_success','You did it '.$data['pla_fname'] . ' will be contacted at ' . $data['pla_email']);
                    
                    redirect('newplayers/register');
                }else{
                    $this->view('newplayers/register', $data);
                }
            //process form
            //sanitize data
        }else{
            //init data
            $data = [
                'bg-img' => '/img/newplayer-register.jpg',
                'main-inst' => 'Fill out the form below to register a new player.',
                
                'hero-button-text' => 'Return Home',
                'hero-button-path' => '',
                'pla_lname' => '',
                'pla_fname' => '', 
                'pla_phone' => '',
                'pla_email' => '', 
                'pla_par_lname' => '',
                'pla_par_fname' => '',
                'pla_add' => '',
                'pla_city' => '',
                'pla_state' => '',
                'pla_zip' => '',
                'pla_bdate' => '',
                'pla_lname_err' => '',
                'pla_fname_err' => '', 
                'pla_phone_err' => '',
                'pla_email_err' => '',
                'pla_par_lname_err' => '',
                'pla_par_fname_err' => '',
                'pla_add_err' => '',
                'pla_city_err' => '',
                'pla_state_err' => '',
                'pla_zip_err' => '',
                'pla_bdate_err' => '',
                'date_added' => '',
            ];
            //load view
            $this->view('newplayers/register', $data);
        }
    }
    
    public function createUserSession($user){
        //setting user id to session variable
        $_SESSION['user_id'] =$user->id;
        $_SESSION['user_email'] =$user->email;
        $_SESSION['user_name'] =$user->name;
        redirect('post');
      }
      public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
      }
}