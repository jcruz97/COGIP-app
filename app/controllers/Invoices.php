<?php

    class Invoices extends Controller
    {
        public function __construct()
        {
            if (!isLoggedIn())
            {
                redirect('users/login');
            }

            $this->invoiceModel = $this->model('Invoice');
            $this->companyModel = $this->model('Company');
            $this->personModel = $this->model('Person');
        }

        public function add()
        {
            // Get foreign key IDs
            $companies = $this->companyModel->getCompanies();
            $people = $this->personModel->getPeople();

            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data =
                [
                    'number' => trim($_POST['number']),
                    'date' => trim($_POST['date']),
                    'company_id' => intval(trim($_POST['company_id'])),
                    'people_id' => intval(trim($_POST['people_id'])),
                    'companies' => $companies,
                    'people' => $people,
                    'number_err' => '',
                    'date_err' => ''
                ];

                // Validate Number
                if (empty($data['number']))
                {
                    $data['number_err'] = 'Please enter number';
                }
                else
                {
                    if ($this->invoiceModel->findInvoiceByNumber($data['number']))
                    {
                        $data['number_err'] = 'Invoice number already exists';
                    }
                }

                // Validate Date
                if (empty($data['date']))
                {
                    $data['date_err'] = 'Please enter date';
                }

                // Make sure errors are empty
                if (empty($data['number_err']) && empty($data['date_err']))
                {
                    // Validated

                    // Add invoice
                    if ($this->invoiceModel->addInvoice($data))
                    {
                        flash('admin_message', 'Invoice added');
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
                    $this->view('invoices/add', $data);
                }

            }
            else
            {
                // Init data
                $data =
                [
                    'number' => '',
                    'date' => '',
                    'company_id' => '',
                    'people_id' => '',
                    'companies' => $companies,
                    'people' => $people,
                    'number_err' => '',
                    'date_err' => ''
                ];

                // Load view
                $this->view('invoices/add', $data);
            }
        }

        public function delete($id)
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Get existing post from model
                $invoice = $this->invoiceModel->getInvoiceById($id);

                // Check for owner
                if ($_SESSION['user_type'] != '1')
                {
                    redirect('admin');
                }

                if ($this->invoiceModel->deleteInvoice($id))
                {
                    flash('admin_message', 'Invoice Removed');
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