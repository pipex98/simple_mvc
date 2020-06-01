<?php

    if(!defined('DS')){
        define('DS',DIRECTORY_SEPARATOR);
    }
    $localIP = getHostByName(getHostName());
    $HTTP = (isset($_SERVER['HTTPS'])) ? 'https://' : 'http://';
    $HTTP.= (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $localIP).'/';

    if(!defined('BASE_URL')){
        define('BASE_URL',$HTTP.'bookshop');
    }

    if(!defined('ROOP_AP')){
        define('ROOT_APP',dirname(dirname(__FILE__)));
    }

    if (!defined('SITE_NAME')) {
        define('SITE_NAME', 'bookshop');
    }

    if (!defined('DB_HOST')) {
        define('DB_HOST', 'localhost');
    }

    if (!defined('DB_USER')) {
        define('DB_USER', 'root');
    }

    if (!defined('DB_PASSWORD')) {
        define('DB_PASSWORD', '');
    }

    if (!defined('DB_NAME')) {
        define('DB_NAME', 'bookshop');
    }
    
    
    