<?php

    class Companies extends Controller
    {
        public function __construct()
        {
            if (!isLoggedIn())
            {
                redirect('users/login');
            }

            $this->companyModel = $this->model('Company');
            $this->typeModel = $this->model('Type');
        }

        public function add()
        {
            // Get foreign key IDs
            $types = $this->typeModel->getTypes();

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
                    'country' => trim($_POST['country']),
                    'vat' => trim($_POST['vat']),
                    'type_id' => intval(trim($_POST['type_id'])),
                    'types' => $types,
                    'name_err' => '',
                    'country_err' => '',
                    'vat_err' => ''
                ];

                // Validate Name
                if (empty($data['name']))
                {
                    $data['name_err'] = 'Please enter a name';
                }

                // Validate Country
                if (empty($data['country']))
                {
                    $data['country_err'] = 'Please enter a country';
                }

                // Validate VAT
                if (empty($data['vat']))
                {
                    $data['vat_err'] = 'Please enter a VAT number';
                }
                else
                {
                    if ($this->companyModel->findVat($data['vat']))
                    {
                        $data['vat_err'] = 'VAT number already exists';
                    }
                }

                // Make sure errors are empty
                if (
                    empty($data['name_err']) &&
                    empty($data['country_err']) &&
                    empty($data['vat_err']))
                {
                    // Validated

                    // Add invoice
                    if ($this->companyModel->addCompany($data))
                    {
                        flash('admin_message', 'Company added');
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
                    $this->view('companies/add', $data);
                }

            }
            else
            {
                // Init data
                $data =
                [
                    'name' => '',
                    'country' => '',
                    'vat' => '',
                    'type_id' => '',
                    'types' => $types,
                    'name_err' => '',
                    'country_err' => '',
                    'vat_err' => ''
                ];

                // Load view
                $this->view('companies/add', $data);
            }
        }

        public function delete($id)
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Get existing post from model
                $invoice = $this->companyModel->getCompanyById($id);

                // Check for owner
                if ($_SESSION['user_type'] != '1')
                {
                    redirect('admin');
                }

                if ($this->companyModel->deleteCompany($id))
                {
                    flash('admin_message', 'Company Removed');
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