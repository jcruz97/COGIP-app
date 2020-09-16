<?php

    class Users extends Controller
    {
        public function __construct()
        {
            $this->userModel = $this->model('User');
            $this->typeModel = $this->model('Type');
        }

        public function index()
        {
            $users = $this->userModel->getUsers();
            
            $data =
            [
                'users' => $users
            ];

            $this->view('users/index', $data);
        }

        public function add()
        {
            // Get foreign key IDs
            $users_type = $this->typeModel->getUsersTypes();

            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data =
                [
                    'name' => trim($_POST['name']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'user_type_id' => trim($_POST['user_type_id']),
                    'users_type' => $users_type,
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'password_confirm_err' => ''
                ];

                // Validate Name
                if (empty($data['name']))
                {
                    $data['name_err'] = 'Please enter name';
                }
                else
                {
                    if ($this->userModel->findUserByName($data['name']))
                    {
                        $data['name_err'] = 'Name already taken';
                    }
                }

                // Validate Password
                if (empty($data['password']))
                {
                    $data['password_err'] = 'Please enter password';
                }
                elseif (strlen($data['password']) < 4)
                {
                    $data['password_err'] = 'Password must be at least 4 characters';
                }

                // Validate Confirm Password
                if (empty($data['confirm_password']))
                {
                    $data['confirm_password_err'] = 'Please confirm password';
                }
                else
                {
                    if ($data['password'] != $data['confirm_password'])
                    {
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                // Make sure errors are empty
                if (empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']))
                {
                    // Validated
                    
                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Add User
                    if ($this->userModel->add($data))
                    {
                        flash('user_message', 'User added');
                        redirect('users/index');
                    }
                    else
                    {
                        die('Something went wrong');
                    }
                }
                else
                {
                    // Load view with errors
                    $this->view('users/add', $data);
                }

            }
            else
            {
                // Init data
                $data =
                [
                    'name' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'user_type_id' => '',
                    'users_type' => $users_type,
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'password_confirm_err' => ''
                ];

                // Load view
                $this->view('users/add', $data);
            }
        }

        public function edit($id)
        {
            // Get foreign key IDs
            $users_type = $this->typeModel->getUsersTypes();

            // Get existing user from model
            $user = $this->userModel->getUserById($id);

            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data =
                [
                    'id' => $id,
                    'name' => trim($_POST['name']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'user_type_id' => trim($_POST['user_type_id']),
                    'users_type' => $users_type,
                    'name_err' => '',
                    'password_err' => '',
                    'password_confirm_err' => ''
                ];

                // Validate Name
                if (empty($data['name']))
                {
                    $data['name_err'] = 'Please enter name';
                }
                else
                {
                    if ($data['name'] != $user->name)
                    {
                        if ($this->userModel->findUserByName($data['name']))
                        {
                            $data['name_err'] = 'Name already taken';
                        }
                    }
                }

                // Validate Password
                if (empty($data['password']))
                {
                    $data['password_err'] = 'Please enter password';
                }
                elseif (strlen($data['password']) < 4)
                {
                    $data['password_err'] = 'Password must be at least 4 characters';
                }

                // Validate Confirm Password
                if (empty($data['confirm_password']))
                {
                    $data['confirm_password_err'] = 'Please confirm password';
                }
                else
                {
                    if ($data['password'] != $data['confirm_password'])
                    {
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                // Make sure errors are empty
                if (empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']))
                {
                    // Validated
                    
                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Update User
                    if ($this->userModel->updateUser($data))
                    {
                        flash('user_message', 'User updated');
                        redirect('users');
                    }
                    else
                    {
                        die('Something went wrong');
                    }
                }
                else
                {
                    // Load view with errors
                    $this->view('users/edit', $data);
                }

            }
            else
            {
                // Init data
                $data =
                [
                    'id' => $id,
                    'name' => $user->name,
                    'password' => '',
                    'confirm_password' => '',
                    'user_type_id' => $user->type_id,
                    'users_type' => $users_type,
                    'name_err' => '',
                    'password_err' => '',
                    'password_confirm_err' => ''
                ];

                // Load view
                $this->view('users/edit', $data);
            }
        }

        public function login()
        {
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data =
                [
                    'name' => trim($_POST['name']),
                    'password' => trim($_POST['password']),
                    'name_err' => '',
                    'password_err' => ''
                ];

                // Validate Name
                if (empty($data['name']))
                {
                    $data['name_err'] = 'Please enter name';
                }

                // Validate Password
                if (empty($data['password']))
                {
                    $data['password_err'] = 'Please enter password';
                }

                // Check for user/name
                if ($this->userModel->findUserByName($data['name']))
                {
                    // User found
                }
                else
                {
                    // User not found
                    $data['name_err'] = 'No user found';
                }

                // Make sure errors are empty
                if (empty($data['name_err']) && empty($data['password_err']))
                {
                    // Validated
                    
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['name'], $data['password']);

                    if ($loggedInUser)
                    {
                        // Create Session
                        $this->createUserSession($loggedInUser);
                    }
                    else
                    {
                        $data['password_err'] = 'Password incorrect';

                        $this->view('users/login', $data);
                    }
                }
                else
                {
                    // Load view with errors
                    $this->view('users/login', $data);
                }
            }
            else
            {
                // Init data
                $data =
                [
                    'name' => '',
                    'password' => '',
                    'name_err' => '',
                    'password_err' => ''
                ];

                // Load view
                $this->view('users/login', $data);
            }
        }

        public function delete($id)
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Check for owner
                if ($_SESSION['user_type'] != '1')
                {
                    redirect('users');
                }

                if ($this->userModel->deleteUser($id))
                {
                    flash('user_message', 'User removed');
                    redirect('users');
                }
                else
                {
                    die('Something went wrong');
                }
            }
            else
            {
                redirect('users');
            }
        }

        public function createUserSession($user)
        {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_type'] = $user->type_id;
            $_SESSION['user_name'] = $user->name;
            redirect('admin/index');
        }

        public function logout()
        {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_type']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('users/login');
        }
    }