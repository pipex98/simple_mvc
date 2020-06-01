<?php

    class Home extends Controller {
        
        public function __construct() { }

        public function index() {
        
            $data = [
                'title' => 'Bienvenidos a mvc',
            ];

            $this->view('home/index', $data);
        }
    }
    