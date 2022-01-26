<?php
//Включение отображения ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

//создадим константу ROOT
define('ROOT', dirname(__FILE__));

//подключаем файл класс Router.php
require_once (ROOT . '/components/Router.php');
//подключаем файл с адресами страниц
$routes = include_once (ROOT . '/config/routes.php');

$router = new Router ($routes);
$router->run();
