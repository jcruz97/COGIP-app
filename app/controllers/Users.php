<?php

class Users extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // process form


            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // initialize data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'password_confirm' => trim($_POST['password_confirm']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'password_confirm_err' => ''
            ];

            //Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }else{
                //check email
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }

            //Validate name
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            //Validate password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at lest 6  characters';
            }


            //Validate password confirm
            if(empty($data['password_confirm'])){
                $data['password_confirm_err'] = 'Please confirm password';
            }else{
                if($data['password'] != $data['password_confirm']){
                    $data['password_confirm_err'] = 'Passwords do not match';
                }
            }

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['password_confirm_err'])){
                //validated
                //Password Hash
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register
                if($this->userModel->register($data)){
                    flash('register_success', 'You are registered and can log in.');
                    redirect('users/login');
                }else{
                    die('Something went wrong');
                }

            }else{
                //Load view with errors
                $this->view('users/register', $data);
            }

        }else{
            // initialize data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'password_confirm' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'password_confirm_err' => ''
            ];
            
            // load view
            $this->view('users/register', $data);

        }
    }
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // initialize data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            //Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }

            //Validate password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }

            //check for user/email
            if($this->userModel->findUserByEmail($data['email'])){
                // User found
            }else{
                // User not found
                $data['email_err'] = 'no user found';
            }

            if(empty($data['email_err']) && empty($data['password_err'])){
                //validated
                //Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                    //Create session
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password_err'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }
            }else{
                //Load view with errors
                $this->view('users/login', $data);
            }


        }else{
            // initialize data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
        // load view
            $this->view('users/login', $data);
        }
    
    }
    

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('pages/index');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }
}