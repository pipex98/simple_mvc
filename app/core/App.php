<?php

    /**
     * Mapear la url ingresada en el navegador,
     * 1-Controlador
     * 2-metodo
     * 3-Parametros
     * Ejemplo: /home/update/4
     */

     class App {

         protected $controllerCurrent = 'home';
         protected $methodCurrent = 'index';
         protected $params = [];

         public function __construct() {

            $url = $this->getUrl();

            /**
             * Buscar en controllers si el controlador existe
             */
            if (file_exists(ROOT_APP . '/controllers/'. ucwords($url[0]).'.php')) {

                //Si existe se setea como controlador por defecto
                $this->controllerCurrent = ucwords($url[0]);

                //Liberamos el controlador anterior
                unset($url[0]);
            }

            //Cargamos el nuevo controlador
            require_once ROOT_APP . '/controllers/'. $this->controllerCurrent . '.php';
            $this->controllerCurrent = new $this->controllerCurrent;

            if (isset($url[1])) {
                //chequear la segunda parte de la url que seria el método
                if (method_exists($this->controllerCurrent, $url[1])) {
                    //chequeamos el método
                    $this->methodCurrent = $url[1];
                    //Liberamos el metodo anterior
                    unset($url[1]);
                }
            }

            //obtenemos los posibles parametros
            $this->params = $url ? array_values($url) : [];

            //Llamamos los parametros y el controlador pasados por la url
            call_user_func_array([$this->controllerCurrent, $this->methodCurrent], $this->params);
             
         }

         public function getUrl(){

             if (isset($_GET['url'])) {
                 /**
                  * Limpiamos la url de espacios que tenga a la derecha
                  * A partir del /
                  */
                 $url = rtrim($_GET['url'], '/');
                 /**
                  * Formatemos la url que pasamos por GET para que la
                  * tome como una url valida
                  */
                 $url = filter_var($url, FILTER_SANITIZE_URL);
                 /**
                  * Convertimos en un array la url partiendo del /
                  */
                 $url = explode('/', $url);
                 return $url;
             }
         }
     }
     