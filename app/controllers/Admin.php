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
            $invoices = $this->invoiceModel->get5Invoices();
            $people = $this->personModel->get5People();
            $companies = $this->companyModel->get5Companies();
            
            $data =
            [
                'invoices' => $invoices,
                'people' => $people,
                'companies' => $companies
            ];

            $this->view('admin/index', $data);
        }
    }