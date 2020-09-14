<?php

    class Admin extends Controller
    {
        public function __construct()
        {
            if (!isLoggedIn())
            {
                redirect('users/login');
            }

            $this->invoiceModel = $this->model('Invoice');
            $this->personModel = $this->model('Person');
            $this->companyModel = $this->model('Company');
        }

        public function index()
        {
            $invoices = $this->invoiceModel->getInvoices();
            $people = $this->personModel->getPeopleCompanies();
            $companies = $this->companyModel->getCompaniesTypes();
            
            $data =
            [
                'invoices' => $invoices,
                'people' => $people,
                'companies' => $companies
            ];

            $this->view('admin/index', $data);
        }
    }