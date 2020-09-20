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

            $invoices = $this->invoiceModel->get5Invoices();
            $people = $this->personModel->get5People();
            $companies = $this->companyModel->get5Companies();
            
            $data =
            [
                'title' => 'Cogip APP',
                'description' => 'Welcome to the COGIP',
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