<?php 

    class Controller {
        
        public function model($model) {
            require_once ROOT_APP . '/models/' . $model . '.php';
            return new $model();
        }

        public function view($view, $data = []) {

            if (file_exists(ROOT_APP . '/views/' . $view . '.php')) {
                require_once ROOT_APP . '/views/' . $view . '.php';
            } else {
                die('La vista no existe');
            }
        }
    }
    