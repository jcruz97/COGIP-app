<?php

    class Pages extends Controller
    {
        public function __construct()
        {
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
                'title' => 'Cogip APP',
                'description' => 'Welcome to the Cogip APP',
                'invoices' => $invoices,
                'people' => $people,
                'companies' => $companies
            ];

            $this->view('pages/index', $data);
        }

        public function about()
        {
            $data =
            [
                'title' => 'About',
                'description' => "App to manage Cogip's accounting."
            ];

            $this->view('pages/about', $data);
        }
    }