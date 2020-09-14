//            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING) ;
//init data
//            $data = [
//                    'pla_lname' => trim($_POST['pla_lname']),
//                    'pla_fname' => trim($_POST['pla_fname']),
//                    'pla_phone' => trim($_POST['pla_phone']),
//                    'pla_email' => trim($_POST['pla_email']),
//                    'pla_par_lname' => trim($_POST['pla_par_lname']),
//                    'pla_par_fname' => trim($_POST['pla_par_fname']),
//                    'pla_add' => trim($_POST['pla_add']),
//                    'pla_city' => trim($_POST['pla_city']),
//                    'pla_state' => trim($_POST['pla_state']),
//                    'pla_zip' => trim($_POST['pla_zip']),
//                    'pla_bdate' => trim($_POST['pla_bdate']),
//                    'date_added' => trim($_POST['date_added']),
//                    'pla_lname_err' => '',
//                    'pla_fname_err' => '',
//                    'pla_phone_err' => '',
//                    'pla_email_err' => '',
//                    'pla_par_lname_err' => '',
//                    'pla_par_fname_err' => '',
//                    'pla_add_err' => '',
//                    'pla_city_err' => '',
//                    'pla_state_err' => '',
//                    'pla_zip_err' => '',
//                    'pla_bdate_err' => ''
//                ];
            //validate new player information 
//            if(empty($data['pla_lname'])){
//                $data['pla_lname_err'] = "please enter the player's last name";
//            }
//            if(empty($data['pla_fname'])){
//                $data['pla_fname_err'] = "please enter the player's first name";
//            }
//            if(empty($data['pla_phone'])){
//                $data['pla_phone_err'] = "please enter the player's phone number";
//            }
//            if(empty($data['pla_email'])){
//                $data['pla_email_err'] = "please enter the player's email";
//            }else if($this->newplayerModel->findUserByEmail($data['pla_email'])){
//                $data['pla_email_err'] = "Email is already registerd";
//            }
//            if(empty($data['pla_par_lname'])){
//                $data['pla_par_lname_err'] = "please enter the parent's last name";
//            }
//            if(empty($data['pla_par_fname'])){
//                $data['pla_par_fname_err'] = "please enter the parent's first name";
//            }
//            if(empty($data['pla_add'])){
//                $data['pla_add_err'] = "please enter your address";
//            }
//            if(empty($data['pla_state'])){
//                $data['pla_state_err'] = "please re-select state";
//            }
//            if(empty($data['pla_zip'])){
//                $data['pla_zip_err'] = "please enter the zip code for confirmation";        }
//            if(empty($data['pla_city'])){
//                $data['pla_city_err'] = "please enter the city your child will be playing in";
//            }
//            if(empty($data['pla_bdate'])){
//                $data['pla_bdate_err'] = "please enter the player's age";
//            }
//            //check to see if errors are empty
//            if(empty($data['pla_lname_err']) && empty($data['pla_fname_err']) && empty($data['pla_phone_err']) && empty($data['pla_email_err']) && empty($data['pla_par_lname_err']) && empty($data['pla_par_fname_err']) && empty($data['pla_add_err']) && empty($data['pla_city_err']) && empty($data['pla_state_err']) && empty($data['pla_zip_err']) && empty($data['pla_bdate_err'])) {
//                var_dump($this->newplayerModel->register($data));
//                if($this->newplayerModel->register($data)){
//                    echo "test";
//                    echo "hope";
//                }else{
//                    echo "NOPE";
//                }
//            }else{
//
//                redirect("newplayers/register");
//            }