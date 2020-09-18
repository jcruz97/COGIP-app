<?php

    class Pages extends Controller
    {
        public function __construct()
        {
            
        }

        public function index()
        {
            // if (isLoggedIn)
            // {
            //     redirect('posts');
            // }

<<<<<<< HEAD
            $data =
            [
                'title' => 'Cogip APP',
                'description' => 'Welcome to the Cogip APP'
=======
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
>>>>>>> origin/john
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