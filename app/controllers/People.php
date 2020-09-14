<?php

    class People extends Controller
    {
        public function __construct()
        {
            if (!isLoggedIn())
            {
                redirect('users/login');
            }

            $this->personModel = $this->model('Person');
            $this->companyModel = $this->model('Company');
        }

        public function add()
        {
            // Get foreign key IDs
            $companies = $this->companyModel->getCompanies();

            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data =
                [
                    'first_name' => trim($_POST['first_name']),
                    'last_name' => trim($_POST['last_name']),
                    'telephone' => trim($_POST['telephone']),
                    'email' => trim($_POST['email']),
                    'company_id' => intval(trim($_POST['company_id'])),
                    'companies' => $companies,
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'telephone_err' => '',
                    'email_err' => ''
                ];

                // Validate First Name
                if (empty($data['first_name']))
                {
                    $data['first_name_err'] = 'Please enter a first name';
                }

                // Validate Last Name
                if (empty($data['last_name']))
                {
                    $data['last_name_err'] = 'Please enter a last name';
                }

                // Validate Telephone
                if (empty($data['telephone']))
                {
                    $data['telephone_err'] = 'Please enter a telephone number';
                }
                else
                {
                    if ($this->personModel->findTelephone($data['telephone']))
                    {
                        $data['telephone_err'] = 'Telephone number already exists';
                    }
                }

                // Validate Email
                if (empty($data['email']))
                {
                    $data['email_err'] = 'Please enter an email address';
                }
                else
                {
                    if ($this->personModel->findEmail($data['email']))
                    {
                        $data['email_err'] = 'Email address already exists';
                    }
                }

                // Make sure errors are empty
                if (
                    empty($data['first_name_err']) &&
                    empty($data['last_name_err']) &&
                    empty($data['telephone_err']) &&
                    empty($data['email_err']))
                {
                    // Validated

                    // Add Person
                    if ($this->personModel->addPerson($data))
                    {
                        flash('admin_message', 'Person added');
                        redirect('admin');
                    }
                    else
                    {
                        die('Something went wrong');
                    }
                }
                else
                {
                    // Load view with errors
                    $this->view('people/add', $data);
                }

            }
            else
            {
                // Init data
                $data =
                [
                    'first_name' => '',
                    'last_name' => '',
                    'telephone' => '',
                    'email' => '',
                    'company_id' => '',
                    'companies' => $companies,
                    'first_name_err' => '',
                    'last_name_err' => '',
                    'telephone_err' => '',
                    'email_err' => ''
                ];

                // Load view
                $this->view('people/add', $data);
            }
        }

        public function delete($id)
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Get existing post from model
                $people = $this->personModel->getPersonById($id);

                // Check for owner
                if ($_SESSION['user_type'] != '1')
                {
                    redirect('admin');
                }

                if ($this->personModel->deletePerson($id))
                {
                    flash('admin_message', 'Person Removed');
                    redirect('admin');
                }
                else
                {
                    die('Something went wrong');
                }
            }
            else
            {
                redirect('admin');
            }
        }
    }