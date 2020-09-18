<?php
<<<<<<< HEAD

    class Invoices extends Controller
    {
        public function __construct()
        {
            $this->invoiceModel = $this->model('Invoice');
            $this->companyModel = $this->model('Company');
            $this->personModel = $this->model('Person');
        }

        public function add()
        {
            // Check if user is logged in
            if (!isLoggedIn())
            {
                redirect('users/login');
            }
            
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
                    'company_id' => trim($_POST['company_id']),
                    'people_id' => trim($_POST['people_id']),
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

        public function edit($id)
        {
            // Get foreign key IDs
            $companies = $this->companyModel->getCompanies();
            $people = $this->personModel->getPeople();

            // Get existing invoice from model
            $invoice = $this->invoiceModel->getInvoiceById($id);

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
                    'number' => trim($_POST['number']),
                    'date' => trim($_POST['date']),
                    'company_id' => trim($_POST['company_id']),
                    'people_id' => trim($_POST['people_id']),
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
                    if ($this->invoiceModel->updateInvoice($data))
                    {
                        flash('admin_message', 'Invoice updated');
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
                    $this->view('invoices/edit', $data);
                }

            }
            else
            {
                // Init data
                $data =
                [
                    'id' => $id,
                    'number' => $invoice->number,
                    'date' => $invoice->date,
                    'company_id' => $invoice->company_id,
                    'people_id' => $invoice->people_id,
                    'companies' => $companies,
                    'people' => $people,
                    'number_err' => '',
                    'date_err' => ''
                ];

                // Load view
                $this->view('invoices/edit', $data);
            }
        }

        public function delete($id)
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Check for privileges
                if ($_SESSION['user_type'] != '1')
                {
                    redirect('admin');
                }

                if ($this->invoiceModel->deleteInvoice($id))
                {
                    flash('admin_message', 'Invoice removed');
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
=======
class Invoices extends Controller {
    public function __construct(){
        $this->invoiceModel = $this->model('Invoice');
    }

    // list this invoices
    public function list(){
        $invoices = $this->invoiceModel->list();
        $data = [
            'invoices' => $invoices
        ];
        $this->view('invoices/list', $data);
    }

    // create invoice
    public function create(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // initialize data
            $data = [
                'invoice_number' => trim($_POST['invoice_number']),
                'invoice_date' => trim($_POST['invoice_date']),
                'invoice_company' => trim($_POST['invoice_company']),
                'invoice_number_err' => '',
                'invoice_date_err' => '',
                
            ];
            
            //Validate invoice number
            if(empty($data['invoice_number'])){
                $data['invoice_number_err'] = 'Please enter invoice number';
            }


            if(empty($data['invoice_number_err'])){
                //validated 
                
                if($this->invoiceModel->insert($data)){
                    flash('add_success', 'Invoice was added successfully.');
                    redirect('invoices/list');
                }
            }else{
                //Load view with errors
                $this->view('invoices/create', $data);
            }
            
        }else{
            $companies = $this->invoiceModel->companiesList();
            $data = [
                'companies' => $companies
            ];

            $this->view('invoices/create', $data);
        }
    }

    //edit invoice
    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
            
            // initialize data
            $data = [
                'invoice_number' => trim($_POST['invoice_number']),
                'invoice_date' => trim($_POST['invoice_date']),
                'invoice_company' => trim($_POST['invoice_company']),
                'id' => trim($_POST['invoice_id']),
                'invoice_number_err' => '',
                'invoice_date_err' => '',
                
            ];
            
            //Validate invoice number
            if(empty($data['invoice_number'])){
                $data['invoice_number_err'] = 'Please enter invoice number';
            }


            if(empty($data['invoice_number_err'])){
                //validated 
                
                if($this->invoiceModel->updateInv($data)){
                    flash('edit_success', 'Invoice was edited successfully.');
                    redirect('invoices/list');
                }
            }else{
                //Load view with errors
                $this->view('invoices/edit', $data);
            }
            
        }else{
            $companies = $this->invoiceModel->companiesList();
            $inv = $this->invoiceModel->editInvoice($id);
            $data = [
                'invoice' => $inv,
                'company' => $companies
            ];
            $this->view('invoices/edit', $data);
        }
    }

    // Delete invoice
    public function delete($id){
        if(!empty($id)){
            if($this->invoiceModel->deleteInvoice($id)){
                flash('add_success', 'Invoice was successfully deleted.');
                redirect('invoices/list');
            }
        }
    }

    // view invoice details
    public function details($id){
        $details = $this->invoiceModel->detailInvoice($id);
        $company = $this->invoiceModel->detailCompanies($details->company_id);
        $people = $this->invoiceModel->detailPeople($details->company_id);
        $data = [
            'details' => $details,
            'company' => $company,
            'people' => $people
        ];

        $this->view('invoices/details', $data);
    }
}
>>>>>>> origin/mohamed
