<?php 

    //Cargar el archivo de configuración
    require_once 'config/global.php';

    //Cargamos los archivos del core con autoload
    spl_autoload_register(function ($nameClass) {
        require_once 'core/' . $nameClass . '.php';
    });