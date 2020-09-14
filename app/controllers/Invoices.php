<?php
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