<?php
// Общие настройки
if (function_exists('date_default_timezone_set'))
date_default_timezone_set('Europe/Kiev');

ini_set('display_errors',1);
error_reporting(E_ALL);

require realpath(__DIR__).'/../config/app.php';

require_once realpath(__DIR__).'/./autoload.php';
// Регистрируем автозагрузчик
spl_autoload_register("autoloadsystem");

$routesFile = ROOT.'/config/routes.php';

Router::load($routesFile)
    ->direct(Request::uri(), Request::method());

// require_once realpath(__DIR__).'/../router/Router.php';
