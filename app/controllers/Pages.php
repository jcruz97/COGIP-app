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

            $data =
            [
                'title' => 'Cogip APP',
                'description' => 'Welcome to the Cogip APP'
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