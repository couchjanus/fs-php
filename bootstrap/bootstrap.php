<?php
if (function_exists('date_default_timezone_set'))
date_default_timezone_set('Europe/Kiev');
// Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

require realpath(__DIR__).'/../config/app.php';
require_once HELPERS.'/lib.php';
require_once realpath(__DIR__).'/../router/Router.php';
 ?>
